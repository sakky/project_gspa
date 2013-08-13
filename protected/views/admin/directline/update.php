<?php
/* @var $this DirectlineController */
/* @var $model Directline */

$this->breadcrumbs=array(
	'Directlines'=>array('index'),
	$model->name=>array('view','id'=>$model->direct_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Directline', 'url'=>array('index')),
	array('label'=>'Create Directline', 'url'=>array('create')),
	array('label'=>'View Directline', 'url'=>array('view', 'id'=>$model->direct_id)),
	array('label'=>'Manage Directline', 'url'=>array('admin')),
);
?>

<h1>Update Directline <?php echo $model->direct_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>