<?php 
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?> 
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('knowledge/group1'); ?>">Knowledge Management</a></h6></li>
         <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status AND know_group =1';
            $criteria->params=array(':status'=>1);
            $criteria->order = 'sort_order';
            $co_type = KnowledgeType::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('knowledge', array('type_id'=>$type->know_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
        <?php }?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('knowledge/group2'); ?>">Categories of Knowledge</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status AND know_group =2';
            $criteria->params=array(':status'=>1);
            $criteria->order = 'sort_order';
            $co_type = KnowledgeType::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('knowledge', array('type_id'=>$type->know_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
        <?php }?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('knowledge/group3'); ?>">Documentary</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status AND know_group =3';
            $criteria->params=array(':status'=>1);
            $criteria->order = 'sort_order';
            $co_type = KnowledgeType::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('knowledge', array('type_id'=>$type->know_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
        <?php }?>
</ul>
<?php }else{?>
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('knowledge/group1'); ?>">การจัดการความรู้</a></h6></li>
         <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status AND know_group =1';
            $criteria->params=array(':status'=>1);
            $criteria->order = 'sort_order';
            $co_type = KnowledgeType::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('knowledge', array('type_id'=>$type->know_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
        <?php }?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('knowledge/group2'); ?>">หมวดความรู้</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status AND know_group =2';
            $criteria->params=array(':status'=>1);
            $criteria->order = 'sort_order';
            $co_type = KnowledgeType::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('knowledge', array('type_id'=>$type->know_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
        <?php }?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('knowledge/group3'); ?>">สารคดี</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status AND know_group =3';
            $criteria->params=array(':status'=>1);
            $criteria->order = 'sort_order';
            $co_type = KnowledgeType::model()->findAll($criteria);

            foreach($co_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('knowledge', array('type_id'=>$type->know_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
        <?php }?>
</ul>
<?php } ?>