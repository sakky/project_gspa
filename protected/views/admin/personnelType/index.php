<?php
/* @var $this PersonnelTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Personnel Types',
);

$this->menu=array(
	array('label'=>'Create PersonnelType', 'url'=>array('create')),
	array('label'=>'Manage PersonnelType', 'url'=>array('admin')),
);
?>

<h1>Personnel Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
