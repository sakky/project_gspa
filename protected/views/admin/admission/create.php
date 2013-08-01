<?php
/* @var $this AdmissionController */
/* @var $model Admission */

$this->breadcrumbs=array(
	'Admissions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Admission', 'url'=>array('index')),
	array('label'=>'Manage Admission', 'url'=>array('admin')),
);
?>

<h1>Create Admission</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>