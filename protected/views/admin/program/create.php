<?php
/* @var $this ProgramController */
/* @var $model Program */

$this->breadcrumbs=array(
	'หลักสูตรที่เปิดสอน'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Program', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูลหลักสูตร', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูล หลักสูตรที่เปิดสอน</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>