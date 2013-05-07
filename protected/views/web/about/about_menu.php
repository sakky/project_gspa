<?php 
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?> 
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>">About GSPA</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>2)); ?>">Sign of GSPA</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about/board'); ?>">Board of Directors</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about/executive'); ?>">Executive of GSPA</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>4)); ?>">Organization Structure</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('cooperation'); ?>">Academic Cooperation</a></h6></li>     
        <li><h6><a href="<?php echo Yii::app()->createUrl('alumni'); ?>">GSPA Alumni</a></h6></li> 
        <li class="last-item"><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>6)); ?>">Map</a></h6></li>           
</ul>
<?php }else{?>
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>">เกี่ยวกับวิทยาลัย</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>2)); ?>">สัญลักษณ์ประจำวิทยาลัย</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about/board'); ?>">คณะกรรมการประจำวิทยาลัย</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about/executive'); ?>">ผู้บริหารวิทยาลัยการบริหารรัฐกิจ</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>4)); ?>">โครงสร้างองค์กร</a></h6></li>
        <li><h6><a href="<?php echo Yii::app()->createUrl('cooperation'); ?>">ความร่วมมือทางวิชาการ</a></h6></li>     
        <li><h6><a href="<?php echo Yii::app()->createUrl('alumni'); ?>">ทำเนียบศิษย์เก่า</a></h6></li> 
        <li class="last-item"><h6><a href="<?php echo Yii::app()->createUrl('about', array('id'=>6)); ?>">แผนที่วิทยาลัย</a></h6></li>           
</ul>
<?php } ?>
