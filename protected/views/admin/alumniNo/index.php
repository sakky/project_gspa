<?php
/* @var $this AlumniNoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alumni Nos',
);

$this->menu=array(
	array('label'=>'Create AlumniNo', 'url'=>array('create')),
	array('label'=>'Manage AlumniNo', 'url'=>array('admin')),
);
?>

<h1>Alumni Nos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
