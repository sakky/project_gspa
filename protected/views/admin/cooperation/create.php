<?php
/* @var $this CooperationController */
/* @var $model Cooperation */

$this->breadcrumbs=array(
	'ความร่วมมือทางวิชาการ'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Cooperation', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูลความร่วมมือฯ', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูล ความร่วมมือทางวิชาการ</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>