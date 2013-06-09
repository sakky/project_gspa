<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'สื่อเผยแพร่/ดาวน์โหลด'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Document', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูลสื่อเผยแพร่', 'url'=>array('create')),
	//array('label'=>'View Document', 'url'=>array('view', 'id'=>$model->doc_id)),
	array('label'=>'จัดการข้อมูลสื่อเผยแพร่', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูล สื่อเผยแพร่/ดาวน์โหลด #<?php echo $model->doc_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'doc_type_list'=>$doc_type_list)); ?>