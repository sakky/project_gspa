<?php
/* @var $this ReportController */
/* @var $model Report */

$this->breadcrumbs=array(
	'Reports'=>array('index'),
	$model->report_id,
);

$this->menu=array(
	array('label'=>'List Report', 'url'=>array('index')),
	array('label'=>'Create Report', 'url'=>array('create')),
	array('label'=>'Update Report', 'url'=>array('update', 'id'=>$model->report_id)),
	array('label'=>'Delete Report', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->report_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Report', 'url'=>array('admin')),
);
?>

<h1>View Report #<?php echo $model->report_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'report_id',
		'report_type_id',
		'name_en',
		'name_th',
		'desc_en',
		'desc_th',
		'pdf_en',
		'pdf_th',
		'sort_order',
		'status',
		'user_id',
		'time_stamp',
	),
)); ?>
