<?php 
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?> 
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('information/download'); ?>">Download Documents</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('information/library'); ?>">Library</a></h6></li>
</ul>
<?php }else{?>
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('information/download'); ?>">ดาวน์โหลดแบบฟอร์ม</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('information/library'); ?>">ห้องสมุด</a></h6></li>
</ul>
<?php } ?>