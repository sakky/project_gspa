<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	$model->gallery_id,
);

$this->menu=array(
	array('label'=>'List Gallery', 'url'=>array('index')),
	array('label'=>'Create Gallery', 'url'=>array('create')),
	array('label'=>'Update Gallery', 'url'=>array('update', 'id'=>$model->gallery_id)),
	array('label'=>'Delete Gallery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->gallery_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Gallery', 'url'=>array('admin')),
);
?>

<h1>View Gallery #<?php echo $model->gallery_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'gallery_id',
		'name_en',
		'name_th',
		'desc_en',
		'desc_th',
		'image',
		'sort_order',
		'status',
		'user_id',
		'time_stamp',
	),
)); ?>
