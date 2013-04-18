<?php
/* @var $this ExecutiveController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Executives',
);

$this->menu=array(
	array('label'=>'Create Executive', 'url'=>array('create')),
	array('label'=>'Manage Executive', 'url'=>array('admin')),
);
?>

<h1>Executives</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
