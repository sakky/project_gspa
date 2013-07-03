<?php 
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?> 
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('alumni/master'); ?>">Master's degree</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status = 1 AND alumni_group=\'Master\''; 
            $criteria->order = 'sort_order';
            $co_type = AlumniNo::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('cooperation', array('type_id'=>$type->alumni_no_id)); ?>"><?php echo $type->name_en;?></a></li>        
        <?php }?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('alumni/doctor'); ?>">Doctorate Degree</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
   
            $criteria->condition = 'status = 1 AND alumni_group=\'Doctor\''; 
            $criteria->order = 'sort_order';
            $co_type = AlumniNo::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('cooperation', array('type_id'=>$type->alumni_no_id)); ?>"><?php echo $type->name_en;?></a></li>        
        <?php }?>
</ul>
<?php }else{?>
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('alumni/master'); ?>">ปริญญาโท</a></h6></li>
         <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status = 1 AND alumni_group=\'Master\''; 
            $criteria->order = 'sort_order';
            $co_type = AlumniNo::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('alumni', array('type_id'=>$type->alumni_no_id)); ?>"><?php echo $type->name_th;?></a></li>        
        <?php }?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('alumni/doctor'); ?>">ปริญาเอก</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status = 1 AND alumni_group=\'Doctor\''; 
            $criteria->order = 'sort_order';
            $co_type = AlumniNo::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('alumni', array('type_id'=>$type->alumni_no_id)); ?>"><?php echo $type->name_th;?></a></li>        
        <?php }?>
</ul>
<?php } ?>