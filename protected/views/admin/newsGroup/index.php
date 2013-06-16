<?php
/* @var $this NewsGroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'News Groups',
);

$this->menu=array(
	array('label'=>'Create NewsGroup', 'url'=>array('create')),
	array('label'=>'Manage NewsGroup', 'url'=>array('admin')),
);
?>

<h1>News Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
