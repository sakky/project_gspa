<?php
/* @var $this BoardController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'คณะกรรมการ',
);

$this->menu=array(
	array('label'=>'Create Board', 'url'=>array('create')),
	array('label'=>'Manage Board', 'url'=>array('admin')),
);
?>

<h1>คณะกรรมการ</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
