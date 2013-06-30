<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'แก้ไขข้อมูลส่วนตัว',
);
?>

<h1>แก้ไขข้อมูลส่วนตัว</h1>

<?php echo $this->renderPartial('_edit', array('user'=>$user,'user_group_data'=>$user_group_data)); ?>