<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'ผู้ใช้งาน'=>array('index'),
	'เพิ่มผู้ใช้งาน',
);

$this->menu=array(
	//array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูลผู้ใช้งาน', 'url'=>array('admin')),
);
?>

<h1>เพิ่มผู้ใช้งาน</h1>

<?php echo $this->renderPartial('_form', array('user'=>$user,'user_group_data'=>$user_group_data)); ?>