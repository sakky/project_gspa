<?php
/* @var $this PageTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Page Types',
);

$this->menu=array(
	array('label'=>'Create Page Type', 'url'=>array('create')),
	array('label'=>'Manage Page Type', 'url'=>array('admin')),
);
?>

<h1>Page Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
