<?php
/* @var $this PageTypeController */
/* @var $model PageType */

$this->breadcrumbs=array(
	'Page Types'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List PageType', 'url'=>array('index')),
	array('label'=>'Manage Page Type', 'url'=>array('admin')),
);
?>

<h1>Create PageType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>