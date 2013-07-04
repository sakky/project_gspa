<?php 
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?> 
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>">History of GSPA</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>2)); ?>">Sign of GSPA</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>4)); ?>">Vision</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>5)); ?>">Mission</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about/executive'); ?>">Executive of GSPA</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about/structure'); ?>">Organization Structure</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about/board'); ?>">Teachers</a></h6></li>
        <li class="last-item"><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>6)); ?>">Map</a></h6></li>
</ul>
<?php }else{?>
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>">ความเป็นมา</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>2)); ?>">ตราสัญลักษณ์</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>4)); ?>">วิสัยทัศน์</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>5)); ?>">พันธกิจ</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about/executive'); ?>">ทำเนียบผู้บริหาร</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about/structure'); ?>">โครงสร้างหน่วยงาน</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about/board'); ?>">คณาจารย์</a></h6></li>
        <li class="last-item"><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>6)); ?>">แผนที่วิทยาลัย</a></h6></li> 
</ul>
<?php } ?>
