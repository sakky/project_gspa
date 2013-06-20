<?php
/* @var $this DocumentTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'ประเภทสื่อเผยแพร่',
);

$this->menu=array(
	array('label'=>'เพิ่มประเภท', 'url'=>array('create')),
	array('label'=>'จัดการประเภท', 'url'=>array('admin')),
);
?>

<h1>จัดการประเภทสื่อเผยแพร่</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
