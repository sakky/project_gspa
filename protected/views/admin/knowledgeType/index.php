<?php
/* @var $this KnowledgeTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Knowledge Types',
);

$this->menu=array(
	array('label'=>'Create KnowledgeType', 'url'=>array('create')),
	array('label'=>'Manage KnowledgeType', 'url'=>array('admin')),
);
?>

<h1>Knowledge Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
