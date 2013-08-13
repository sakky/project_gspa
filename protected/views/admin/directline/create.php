<?php
/* @var $this DirectlineController */
/* @var $model Directline */

$this->breadcrumbs=array(
	'Directlines'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Directline', 'url'=>array('index')),
	array('label'=>'Manage Directline', 'url'=>array('admin')),
);
?>

<h1>Create Directline</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>