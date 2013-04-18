<?php
/* @var $this NewsTypeController */
/* @var $model NewsType */

$this->breadcrumbs=array(
	'News Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NewsType', 'url'=>array('index')),
	array('label'=>'Manage NewsType', 'url'=>array('admin')),
);
?>

<h1>Create NewsType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>