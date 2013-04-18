<?php
/* @var $this ExecutiveController */
/* @var $model Executive */

$this->breadcrumbs=array(
	'Executives'=>array('index'),
	$model->exec_id,
);

$this->menu=array(
	array('label'=>'List Executive', 'url'=>array('index')),
	array('label'=>'Create Executive', 'url'=>array('create')),
	array('label'=>'Update Executive', 'url'=>array('update', 'id'=>$model->exec_id)),
	array('label'=>'Delete Executive', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->exec_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Executive', 'url'=>array('admin')),
);
?>

<h1>View Executive #<?php echo $model->exec_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'exec_id',
		'name_en',
		'name_th',
		'sex',
		'position_en',
		'position_th',
		'image',
		'sort_order',
		'status',
		'time_stamp',
		'user_id',
	),
)); ?>
