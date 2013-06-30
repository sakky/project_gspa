<?php
/* @var $this StudentServiceTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Student Service Types',
);

$this->menu=array(
	array('label'=>'Create StudentServiceType', 'url'=>array('create')),
	array('label'=>'Manage StudentServiceType', 'url'=>array('admin')),
);
?>

<h1>Student Service Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
