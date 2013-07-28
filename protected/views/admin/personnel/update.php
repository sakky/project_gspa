<?php
/* @var $this PersonnelController */
/* @var $model Personnel */

$this->breadcrumbs=array(
	'Personnels'=>array('index'),
	$model->personnel_id=>array('view','id'=>$model->personnel_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Personnel', 'url'=>array('index')),
	array('label'=>'Create Personnel', 'url'=>array('create')),
	array('label'=>'View Personnel', 'url'=>array('view', 'id'=>$model->personnel_id)),
	array('label'=>'Manage Personnel', 'url'=>array('admin')),
);
?>

<h1>Update Personnel <?php echo $model->personnel_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'personnel_type_list'=>$personnel_type_list,)); ?>