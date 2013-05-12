<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?>
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('program'); ?>">Programs</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('program/admission', array('id'=>15)); ?>">PHD Admissions</a></h6></li>          
        <li class="last-item"><h6><a href="<?php echo Yii::app()->createUrl('program/admission', array('id'=>14)); ?>">Master Admissions</a></h6></li>           
</ul>
<?php }else{?>
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('program'); ?>">หลักสูตรที่เปิดสอน</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('program/admission', array('id'=>15)); ?>">สมัครเรียนปริญญาเอก</a></h6></li>          
        <li class="last-item"><h6><a href="<?php echo Yii::app()->createUrl('program/admission', array('id'=>14)); ?>">สมัครเรียนปริญญาโท</a></h6></li>           
</ul>
<?php } ?>
