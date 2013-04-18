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
                <div class="goback_box">

                        <a href="index.php?r=student/view"><span></span>กลับสู่หน้าหลัก</a>

                </div>
        </div>

        <div class="clear"></div>

        <div class="grid_5 box_shadow_grid_5"></div>
        <div class="grid_7 box_shadow_grid_7"></div>

</div>

<div class="clear"></div>

<div class="grid_12 title_bar">
        <span class="before"></span>
        <h2>ประวัติการทำชุดทดสอบ</h2>
        <span class="after"></span>
</div>

<div class="clear"></div>

<!-- Start Exam History -->
<div class="grid_12">
    <div class="table_history">
            <table cellspacing="0">
                    <tbody>
                            <tr class="title_table">
                                    <th width="18%">ชุดทดสอบ</th>
                                    <th width="32%">กลุ่มวิชา</th>
                                    <th width="15%">วัน-เวลา</th>
                                    <th>คะแนนเฉลี่ย</th>
                                    <th>คะแนนที่ได้</th>
                                    <th>คะแนนเต็ม</th>
                            </tr>
                            <?php
                            if(($history)){
                                 //echo "<pre>", print_r($TestRecord), "</pre>";
                                 foreach($history  as $his) {?>
                            <tr>
                                    <td><?php echo $his['type_name'];?></td>
                                    <td><?php echo $his['sub_name'];?></td>
                                    <td><?php echo date('d M Y',strtotime($his['date_attended']));?></td>
                                    <td><?php echo intval($his['score_avg']);?></td>
                                    <td><?php echo intval($his['score']);?></td>
                                    <td><?php echo intval($his['score_total']);?></td>
                            </tr>
                            <?php }}?>
                            
                    </tbody>
            </table>
    </div>
</div>

<div class="clear"></div>

<div class="box_shadow_full"></div>



