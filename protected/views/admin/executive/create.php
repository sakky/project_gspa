<?php
/* @var $this ExecutiveController */
/* @var $model Executive */

$this->breadcrumbs=array(
	'ผู้บริหาร'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Executive', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูลผู้บริหาร', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูล ผู้บริหาร</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>