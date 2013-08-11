<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'ปฏิทินกิจกรรม'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Event', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูลปฏิทินกิจกรรม', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูลปฏิทินกิจกรรม</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>