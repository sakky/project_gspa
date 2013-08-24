<?php 
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?> 
<ul class="list-1">
        <?php
        $criteria = new CDbCriteria();
        $criteria->condition = 'status=:status AND doc_group=\'service\'';
        $criteria->params=array(':status'=>1,);
        $criteria->order = 'sort_order';
        $doc_type = DocumentType::model()->findAll($criteria);

        foreach($doc_type as $type) {

        ?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('information',array('type_id'=>$type->doc_type_id)); ?>"><?php echo $type->name_en;?></a></h6></li>
        <?php }?>
        
<!--        <li><h6><a href="<?php echo Yii::app()->createUrl('admission'); ?>">Online Admission</a></h6></li>-->
</ul>
<?php }else{?>
<ul class="list-1">
        <?php
        $criteria = new CDbCriteria();
        $criteria->condition = 'status=:status AND doc_group=\'service\'';
        $criteria->params=array(':status'=>1,);
        $criteria->order = 'sort_order';
        $doc_type = DocumentType::model()->findAll($criteria);

        foreach($doc_type as $type) {

        ?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('information',array('type_id'=>$type->doc_type_id)); ?>"><?php echo $type->name_th;?></a></h6></li>
        <?php }?>
<!--        <li><h6><a href="<?php echo Yii::app()->createUrl('admission'); ?>">สมัครเรียนออนไลน์</a></h6></li>-->
</ul>
<?php } ?>