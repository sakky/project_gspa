<?php
/* @var $this StructureController */
/* @var $model Structure */

$this->breadcrumbs=array(
	'โครงสร้างหน่วยงาน'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Structure', 'url'=>array('index')),
	array('label'=>'จัดการโครงสร้างหน่วยงาน', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูล</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'str_type_list'=>$str_type_list,)); ?>