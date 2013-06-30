<?php
/* @var $this UserGroupController */
/* @var $model UserGroup */

$this->breadcrumbs=array(
	'ประเภทผู้ใช้งาน'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List UserGroup', 'url'=>array('index')),
	array('label'=>'เพิ่มประเภทผู้ใช้งาน', 'url'=>array('create')),
	//array('label'=>'View UserGroup', 'url'=>array('view', 'id'=>$model->user_group_id)),
	array('label'=>'จัดการประเภทผู้ใช้งาน', 'url'=>array('admin')),
);
?>

<h1>แก้ไขประเภทผู้ใช้งาน #<?php echo $model->user_group_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'menu_list' => $menu_list)); ?>