<?php
/* @var $this AlumniController */
/* @var $model Alumni */

$this->breadcrumbs=array(
	'Alumnis'=>array('index'),
	$model->alumni_id,
);

$this->menu=array(
	array('label'=>'List Alumni', 'url'=>array('index')),
	array('label'=>'Create Alumni', 'url'=>array('create')),
	array('label'=>'Update Alumni', 'url'=>array('update', 'id'=>$model->alumni_id)),
	array('label'=>'Delete Alumni', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->alumni_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Alumni', 'url'=>array('admin')),
);
?>

<h1>View Alumni #<?php echo $model->alumni_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'alumni_id',
		'name_en',
		'name_th',
		'sex',
		'image',
		'major_en',
		'major_th',
		'campus_en',
		'campus_th',
		'position_en',
		'position_th',
		'desc_en',
		'desc_th',
		'sort_order',
		'status',
		'user_id',
		'time_stamp',
	),
)); ?>
