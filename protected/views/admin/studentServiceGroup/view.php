<?php
/* @var $this StudentServiceGroupController */
/* @var $model StudentServiceGroup */

$this->breadcrumbs=array(
	'Student Service Groups'=>array('index'),
	$model->ser_group,
);

$this->menu=array(
	array('label'=>'List StudentServiceGroup', 'url'=>array('index')),
	array('label'=>'Create StudentServiceGroup', 'url'=>array('create')),
	array('label'=>'Update StudentServiceGroup', 'url'=>array('update', 'id'=>$model->ser_group)),
	array('label'=>'Delete StudentServiceGroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ser_group),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentServiceGroup', 'url'=>array('admin')),
);
?>

<h1>View StudentServiceGroup #<?php echo $model->ser_group; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ser_group',
		'ser_name',
	),
)); ?>
