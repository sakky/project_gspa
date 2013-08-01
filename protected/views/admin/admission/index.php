<?php
/* @var $this AdmissionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Admissions',
);

$this->menu=array(
	array('label'=>'Create Admission', 'url'=>array('create')),
	array('label'=>'Manage Admission', 'url'=>array('admin')),
);
?>

<h1>Admissions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
