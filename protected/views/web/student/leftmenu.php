<?php 
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?> 
<ul class="list-1">
        <?php
            //$ServiceGroup = StudentServiceGroup::model()->findAll();
            $criteria = new CDbCriteria();
            $criteria->order = 'sort_order';
            $ServiceGroup = StudentServiceGroup::model()->findAll($criteria);        

            foreach($ServiceGroup as $v) {
            $ser_group = $v->ser_group;
        ?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('student',array('group'=>$v['ser_group'])); ?>"><?php echo $v->ser_name_en;?></a></h6></li>
            <?php
                $criteria = new CDbCriteria();
                $criteria->condition = 'status = 1 AND ser_group=:ser_group';
                $criteria->params = array(':ser_group'=>$ser_group);
                $criteria->order = 'sort_order';
                $co_type = StudentServiceType::model()->findAll($criteria);

                foreach($co_type as $type) {
            ?>
            <li><a href="<?php echo Yii::app()->createUrl('student', array('type_id'=>$type->ser_type_id)); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<?php echo $type->name_en;?></a></li>        
            <?php }?>            
        <?php }?>        
</ul>
<?php }else{?>
        <ul class="list-1">
        <?php
            //$ServiceGroup = StudentServiceGroup::model()->findAll();
            $criteria = new CDbCriteria();
            $criteria->order = 'sort_order';
            $ServiceGroup = StudentServiceGroup::model()->findAll($criteria);        
        
            foreach($ServiceGroup as $v) {
            $ser_group = $v->ser_group;
        ?>
        <li><h6><a href="<?php echo Yii::app()->createUrl('student',array('group'=>$v['ser_group'])); ?>"><?php echo $v->ser_name;?></a></h6></li>
            <?php
                $criteria = new CDbCriteria();
                $criteria->condition = 'status = 1 AND ser_group=:ser_group';
                $criteria->params = array(':ser_group'=>$ser_group);
                $criteria->order = 'sort_order';
                $co_type = StudentServiceType::model()->findAll($criteria);

                foreach($co_type as $type) {
            ?>
            <li><a href="<?php echo Yii::app()->createUrl('student', array('type_id'=>$type->ser_type_id)); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<?php echo $type->name_th;?></a></li>        
            <?php }?>            
        <?php }?>    
</ul>
<?php } ?>