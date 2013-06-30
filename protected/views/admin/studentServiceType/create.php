<?php
/* @var $this StudentServiceTypeController */
/* @var $model StudentServiceType */

$this->breadcrumbs=array(
	'ประเภทบริการนิสิต'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List StudentServiceType', 'url'=>array('index')),
	array('label'=>'จัดการประเภท', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูลประเภทบริการนิสิต</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'ser_group_list'=>$ser_group_list)); ?>