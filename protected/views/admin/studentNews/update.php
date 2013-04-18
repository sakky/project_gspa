<?php
/* @var $this StudentNewsController */
/* @var $model StudentNews */

$this->breadcrumbs=array(
	'Student News'=>array('index'),
	$model->news_id=>array('view','id'=>$model->news_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudentNews', 'url'=>array('index')),
	array('label'=>'Create StudentNews', 'url'=>array('create')),
	array('label'=>'View StudentNews', 'url'=>array('view', 'id'=>$model->news_id)),
	array('label'=>'Manage StudentNews', 'url'=>array('admin')),
);
?>

<h1>Update StudentNews <?php echo $model->news_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>