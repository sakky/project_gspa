<?php
/* @var $this StructureTypeController */
/* @var $model StructureType */

$this->breadcrumbs=array(
	'ประเภทโครงสร้าง'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List StructureType', 'url'=>array('index')),
	array('label'=>'เพิ่มประเภทโครงสร้าง', 'url'=>array('create')),
	//array('label'=>'View StructureType', 'url'=>array('view', 'id'=>$model->str_type_id)),
	array('label'=>'จัดการประเภทโครงสร้าง', 'url'=>array('admin')),
);
?>

<h1>แก้ไขประเภทโครงสร้าง #<?php echo $model->str_type_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>