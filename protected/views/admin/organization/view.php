<?php
/* @var $this OrganizationController */
/* @var $model Link */

$this->breadcrumbs=array(
	'Links'=>array('index'),
	$model->link_id,
);

$this->menu=array(
	array('label'=>'List Link', 'url'=>array('index')),
	array('label'=>'Create Link', 'url'=>array('create')),
	array('label'=>'Update Link', 'url'=>array('update', 'id'=>$model->link_id)),
	array('label'=>'Delete Link', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->link_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Link', 'url'=>array('admin')),
);
?>

<h1>View Link #<?php echo $model->link_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'link_id',
		'name_en',
		'name_th',
		'link_en',
		'link_th',
		'type',
		'sort_order',
		'status',
		'user_id',
		'time_stamp',
	),
)); ?>
