<?php
/* @var $this StudentNewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Student News',
);

$this->menu=array(
	array('label'=>'Create StudentNews', 'url'=>array('create')),
	array('label'=>'Manage StudentNews', 'url'=>array('admin')),
);
?>

<h1>Student News</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
