<?php
/* @var $this CooperationController */
/* @var $model Cooperation */

$this->breadcrumbs=array(
	'ความร่วมมือ'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Cooperation', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูลความร่วมมือ</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'co_type_list'=>$co_type_list)); ?>