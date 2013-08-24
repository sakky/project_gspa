<?php
/* @var $this ServiceTypeController */
/* @var $model DocumentType */

$this->breadcrumbs=array(
	'ประเภทสมัครเรียน'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List DocumentType', 'url'=>array('index')),
	array('label'=>'จัดการประเภท', 'url'=>array('admin')),
);
?>

<h1>เพิ่มประเภทสมัครเรียน</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>