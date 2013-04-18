<?php
/* @var $this NewsTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'News Types',
);

$this->menu=array(
	array('label'=>'Create NewsType', 'url'=>array('create')),
	array('label'=>'Manage NewsType', 'url'=>array('admin')),
);
?>

<h1>News Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
