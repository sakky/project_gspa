<?php
/* @var $this CooperationController */
/* @var $model Cooperation */

$this->breadcrumbs=array(
	'ความร่วมมือ'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Cooperation', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
	//array('label'=>'View Cooperation', 'url'=>array('view', 'id'=>$model->co_id)),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลความร่วมมือ #<?php echo $model->co_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'co_type_list'=>$co_type_list)); ?>