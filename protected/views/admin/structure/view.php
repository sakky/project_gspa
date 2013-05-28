<?php
/* @var $this StructureController */
/* @var $model Structure */

$this->breadcrumbs=array(
	'Structures'=>array('index'),
	$model->str_id,
);

$this->menu=array(
	array('label'=>'List Structure', 'url'=>array('index')),
	array('label'=>'Create Structure', 'url'=>array('create')),
	array('label'=>'Update Structure', 'url'=>array('update', 'id'=>$model->str_id)),
	array('label'=>'Delete Structure', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->str_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Structure', 'url'=>array('admin')),
);
?>

<h1>View Structure #<?php echo $model->str_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'str_id',
		'str_type_id',
		'name_en',
		'name_th',
		'position_en',
		'position_th',
		'sex',
		'image',
		'sort_order',
		'status',
		'time_stamp',
		'user_id',
	),
)); ?>
