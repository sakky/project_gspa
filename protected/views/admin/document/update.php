<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'เอกสารประกอบการเรียน'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Document', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูลเอกสาร', 'url'=>array('create')),
	//array('label'=>'View Document', 'url'=>array('view', 'id'=>$model->doc_id)),
	array('label'=>'จัดการข้อมูลเอกสาร', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูล เอกสารประกอบการเรียน #<?php echo $model->doc_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>