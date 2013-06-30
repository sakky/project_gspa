<?php
/* @var $this StudentServiceTypeController */
/* @var $model StudentServiceType */

$this->breadcrumbs=array(
	'Student Service Types'=>array('index'),
	$model->ser_type_id,
);

$this->menu=array(
	array('label'=>'List StudentServiceType', 'url'=>array('index')),
	array('label'=>'Create StudentServiceType', 'url'=>array('create')),
	array('label'=>'Update StudentServiceType', 'url'=>array('update', 'id'=>$model->ser_type_id)),
	array('label'=>'Delete StudentServiceType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ser_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentServiceType', 'url'=>array('admin')),
);
?>

<h1>View StudentServiceType #<?php echo $model->ser_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ser_type_id',
		'ser_group',
		'name_en',
		'name_th',
		'sort_order',
		'status',
	),
)); ?>
