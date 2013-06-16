<?php
/* @var $this NewsGroup2Controller */
/* @var $model NewsGroup */

$this->breadcrumbs=array(
	'News Groups'=>array('index'),
	$model->news_group_id,
);

$this->menu=array(
	array('label'=>'List NewsGroup', 'url'=>array('index')),
	array('label'=>'Create NewsGroup', 'url'=>array('create')),
	array('label'=>'Update NewsGroup', 'url'=>array('update', 'id'=>$model->news_group_id)),
	array('label'=>'Delete NewsGroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->news_group_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NewsGroup', 'url'=>array('admin')),
);
?>

<h1>View NewsGroup #<?php echo $model->news_group_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'news_group_id',
		'news_type_id',
		'name_en',
		'name_th',
		'sort_order',
		'status',
	),
)); ?>
