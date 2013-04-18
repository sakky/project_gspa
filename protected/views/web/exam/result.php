<script>
function show_next(order){

    var next = parseInt(order)+1;

    document.getElementById('answer_sheet_'+order).style.display = "none";
    document.getElementById('answer_sheet_'+next).style.display = "";

}
function show_prev(order){

    var prev = parseInt(order)-1;

    document.getElementById('answer_sheet_'+order).style.display = "none";
    document.getElementById('answer_sheet_'+prev).style.display = "";

}
</script>
<div class="test_box">
    <div class="question">
            <div class="question_top">
                    <?php if($exam_info['exam_type']=='Exam'){
                        $exam_type = 'ข้อสอบ';
                    }else{
                        $exam_type = 'แบบฝึกหัด';
                    }?>
                    <h2>เฉลยชุด<?php echo $exam_type;?>วิชา<?php echo $exam_info['subject_name'];?></h2>

                    <h3><?php echo $exam_info['name'];?></h3>
            </div>
            <div class="question_content">
                    <?php

                    if($exam_info['answer_file']){
                        $file_name = $exam_info['answer_file'];
                    }else{
                        $file_name = $exam_info['exam_file'];
                    }
                    ?>
                    <iframe id="iframe" class="pdfviewer" src="http://docs.google.com/viewer?url=<?php echo $_SERVER['SERVER_NAME'] ;?>/uploads/pdf/<?php echo $exam_info['exam_file'];?>&embedded=true" width="640px" height="100%" frameborder="0"></iframe>
                    <!--<iframe class="pdfviewer" src="http://docs.google.com/viewer?url=http%3A%2F%2Fwww.forum.02dual.com%2Fexamfile%2F655topic%2FkeyO-NET53Math.pdf&embedded=true" width="640px" height="100%" frameborder="0"></iframe>-->
            </div>
    </div>
    <form name="ExamForm" method="post" action="index.php?r=exam/submit">
        <input type="hidden" name="ExamForm[exam_id]" value="<?php echo $exam_info['exam_id'];?>"/>
        <input type="hidden" name="ExamForm[student_id]" value="<?php echo Yii::app()->user->id;?>"/>
        <input type="hidden" name="ExamForm[score]" value="0"/>
        <input type="hidden" name="ExamForm[elapse_time]" id="elapse_time" value="5"/>
        <input type="hidden" name="ExamForm[status]" value="1"/>
    <div class="answer">
            <?php

            //count total record
            $num_rec =  count($session_list);

            //find last key
            if($num_rec==0){
                 $last_key = 0;
            }else{
                 $last_key = $num_rec-1;
            }
            if(count($session_list)!=0){

            foreach ($session_list as $key_ans=>$answer)
            {
                switch ($answer['answer_type_id']) {
                    case 1:
                        echo $this->renderPartial('_result1', array('answer'=>$answer,'key_ans'=>$key_ans,'last_key'=>$last_key,'test_status'=>2));
                        break;
                    case 2:
                        echo $this->renderPartial('_result2', array('answer'=>$answer,'key_ans'=>$key_ans,'last_key'=>$last_key,'test_status'=>2));
                        break;
                    case 3:
                        echo $this->renderPartial('_result3', array('answer'=>$answer,'key_ans'=>$key_ans,'last_key'=>$last_key,'test_status'=>2));
                        break;
                    case 4:
                        echo $this->renderPartial('_result4', array('answer'=>$answer,'key_ans'=>$key_ans,'last_key'=>$last_key,'test_status'=>2));
                        break;
                    case 5:
                        echo $this->renderPartial('_result5', array('answer'=>$answer,'key_ans'=>$key_ans,'last_key'=>$last_key,'test_status'=>2));
                        break;
                    case 6:
                        echo $this->renderPartial('_result6', array('answer'=>$answer,'key_ans'=>$key_ans,'last_key'=>$last_key,'test_status'=>2));
                        break;
                    case 7:
                        echo $this->renderPartial('_result7', array('answer'=>$answer,'key_ans'=>$key_ans,'last_key'=>$last_key,'test_status'=>2));
                        break;
                    default:
                        echo $this->renderPartial('_form0');
                }
            }//end foreach
            }else{
                echo $this->renderPartial('_form0');
            }?>
            <div class="answer_bottom">
                   
            </div>
        </div>
    </form>
</div>
<div class="box_shadow_full"></div>
		