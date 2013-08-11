<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'ปฏิทินกิจกรรม'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Event', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูลปฏิทินกิจกรรม', 'url'=>array('create')),
	//array('label'=>'View Event', 'url'=>array('view', 'id'=>$model->event_id)),
	array('label'=>'จัดการข้อมูลปฏิทินกิจกรรม', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูล ปฏิทินกิจกรรม #<?php echo $model->event_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>