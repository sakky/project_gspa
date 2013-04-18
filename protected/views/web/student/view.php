<?php 

       $subject_name = $subject['name'];
       if($subject['exam_type']=='Exam'){
            $type_name = 'ข้อสอบ';
       }else{
            $type_name = 'แบบฝึกหัด';
       }
          /*echo "<br> ===> ";
            echo "<pre>";
            print_r($subject['exam_type']);
            echo "</pre>";*/
?>

<script>

	$(function(){
            var subject = <?php echo $subject_id;?>;
            if(subject){
                $(".list_test > .list_test_unselect").hide();
		$(".list_test > .list_test_box").css({ visibility: "visible" });
            }
            var exam_type = '<?php echo $subject['exam_type'];?>';
            if(exam_type=='Exercise'){
                $(".menu_tab_home a:nth-child(2), .menu_tab a:nth-child(2)").addClass("selected");
		$(".menu_tab_home a:nth-child(2), .menu_tab a:nth-child(2)").siblings("a:nth-child(1)").removeClass("selected");
                $(".menu_tab1").hide();
		$(".menu_tab2").show();

            }else {
                $(".menu_tab_home a:nth-child(1), .menu_tab a:nth-child(1)").addClass("selected");
		$(".menu_tab_home a:nth-child(1), .menu_tab a:nth-child(1)").siblings("a:nth-child(2)").removeClass("selected");
                $(".menu_tab1").show();
		$(".menu_tab2").hide();

            }


        });
        function closeDialogBox(){
            document.getElementById('dialogBox').style.display="none";
        }

        function showExam(subject_id){
           
            $.ajax({
                url: '?r=exam/select&subject_id='+subject_id,
                type: 'GET',
                dataType: 'html',
                success: function (data, textStatus, xhr) {
                    console.log(data);
                    document.getElementById('showData').innerHTML = data;
                    reloadDataTable();

                },
                error: function (request, status, error) {
                    alert ("Error: "+error+ "\nResponseText: "+request.responseText);
                }
            });

        }
        
</script>
<div class="top_dashboard">
        <div class="grid_5">
                <div class="profile_box">
                        <div class="pic">
                                <?php if(!$model->image){?>
                                <img src="images/web/nopic.png" />
                                <?php }else{?>
                                <img src="uploads/student/<?php echo $model->image;?>" style="width:100px" />
                                <?php }?>
                                <p><a href="#">เปลี่ยนรูป</a> | <a href="index.php?r=student/update">แก้ไขข้อมูล</a></p>
                                <p><a href="index.php?r=site/logout">ออกจากระบบ</a></p>
                        </div>
                        <div class="text">
                                <h2 class="profile_name"><?php echo $model->firstname;?> <?php echo $model->lastname;?></h2>
                                <ul>
                                    <li><span>Birthday:</span> <?php echo date("d/m/Y", strtotime($model->birthday));?></li>
                                    <li><span>School:</span> <?php echo $model->school;?></li>
                                    <li><span>Level:</span> <?php if ($model->level_id){echo $model->level->name;}?></li>
                                    <li><span>Tel:</span> <?php echo $model->phone;?></li>
                                    <li><span>E-mail:</span> <?php echo $model->email;?></li>
                                </ul>
                        </div>
                </div>
        </div>

        <div class="grid_7">
                <div class="history_box">
                    <?php echo $this->renderPartial('last_history', array('student_id'=>$model->student_id,'TestRecord'=> $TestRecord)); ?>
                </div>
        </div>

        <div class="clear"></div>

        <div class="grid_5 box_shadow_grid_5"></div>
        <div class="grid_7 box_shadow_grid_7"></div>

</div>

<div class="clear"></div>

<div class="grid_12 dialog" id="dialogBox" >

        <div class="text">
                <p>E-Pretest ยินดีต้อนรับค่ะ ที่นี่บริการข้อสอบออนไลน์ที่ได้มาตรฐาน น้องๆที่สนใจสามารถคลิกรายวิชาที่ปรากฏตามด้านล่างเพื่อสั่งซื้อชุดข้อสอบ
                เมื่อสั่งซื้อแล้ว ชุดข้อสอบจะจัดเก็บอยู่ในคลังข้อสอบส่วนตัวที่น้องๆสามารถคลิกเพื่อทำข้อสอบได้ตลอด 24 ชั่วโมง ขอให้โชคดีค่ะ</p>
        </div>

        <div class="close" onclick="closeDialogBox();">x</div>

</div>

<div class="clear"></div>

<div class="grid_12 title_bar">
        <span class="before"></span>
        <h2>เลือกชุดทดสอบเข้าคลังข้อสอบส่วนตัว</h2>
        <span class="after"></span>
</div>

<div class="clear"></div>
<!-- Start Selected -->
<?php
    if($level_id==11){
         $level_name = "ประถม";
    }else if($level_id==12){
         $level_name = "ม.ต้น";
    }else{
        $level_name = "ม.ปลาย";
    }
?>
<div class="menu_test">

        <div class="menu_tab">
                <a class="selected">ชุดข้อสอบ</a>
                <a>ชุดแบบฝึกหัด</a>
                <a><?php echo $level_name;?></a>
        </div>
        <ul class="menu_list menu_tab1" id="menu_tab1">
                <li>
                        <?php foreach($TypesExam  as $exam) { ?>
                        <span><?php echo $exam->name;?></span>
                        <ul>
                            <?php
                                $type_id = $exam->type_id;
                                $sub_criteria = new CDbCriteria();
                                $sub_criteria->select = '*';
                                $sub_criteria->condition = 'status=:status AND type_id=:type_id';
                                $sub_criteria->params=array(':status'=>1,':type_id'=>$type_id);
                                $sub_criteria->order='sort_order';
                                $Subjects = Subject::model()->findAll($sub_criteria);


                            ?>
                            <?php foreach($Subjects  as $Subject) {

                                $exam = new Exam;
                                $total = $exam->getTotalExamBySubjectId($Subject->subject_id);

                            ?>
                                <li style="float:left;" ><a onclick="showExam('<?php echo $Subject->subject_id;?>')" <?php if($Subject->subject_id == $subject_id){ ?>style="background: #ff9c00;"<?php } ?>><?php echo $Subject->name;?><span><?php echo $total;?></span></a></li>
                            <?php } ?>

                        </ul>
                        <?php } ?>
                </li>
        </ul>

    <ul class="menu_list menu_tab2" id="menu_tab2">
                <li>
                        <?php foreach($TypesExercise  as $exercise) { ?>
                        <span><?php echo $exercise->name;?></span>
                        <ul>
                            <?php
                                $type_id = $exercise->type_id;
                                $sub_criteria = new CDbCriteria();
                                $sub_criteria->select = '*';
                                $sub_criteria->condition = 'status=:status AND type_id=:type_id';
                                $sub_criteria->params=array(':status'=>1,':type_id'=>$type_id);
                                $sub_criteria->order='sort_order';
                                $Subjects = Subject::model()->findAll($sub_criteria);
                            ?>
                            <?php foreach($Subjects  as $Subject) {
                                $exam = new Exam;
                                $total = $exam->getTotalExamBySubjectId($Subject->subject_id);
                            ?>
                                <li style="float:left" ><a  onclick="showExam('<?php echo $Subject->subject_id;?>')" <?php if($Subject->subject_id == $subject_id){ ?>style="background: #ff9c00;"<?php } ?>><?php echo $Subject->name;?><span><?php echo $total;?></span></a></li>
                            <?php } ?>

                        </ul>
                        <?php } ?>
                </li>
        </ul>

</div>

<div class="list_test">

        <div class="list_test_unselect" id="list_test_unselect">
                <p>เลือกรายชื่อชุดทดสอบจากด้านซ้าย</p>
        </div>

        <div class="list_test_box" id="list_test_box">

                <div class="header_list_test">


                        <h2>ชุด<?php echo $type_name;?> / วิชา<?php echo $subject_name;?></h2>
                        <!-- <div class="pages">
                                <span>หน้าที่</span>
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#">5</a>
                                <a href="#">></a>
                                <a href="#">>></a>
                        </div> -->
                </div>

                <div class="table_list_test" id="showData">
                        <?php echo $this->renderPartial('show_exam', array('subject_id'=>$subject_id,'student_id'=>$model->student_id)); ?>
                </div>

        </div>

</div>

<div class="clear"></div>

<div class="box_shadow_full"></div>


