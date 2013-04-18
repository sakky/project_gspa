<?php
/* @var $this ProgramController */
/* @var $model Program */

$this->breadcrumbs=array(
	'Programs'=>array('index'),
	$model->program_id,
);

$this->menu=array(
	array('label'=>'List Program', 'url'=>array('index')),
	array('label'=>'Create Program', 'url'=>array('create')),
	array('label'=>'Update Program', 'url'=>array('update', 'id'=>$model->program_id)),
	array('label'=>'Delete Program', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->program_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Program', 'url'=>array('admin')),
);
?>

<h1>View Program #<?php echo $model->program_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'program_id',
		'program_type',
		'name_en',
		'name_th',
		'desc_en',
		'desc_th',
		'pdf_en',
		'pdf_th',
		'sort_order',
		'status',
		'user_id',
		'time_stamp',
	),
)); ?>
