<?php
/* @var $this UserGroupController */
/* @var $model UserGroup */

$this->breadcrumbs=array(
	'User Groups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List UserGroup', 'url'=>array('index')),
	array('label'=>'Create UserGroup', 'url'=>array('create')),
	array('label'=>'Update UserGroup', 'url'=>array('update', 'id'=>$model->user_group_id)),
	array('label'=>'Delete UserGroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_group_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserGroup', 'url'=>array('admin')),
);
?>

<h1>View UserGroup #<?php echo $model->user_group_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user_group_id',
		'name',
		'role',
		'user_menu',
	),
)); ?>
