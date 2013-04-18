<?php
/* @var $this NewsTypeController */
/* @var $model NewsType */

$this->breadcrumbs=array(
	'News Types'=>array('index'),
	$model->news_type_id=>array('view','id'=>$model->news_type_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NewsType', 'url'=>array('index')),
	array('label'=>'Create NewsType', 'url'=>array('create')),
	array('label'=>'View NewsType', 'url'=>array('view', 'id'=>$model->news_type_id)),
	array('label'=>'Manage NewsType', 'url'=>array('admin')),
);
?>

<h1>Update NewsType <?php echo $model->news_type_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>