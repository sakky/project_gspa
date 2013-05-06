<?php
/* @var $this CooperationController */
/* @var $model Cooperation */

$this->breadcrumbs=array(
	'ความร่วมมือทางวิชาการ'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Cooperation', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูลความร่วมมือฯ', 'url'=>array('create')),
	//array('label'=>'View Cooperation', 'url'=>array('view', 'id'=>$model->co_id)),
	array('label'=>'จัดการข้อมูลความร่วมมือฯ', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูล ความร่วมมือทางวิชาการ #<?php echo $model->co_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>