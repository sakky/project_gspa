<?php 
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?> 
<ul class="list-1">
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status AND news_type_id<>2 AND news_type_id<>3';
            $criteria->params=array(':status'=>1);
            $criteria->order = 'sort_order';
            $news_type = NewsType::model()->findAll($criteria);

            foreach($news_type as $type) {
        ?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('news',array('type_id'=>$type->news_type_id)); ?>"><?php echo $type->name_en;?></a></h6></li>
            <?php
                $criteria2 = new CDbCriteria();
                $criteria2->condition = 'status=:status AND news_type_id=:news_type_id';
                $criteria2->params=array(':status'=>1,':news_type_id'=>$type->news_type_id);
                $criteria2->order = 'sort_order';
                $news_group = NewsGroup::model()->findAll($criteria2);

                foreach($news_group as $group) {
            ?>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('news', array('group'=>$group->news_group_id)); ?>"><?php echo $group->name_en;?></a></li>        
            <?php }?>
        <?php }?>    
        <!--<li><h6><a href="<?php echo Yii::app()->createUrl('event'); ?>">Event Calendar</a></h6></li>-->
</ul>
<?php }else{?>
<ul class="list-1">
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status AND news_type_id<>2 AND news_type_id<>3';
            $criteria->params=array(':status'=>1);
            $criteria->order = 'sort_order';
            $news_type = NewsType::model()->findAll($criteria);

            foreach($news_type as $type) {
        ?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('news',array('type_id'=>$type->news_type_id)); ?>"><?php echo $type->name_th;?></a></h6></li>
            <?php
                $criteria2 = new CDbCriteria();
                $criteria2->condition = 'status=:status AND news_type_id=:news_type_id';
                $criteria2->params=array(':status'=>1,':news_type_id'=>$type->news_type_id);
                $criteria2->order = 'sort_order';
                $news_group = NewsGroup::model()->findAll($criteria2);

                foreach($news_group as $group) {
            ?>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('news', array('group'=>$group->news_group_id)); ?>"><?php echo $group->name_th;?></a></li>        
            <?php }?>
        <?php }?> 
        <!--<li><h6><a href="<?php echo Yii::app()->createUrl('event'); ?>">ปฏิทินกิจกรรม</a></h6></li>-->
</ul>   
<?php } ?>
