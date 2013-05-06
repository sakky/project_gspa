<?php
/* @var $this CooperationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cooperations',
);

$this->menu=array(
	array('label'=>'Create Cooperation', 'url'=>array('create')),
	array('label'=>'Manage Cooperation', 'url'=>array('admin')),
);
?>

<h1>Cooperations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
