<?php
/* @var $this PageTypeController */
/* @var $model PageType */

$this->breadcrumbs=array(
	'Page Types'=>array('index'),
	$model->page_type_id,
);

$this->menu=array(
	//array('label'=>'List PageType', 'url'=>array('index')),
	array('label'=>'Create Page Type', 'url'=>array('create')),
	//array('label'=>'Delete PageType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->page_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Page Type', 'url'=>array('admin')),
        array('label'=>'Update Page Type', 'url'=>array('update', 'id'=>$model->page_type_id)),
);
?>

<h1>View PageType #<?php echo $model->page_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'page_type_id',
		'name_en',
		'name_th',
		'sort_order',
		'status',
	),
)); ?>
