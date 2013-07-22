<?php
/* @var $this PersonnelController */
/* @var $model Personnel */

$this->breadcrumbs=array(
	'บุคลากร'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Personnel', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูบุคลากร', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูลบุคลากร</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'personnel_type_list'=>$personnel_type_list,)); ?>