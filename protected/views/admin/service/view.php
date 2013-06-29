<?php
/* @var $this ServiceController */
/* @var $model Document */

$this->breadcrumbs=array(
	'Documents'=>array('index'),
	$model->doc_id,
);

$this->menu=array(
	array('label'=>'List Document', 'url'=>array('index')),
	array('label'=>'Create Document', 'url'=>array('create')),
	array('label'=>'Update Document', 'url'=>array('update', 'id'=>$model->doc_id)),
	array('label'=>'Delete Document', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->doc_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Document', 'url'=>array('admin')),
);
?>

<h1>View Document #<?php echo $model->doc_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'doc_id',
		'name_en',
		'name_th',
		'desc_en',
		'desc_th',
		'doc_type_id',
		'doc_group',
		'pdf_en',
		'pdf_th',
		'last_update',
		'counter',
		'sort_order',
		'status',
		'user_id',
		'time_stamp',
	),
)); ?>
