<?php
/* @var $this StudentController */
/* @var $model News */

$this->breadcrumbs=array(
	'ประกาศ',
	'สมัครเรียน'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูล</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>