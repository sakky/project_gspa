<?php
/* @var $this PageTypeController */
/* @var $model PageType */

$this->breadcrumbs=array(
	'Page Types'=>array('index'),
	$model->page_type_id=>array('view','id'=>$model->page_type_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List PageType', 'url'=>array('index')),
	array('label'=>'Create Page Type', 'url'=>array('create')),
	//array('label'=>'View PageType', 'url'=>array('view', 'id'=>$model->page_type_id)),
	array('label'=>'Manage Page Type', 'url'=>array('admin')),
);
?>

<h1>Update PageType <?php echo $model->page_type_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>