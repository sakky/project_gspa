<?php
/* @var $this StructureTypeController */
/* @var $model StructureType */

$this->breadcrumbs=array(
	'Structure Types'=>array('index'),
	$model->str_type_id,
);

$this->menu=array(
	array('label'=>'List StructureType', 'url'=>array('index')),
	array('label'=>'Create StructureType', 'url'=>array('create')),
	array('label'=>'Update StructureType', 'url'=>array('update', 'id'=>$model->str_type_id)),
	array('label'=>'Delete StructureType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->str_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StructureType', 'url'=>array('admin')),
);
?>

<h1>View StructureType #<?php echo $model->str_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'str_type_id',
		'name_en',
		'name_th',
		'sort_order',
		'status',
	),
)); ?>
