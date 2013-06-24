<?php
/* @var $this AlumniNoController */
/* @var $model AlumniNo */

$this->breadcrumbs=array(
	'Alumni Nos'=>array('index'),
	$model->alumni_no_id,
);

$this->menu=array(
	array('label'=>'List AlumniNo', 'url'=>array('index')),
	array('label'=>'Create AlumniNo', 'url'=>array('create')),
	array('label'=>'Update AlumniNo', 'url'=>array('update', 'id'=>$model->alumni_no_id)),
	array('label'=>'Delete AlumniNo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->alumni_no_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AlumniNo', 'url'=>array('admin')),
);
?>

<h1>View AlumniNo #<?php echo $model->alumni_no_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'alumni_no_id',
		'name_en',
		'name_th',
		'alumni_group',
		'sort_order',
		'status',
	),
)); ?>
