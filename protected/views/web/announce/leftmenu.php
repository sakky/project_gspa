<?php 
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?> 
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('announce/admission'); ?>">Admission</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('announce/job'); ?>">Jobs</a></h6></li>
</ul>
<?php }else{?>
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('announce/admission'); ?>">ประกาศวิชาการ</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('announce/job'); ?>">รับสมัครงาน</a></h6></li>
</ul>
<?php } ?>