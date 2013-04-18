<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'เอกสารประกอบการเรียน'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Document', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูลเอกสาร', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูล เอกสารประกอบการเรียน</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>