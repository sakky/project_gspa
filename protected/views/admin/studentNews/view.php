<?php
/* @var $this StudentNewsController */
/* @var $model StudentNews */

$this->breadcrumbs=array(
	'Student News'=>array('index'),
	$model->news_id,
);

$this->menu=array(
	array('label'=>'List StudentNews', 'url'=>array('index')),
	array('label'=>'Create StudentNews', 'url'=>array('create')),
	array('label'=>'Update StudentNews', 'url'=>array('update', 'id'=>$model->news_id)),
	array('label'=>'Delete StudentNews', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->news_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentNews', 'url'=>array('admin')),
);
?>

<h1>View StudentNews #<?php echo $model->news_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'news_id',
		'news_type_id',
		'name_en',
		'name_th',
		'title_en',
		'title_th',
		'desc_en',
		'desc_th',
		'image',
		'create_date',
		'show_homepage',
		'show_new',
		'status',
		'user_id',
		'time_stamp',
	),
)); ?>
