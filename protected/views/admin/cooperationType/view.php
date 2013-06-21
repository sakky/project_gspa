<?php
/* @var $this CooperationTypeController */
/* @var $model CooperationType */

$this->breadcrumbs=array(
	'Cooperation Types'=>array('index'),
	$model->co_type_id,
);

$this->menu=array(
	array('label'=>'List CooperationType', 'url'=>array('index')),
	array('label'=>'Create CooperationType', 'url'=>array('create')),
	array('label'=>'Update CooperationType', 'url'=>array('update', 'id'=>$model->co_type_id)),
	array('label'=>'Delete CooperationType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->co_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CooperationType', 'url'=>array('admin')),
);
?>

<h1>View CooperationType #<?php echo $model->co_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'co_type_id',
		'name_en',
		'name_th',
		'group',
		'sort_order',
		'status',
	),
)); ?>
