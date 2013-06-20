<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'สื่อเผยแพร่/ดาวน์โหลด'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Document', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>เพิ่มสื่อเผยแพร่/ดาวน์โหลด</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'doc_type_list'=>$doc_type_list)); ?>