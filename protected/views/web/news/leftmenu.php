<?php 
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?> 
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('news/news'); ?>">News & Events</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('news/student'); ?>">Student News</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('news/job'); ?>">Employment News</a></h6></li>
        <li class="last-item"><h6><a href="<?php echo Yii::app()->createUrl('news/advertise'); ?>">Announce</a></h6></li>
</ul>
<?php }else{?>
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('news/news'); ?>">ข่าวประชาสัมพันธ์</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('news/student'); ?>">ข่าวประชาสัมพันธ์นิสิต</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('news/job'); ?>">ข่าวรับสมัครงาน</a></h6></li>
        <li class="last-item"><h6><a href="<?php echo Yii::app()->createUrl('news/advertise'); ?>">ข่าวประกาศ</a></h6></li>
</ul>
<?php } ?>
