<?php
/* @var $this SlideController */
/* @var $model Slide */

$this->breadcrumbs=array(
	'Slides'=>array('index'),
	$model->slide_id,
);

$this->menu=array(
	//array('label'=>'List Slide', 'url'=>array('index')),
	array('label'=>'Create Slide', 'url'=>array('create')),
	array('label'=>'Update Slide', 'url'=>array('update', 'id'=>$model->slide_id)),
	array('label'=>'Delete Slide', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->slide_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Slide', 'url'=>array('admin')),
);
?>

<h1>View Slide #<?php echo $model->slide_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'slide_id',
		'title_en',
		'title_th',
		'desc_en',
		'desc_th',
		'link_en',
		'link_th',
		'image',
		'sort_order',
		'status',
	),
)); ?>
