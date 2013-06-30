<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'ผู้ใช้งาน'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'เพิ่มผู้ใช้งาน', 'url'=>array('create')),
	//array('label'=>'View User', 'url'=>array('view', 'id'=>$model->user_id)),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลผู้ใช้งาน #<?php echo $user->user_id; ?></h1>

<?php echo $this->renderPartial('_form', array('user'=>$user,'user_group_data'=>$user_group_data)); ?>