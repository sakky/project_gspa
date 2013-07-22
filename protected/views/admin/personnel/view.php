<?php
/* @var $this PersonnelController */
/* @var $model Personnel */

$this->breadcrumbs=array(
	'Personnels'=>array('index'),
	$model->personnel_id,
);

$this->menu=array(
	array('label'=>'List Personnel', 'url'=>array('index')),
	array('label'=>'Create Personnel', 'url'=>array('create')),
	array('label'=>'Update Personnel', 'url'=>array('update', 'id'=>$model->personnel_id)),
	array('label'=>'Delete Personnel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->personnel_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Personnel', 'url'=>array('admin')),
);
?>

<h1>View Personnel #<?php echo $model->personnel_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'personnel_id',
		'personnel_type_id',
		'name_en',
		'name_th',
		'sex',
		'position_en',
		'position_th',
		'detail_en',
		'detail_th',
		'image',
		'sort_order',
		'status',
		'time_stamp',
		'user_id',
	),
)); ?>
