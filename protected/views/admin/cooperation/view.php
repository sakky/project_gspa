<?php
/* @var $this CooperationController */
/* @var $model Cooperation */

$this->breadcrumbs=array(
	'Cooperations'=>array('index'),
	$model->co_id,
);

$this->menu=array(
	array('label'=>'List Cooperation', 'url'=>array('index')),
	array('label'=>'Create Cooperation', 'url'=>array('create')),
	array('label'=>'Update Cooperation', 'url'=>array('update', 'id'=>$model->co_id)),
	array('label'=>'Delete Cooperation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->co_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cooperation', 'url'=>array('admin')),
);
?>

<h1>View Cooperation #<?php echo $model->co_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'co_id',
		'name_en',
		'name_th',
		'desc_en',
		'desc_th',
		'sort_order',
		'status',
		'user_id',
		'time_stamp',
	),
)); ?>
