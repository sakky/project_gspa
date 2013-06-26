<?php
/* @var $this ReportController */
/* @var $model Report */

$this->breadcrumbs=array(
	'รายงานผลการดำเนินงาน'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
        array('label'=>'เรียงลำดับข้อมูล', 'url'=>array('order')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#report-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการข้อมูลรายงาน</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,'report_type_list'=>$report_type_list
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'report-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=>'report_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		), 
                array(
			'name'=>'name_th',                        
                        'header'=>'ชื่อรายงาน',
		),
                array(
			'name'=>'report_type_id',
                        'header'=> 'ประเภทรายงาน',
                        'value'=>'$data->reportType->name_th',
			'htmlOptions'=>array('style'=>'text-align: left;width: 150px;'),
                        'filter'=>CHtml::listData(ReportType::model()->findAll('status=1'), 'report_type_id', 'name_th'),

		),
                array(
			'name'=>'sort_order', 
			'htmlOptions'=>array('style'=>'text-align: center;width: 80px;'),
		),
                array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 60px;'),
                        'filter'=>array('1'=>'แสดง','0'=>'ไม่แสดง'),
		),
		/*
		'pdf_en',
		'pdf_th',
		'sort_order',
		'status',
		'user_id',
		'time_stamp',
		*/
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update}&nbsp;&nbsp;{delete}',
                        'headerHtmlOptions'=>array('style'=>'width:40px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),
		),
	),
)); ?>
