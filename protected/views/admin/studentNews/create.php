<?php
/* @var $this StudentNewsController */
/* @var $model StudentNews */

$this->breadcrumbs=array(
	'Student News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StudentNews', 'url'=>array('index')),
	array('label'=>'Manage StudentNews', 'url'=>array('admin')),
);
?>

<h1>Create StudentNews</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>