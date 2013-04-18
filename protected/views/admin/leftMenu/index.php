<?php
/* @var $this LeftMenuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Left Menus',
);

$this->menu=array(
	array('label'=>'Create Left Menu', 'url'=>array('create')),
	array('label'=>'Manage Left Menu', 'url'=>array('admin')),
);
?>

<h1>Left Menus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
