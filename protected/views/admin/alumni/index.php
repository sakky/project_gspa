<?php
/* @var $this AlumniController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alumnis',
);

$this->menu=array(
	array('label'=>'Create Alumni', 'url'=>array('create')),
	array('label'=>'Manage Alumni', 'url'=>array('admin')),
);
?>

<h1>Alumnis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
