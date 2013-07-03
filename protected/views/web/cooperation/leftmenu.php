<?php 
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?> 
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('cooperation/inbound'); ?>">Domestic</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status AND t.group=:group';
            $criteria->params=array(':status'=>1,':group'=>'inbound');
            $criteria->order = 'sort_order';
            $co_type = CooperationType::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('cooperation', array('type_id'=>$type->co_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
        <?php }?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('cooperation/outbound'); ?>">International</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status AND t.group=:group';
            $criteria->params=array(':status'=>1,':group'=>'outbound');
            $criteria->order = 'sort_order';
            $co_type = CooperationType::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('cooperation', array('type_id'=>$type->co_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
        <?php }?>
</ul>
<?php }else{?>
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('cooperation/inbound'); ?>">ภายในประเทศ</a></h6></li>
         <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status AND t.group=:group';
            $criteria->params=array(':status'=>1,':group'=>'inbound');
            $criteria->order = 'sort_order';
            $co_type = CooperationType::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('cooperation', array('type_id'=>$type->co_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
        <?php }?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('cooperation/outbound'); ?>">ต่างประเทศ</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status AND t.group=:group';
            $criteria->params=array(':status'=>1,':group'=>'outbound');
            $criteria->order = 'sort_order';
            $co_type = CooperationType::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('cooperation', array('type_id'=>$type->co_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
        <?php }?>
</ul>
<?php } ?>