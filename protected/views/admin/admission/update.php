<?php
/* @var $this AdmissionController */
/* @var $model Admission */

$this->breadcrumbs=array(
	'Admissions'=>array('index'),
	$model->title=>array('view','id'=>$model->admission_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Admission', 'url'=>array('index')),
	array('label'=>'Create Admission', 'url'=>array('create')),
	array('label'=>'View Admission', 'url'=>array('view', 'id'=>$model->admission_id)),
	array('label'=>'Manage Admission', 'url'=>array('admin')),
);
?>

<h1>Update Admission <?php echo $model->admission_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>