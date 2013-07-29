<?php 
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?> 
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('student/group1'); ?>">Master's degree</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status = 1 AND ser_group=1'; 
            $criteria->order = 'sort_order';
            $co_type = StudentServiceType::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('student', array('type_id'=>$type->ser_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
        <?php }?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('student/group2'); ?>">Doctorate Degree</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status = 1 AND ser_group=2'; 
            $criteria->order = 'sort_order';
            $co_type = StudentServiceType::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('student', array('type_id'=>$type->ser_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
        <?php }?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('student/group3'); ?>">Evaluation of Teaching</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status = 1 AND ser_group=3'; 
            $criteria->order = 'sort_order';
            $co_type = StudentServiceType::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('student', array('type_id'=>$type->ser_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
        <?php }?>
</ul>
<?php }else{?>
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('student/group1'); ?>">ปริญญาโท</a></h6></li>
         <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status = 1 AND ser_group=1'; 
            $criteria->order = 'sort_order';
            $co_type = StudentServiceType::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('student', array('type_id'=>$type->ser_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
        <?php }?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('student/group2'); ?>">ปริญญาเอก</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status = 1 AND ser_group=2'; 
            $criteria->order = 'sort_order';
            $co_type = StudentServiceType::model()->findAll($criteria);
            
            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('student', array('type_id'=>$type->ser_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
        <?php }?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('student/group3'); ?>">ประเมินการเรียนการสอน</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status = 1 AND ser_group=3'; 
            $criteria->order = 'sort_order';
            $co_type = StudentServiceType::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('student', array('type_id'=>$type->ser_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
        <?php }?>
</ul>
<?php } ?>