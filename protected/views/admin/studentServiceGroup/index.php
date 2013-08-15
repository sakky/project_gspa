<?php
/* @var $this StudentServiceGroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Student Service Groups',
);

$this->menu=array(
	array('label'=>'Create StudentServiceGroup', 'url'=>array('create')),
	array('label'=>'Manage StudentServiceGroup', 'url'=>array('admin')),
);
?>

<h1>Student Service Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
