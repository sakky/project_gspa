<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'Boards'=>array('index'),
	$model->board_id,
);

$this->menu=array(
	array('label'=>'List Board', 'url'=>array('index')),
	array('label'=>'Create Board', 'url'=>array('create')),
	array('label'=>'Update Board', 'url'=>array('update', 'id'=>$model->board_id)),
	array('label'=>'Delete Board', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->board_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Board', 'url'=>array('admin')),
);
?>

<h1>View Board #<?php echo $model->board_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'board_id',
		'name_en',
		'name_th',
		'sex',
		'position_en',
		'position_th',
		'image',
		'sort_order',
		'status',
		'time_stamp',
		'user_id',
	),
)); ?>
