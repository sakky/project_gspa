<?php
/* @var $this KnowledgeController */
/* @var $model Knowledge */

$this->breadcrumbs=array(
	'Knowledges'=>array('index'),
	$model->know_id,
);

$this->menu=array(
	array('label'=>'List Knowledge', 'url'=>array('index')),
	array('label'=>'Create Knowledge', 'url'=>array('create')),
	array('label'=>'Update Knowledge', 'url'=>array('update', 'id'=>$model->know_id)),
	array('label'=>'Delete Knowledge', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->know_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Knowledge', 'url'=>array('admin')),
);
?>

<h1>View Knowledge #<?php echo $model->know_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'know_id',
		'know_group',
		'know_type_id',
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
