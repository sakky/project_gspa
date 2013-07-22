<?php
/* @var $this PersonnelTypeController */
/* @var $model PersonnelType */

$this->breadcrumbs=array(
	'ประเภทบุคลากร'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List PersonnelType', 'url'=>array('index')),
	array('label'=>'จัดการประเภทบุคลากร', 'url'=>array('admin')),
);
?>

<h1>เพิ่มประเภทบุคลากร</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>