<?php
/* @var $this StudentServiceController */
/* @var $model StudentService */

$this->breadcrumbs=array(
	'Student Services'=>array('index'),
	$model->ser_id,
);

$this->menu=array(
	array('label'=>'List StudentService', 'url'=>array('index')),
	array('label'=>'Create StudentService', 'url'=>array('create')),
	array('label'=>'Update StudentService', 'url'=>array('update', 'id'=>$model->ser_id)),
	array('label'=>'Delete StudentService', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ser_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentService', 'url'=>array('admin')),
);
?>

<h1>View StudentService #<?php echo $model->ser_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ser_id',
		'name_en',
		'name_th',
		'desc_en',
		'desc_th',
		'ser_type_id',
		'ser_group',
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
