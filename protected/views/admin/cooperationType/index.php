<?php
/* @var $this CooperationTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cooperation Types',
);

$this->menu=array(
	array('label'=>'Create CooperationType', 'url'=>array('create')),
	array('label'=>'Manage CooperationType', 'url'=>array('admin')),
);
?>

<h1>Cooperation Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
