<?php
/* @var $this ExecutiveController */
/* @var $model Executive */

$this->breadcrumbs=array(
	'ผู้บริหาร'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Executive', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูลผู้บริหาร', 'url'=>array('create')),
	//array('label'=>'View Executive', 'url'=>array('view', 'id'=>$model->exec_id)),
	array('label'=>'จัดการข้อมูลผู้บริหาร', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูล ผู้บริหาร #<?php echo $model->exec_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>