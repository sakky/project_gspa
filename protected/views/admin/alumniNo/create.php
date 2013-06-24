<?php
/* @var $this AlumniNoController */
/* @var $model AlumniNo */

$this->breadcrumbs=array(
	'รุ่นที่จบ'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List AlumniNo', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูลรุ่นที่จบ</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>