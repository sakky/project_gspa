<?php
/* @var $this AlumniController */
/* @var $model Alumni */

$this->breadcrumbs=array(
	'ข้อมูลศิษย์เก่า'=>array('index'),
	'แก้ไขมูล',
);

$this->menu=array(
	//array('label'=>'List Alumni', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูลศิษย์เก่า', 'url'=>array('create')),
	//array('label'=>'View Alumni', 'url'=>array('view', 'id'=>$model->alumni_id)),
	array('label'=>'จัดการข้อมูลศิษย์เก่า', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลศิษย์เก่า #<?php echo $model->alumni_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>