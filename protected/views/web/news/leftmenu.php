<?php 
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?> 
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('news'); ?>">GSPA News</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status AND news_type_id=5';
            $criteria->params=array(':status'=>1);
            $criteria->order = 'sort_order';
            $news_type = NewsGroup::model()->findAll($criteria);

            foreach($news_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('news/group', array('id'=>$type->news_group_id)); ?>"><?php echo $type->name_en;?></a></li>        
        <?php }?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('news/media'); ?>">Media News</a></h6></li>
        <?php
            $criteria2 = new CDbCriteria();
            $criteria2->condition = 'status=:status AND news_type_id=1';
            $criteria2->params=array(':status'=>1);
            $criteria2->order = 'sort_order';
            $news_group = NewsGroup::model()->findAll($criteria2);

            foreach($news_group as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('news/groupMedia', array('id'=>$type->news_group_id)); ?>"><?php echo $type->name_en;?></a></li>        
        <?php }?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('gallery'); ?>">Gallery</a></h6></li>
</ul>
<?php }else{?>
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('news'); ?>">ภายใน</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status AND news_type_id=5';
            $criteria->params=array(':status'=>1);
            $criteria->order = 'sort_order';
            $news_type = NewsGroup::model()->findAll($criteria);

            foreach($news_type as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('news/group', array('id'=>$type->news_group_id)); ?>"><?php echo $type->name_th;?></a></li>        
        <?php }?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('news/media'); ?>">จากสื่อ</a></h6></li>
        <?php
            $criteria2 = new CDbCriteria();
            $criteria2->condition = 'status=:status AND news_type_id=1';
            $criteria2->params=array(':status'=>1);
            $criteria2->order = 'sort_order';
            $news_group = NewsGroup::model()->findAll($criteria2);

            foreach($news_group as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('news/groupMedia', array('id'=>$type->news_group_id)); ?>"><?php echo $type->name_th;?></a></li>        
        <?php }?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('gallery'); ?>">ประมวลภาพกิจกรรม</a></h6></li>
</ul>   
<?php } ?>
