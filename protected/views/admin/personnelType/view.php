<?php
/* @var $this PersonnelTypeController */
/* @var $model PersonnelType */

$this->breadcrumbs=array(
	'Personnel Types'=>array('index'),
	$model->personnel_type_id,
);

$this->menu=array(
	array('label'=>'List PersonnelType', 'url'=>array('index')),
	array('label'=>'Create PersonnelType', 'url'=>array('create')),
	array('label'=>'Update PersonnelType', 'url'=>array('update', 'id'=>$model->personnel_type_id)),
	array('label'=>'Delete PersonnelType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->personnel_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PersonnelType', 'url'=>array('admin')),
);
?>

<h1>View PersonnelType #<?php echo $model->personnel_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'personnel_type_id',
		'name_en',
		'name_th',
		'sort_order',
		'status',
	),
)); ?>
