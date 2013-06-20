<?php
/* @var $this DocumentTypeController */
/* @var $model DocumentType */

$this->breadcrumbs=array(
	'ประเภทสื่อเผยแพร่'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List DocumentType', 'url'=>array('index')),
	array('label'=>'เพิ่มประเภท', 'url'=>array('create')),
	//array('label'=>'View DocumentType', 'url'=>array('view', 'id'=>$model->doc_type_id)),
	array('label'=>'จัดการประเภท', 'url'=>array('admin')),
);
?>

<h1>แก้ไขประเภทสื่อเผยแพร่ #<?php echo $model->doc_type_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>