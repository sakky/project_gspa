<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'คณาจารย์'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Board', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูลคณาจารย์', 'url'=>array('create')),
	//array('label'=>'View Board', 'url'=>array('view', 'id'=>$model->board_id)),
	array('label'=>'จัดการข้อมูลคณาจารย์', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลคณาจารย์ #<?php echo $model->board_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>