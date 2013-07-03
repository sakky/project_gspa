<?php 
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?> 
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('report'); ?>">Report</a></h6></li>
        <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status';
            $criteria->params=array(':status'=>1);
            $criteria->order = 'sort_order';
            $reportType = ReportType::model()->findAll($criteria);

            foreach($reportType as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('report', array('type_id'=>$type->report_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
        <?php }?>
</ul>
<?php }else{?>
<ul class="list-1">
        <li><h6><a href="<?php echo Yii::app()->createUrl('report'); ?>">รายงานผลการดำเนินงาน</a></h6></li>
         <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status';
            $criteria->params=array(':status'=>1);
            $criteria->order = 'sort_order';
            $reportType = ReportType::model()->findAll($criteria);

            foreach($reportType as $type) {
        ?>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" style="padding-top: 7px"/>&nbsp;<a href="<?php echo Yii::app()->createUrl('report', array('type_id'=>$type->report_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
        <?php }?>
</ul>
<?php } ?>
