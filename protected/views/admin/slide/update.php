<?php
/* @var $this SlideController */
/* @var $model Slide */

$this->breadcrumbs=array(
	'Slides'=>array('index'),
	$model->slide_id=>array('view','id'=>$model->slide_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Slide', 'url'=>array('index')),
	array('label'=>'Create Slide', 'url'=>array('create')),
	//array('label'=>'View Slide', 'url'=>array('view', 'id'=>$model->slide_id)),
	array('label'=>'Manage Slide', 'url'=>array('admin')),
);
?>

<h1>Update Slide <?php echo $model->slide_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'order_list'=>$order_list)); ?>