<?php
/* @var $this DocumentTypeController */
/* @var $model DocumentType */

$this->breadcrumbs=array(
	'ประเภทสื่อเผยแพร่'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List DocumentType', 'url'=>array('index')),
	array('label'=>'จัดการประเภท', 'url'=>array('admin')),
);
?>

<h1>เพิ่มประเภทสื่อเผยแพร่</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>