<?php
/* @var $this KnowledgeTypeController */
/* @var $model KnowledgeType */

$this->breadcrumbs=array(
	'Knowledge Types'=>array('index'),
	$model->know_type_id,
);

$this->menu=array(
	array('label'=>'List KnowledgeType', 'url'=>array('index')),
	array('label'=>'Create KnowledgeType', 'url'=>array('create')),
	array('label'=>'Update KnowledgeType', 'url'=>array('update', 'id'=>$model->know_type_id)),
	array('label'=>'Delete KnowledgeType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->know_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KnowledgeType', 'url'=>array('admin')),
);
?>

<h1>View KnowledgeType #<?php echo $model->know_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'know_type_id',
		'name_en',
		'name_th',
		'know_group',
		'sort_order',
		'status',
	),
)); ?>
