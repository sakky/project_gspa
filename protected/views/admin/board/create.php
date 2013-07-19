<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'คณะกรรมการ'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Board', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูลคณะกรรมการ', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูลคณะกรรมการ</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>