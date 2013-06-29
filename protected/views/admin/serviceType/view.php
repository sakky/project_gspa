<?php
/* @var $this ServiceTypeController */
/* @var $model DocumentType */

$this->breadcrumbs=array(
	'Document Types'=>array('index'),
	$model->doc_type_id,
);

$this->menu=array(
	array('label'=>'List DocumentType', 'url'=>array('index')),
	array('label'=>'Create DocumentType', 'url'=>array('create')),
	array('label'=>'Update DocumentType', 'url'=>array('update', 'id'=>$model->doc_type_id)),
	array('label'=>'Delete DocumentType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->doc_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DocumentType', 'url'=>array('admin')),
);
?>

<h1>View DocumentType #<?php echo $model->doc_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'doc_type_id',
		'doc_group',
		'name_en',
		'name_th',
		'sort_order',
		'status',
	),
)); ?>
