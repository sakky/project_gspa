<?php
/* @var $this UserGroupController */
/* @var $model UserGroup */

$this->breadcrumbs=array(
	'ประเภทผู้ใช้งาน'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List UserGroup', 'url'=>array('index')),
	array('label'=>'จัดการประเภทผู้ใช้งาน', 'url'=>array('admin')),
);
?>

<h1>เพิ่มประเภทผู้ใช้งาน</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'menu_list' => $menu_list)); ?>