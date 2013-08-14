<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?>
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('program/doctor'); ?>">Doctorate Degree Programs</a></h6></li>          
        <li class="last-item"><h6><a href="<?php echo Yii::app()->createUrl('program/master'); ?>">Master's Degree Programs</a></h6></li>           
</ul>
<?php }else{?>
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('program/doctor'); ?>">หลักสูตรปริญญาเอก</a></h6></li>          
        <li class="last-item"><h6><a href="<?php echo Yii::app()->createUrl('program/master'); ?>">หลักสูตรปริญญาโท</a></h6></li>           
</ul>
<?php } ?>
