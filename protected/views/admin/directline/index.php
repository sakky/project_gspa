<?php
/* @var $this DirectlineController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Directlines',
);

$this->menu=array(
	array('label'=>'Create Directline', 'url'=>array('create')),
	array('label'=>'Manage Directline', 'url'=>array('admin')),
);
?>

<h1>Directlines</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
