<?php
/* @var $this SlideController */
/* @var $model Slide */

$this->breadcrumbs=array(
	'Slide'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Slide', 'url'=>array('index')),
	array('label'=>'เพิ่ม Slide', 'url'=>array('create')),
	//array('label'=>'View Slide', 'url'=>array('view', 'id'=>$model->slide_id)),
	array('label'=>'จัดการ Slide', 'url'=>array('admin')),
);
?>

<h1>แก้ไข Slide #<?php echo $model->slide_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'order_list'=>$order_list)); ?>