<?php 
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?> 
<ul class="list-1">
    <?php
        $criteria = new CDbCriteria();
        $criteria->condition = 'status=:status';
        $criteria->params=array(':status'=>1);
        $criteria->order = 'sort_order';
        $doc_type = DocumentType::model()->findAll($criteria);

        foreach($doc_type as $type) {
    ?>
    <li><h6><a href="<?php echo Yii::app()->createUrl('document/type', array('id'=>$type->doc_type_id)); ?>"><?php echo $type->name_en;?></a></h6></li>        
    <?php }?>
<!--     <li><h6><a href="<?php echo Yii::app()->createUrl('document'); ?>">Document</a></h6></li>
     <li><h6><a href="<?php echo Yii::app()->createUrl('page', array('id'=>16)); ?>">Thesis / Dissertation</a></h6></li>
     <li class="last-item"><h6><a href="<?php echo Yii::app()->createUrl('page', array('id'=>17)); ?>">Special problems / Thesis work</a></h6></li>         -->
</ul>
<?php }else{?>
<ul class="list-1">
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status';
            $criteria->params=array(':status'=>1);
            $criteria->order = 'sort_order';
            $doc_type = DocumentType::model()->findAll($criteria);

            foreach($doc_type as $type) {
        ?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('document/type', array('id'=>$type->doc_type_id)); ?>"><?php echo $type->name_th;?></a></h6></li>        
        <?php }?>
<!--     <li><h6><a href="<?php echo Yii::app()->createUrl('document'); ?>">เอกสารประกอบการเรียน</a></h6></li>
     <li><h6><a href="<?php echo Yii::app()->createUrl('page', array('id'=>16)); ?>">วิทยานิพนธ์ / ดุษฎีนิพนธ์</a></h6></li>
     <li class="last-item"><h6><a href="<?php echo Yii::app()->createUrl('page', array('id'=>17)); ?>">ปัญหาพิเศษ / งานนิพนธ์</a></h6></li>         -->
</ul>
<?php } ?>
<br/>
<br/>
