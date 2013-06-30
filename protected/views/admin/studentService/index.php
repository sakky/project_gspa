<?php
/* @var $this StudentServiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Student Services',
);

$this->menu=array(
	array('label'=>'Create StudentService', 'url'=>array('create')),
	array('label'=>'Manage StudentService', 'url'=>array('admin')),
);
?>

<h1>Student Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
