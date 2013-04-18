<?php
/* @var $this AlumniController */
/* @var $model Alumni */

$this->breadcrumbs=array(
	'ข้อมูลศิษย์เก่า'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Alumni', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูลศิษย์เก่า', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูลศิษย์เก่า</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>