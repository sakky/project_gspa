<?php
/* @var $this SlideController */
/* @var $model Slide */

$this->breadcrumbs=array(
	'Slide'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Slide', 'url'=>array('index')),
	array('label'=>'จัดการ Slide', 'url'=>array('admin')),
);
?>

<h1>เพิ่ม Slide</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'order_list'=>$order_list)); ?>