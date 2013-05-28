<?php
/* @var $this StructureTypeController */
/* @var $model StructureType */

$this->breadcrumbs=array(
	'ประเภทโครงสร้าง'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List StructureType', 'url'=>array('index')),
	array('label'=>'จัดการประเภทโครงสร้าง', 'url'=>array('admin')),
);
?>

<h1>เพิ่มประเภทโครงสร้าง</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>