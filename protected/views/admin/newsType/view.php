<?php
/* @var $this NewsTypeController */
/* @var $model NewsType */

$this->breadcrumbs=array(
	'News Types'=>array('index'),
	$model->news_type_id,
);

$this->menu=array(
	array('label'=>'List NewsType', 'url'=>array('index')),
	array('label'=>'Create NewsType', 'url'=>array('create')),
	array('label'=>'Update NewsType', 'url'=>array('update', 'id'=>$model->news_type_id)),
	array('label'=>'Delete NewsType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->news_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NewsType', 'url'=>array('admin')),
);
?>

<h1>View NewsType #<?php echo $model->news_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'news_type_id',
		'name_en',
		'name_th',
		'sort_order',
		'status',
	),
)); ?>
