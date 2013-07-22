<?php
/* @var $this PersonnelTypeController */
/* @var $model PersonnelType */

$this->breadcrumbs=array(
	'ประเภทบุคลากร'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List PersonnelType', 'url'=>array('index')),
	array('label'=>'เพิ่มประเภทบุคลกร', 'url'=>array('create')),
	///array('label'=>'View PersonnelType', 'url'=>array('view', 'id'=>$model->personnel_type_id)),
	array('label'=>'จัดการประเภทบุคลากร', 'url'=>array('admin')),
);
?>

<h1>แก้ไขประเภทบุคลากร #<?php echo $model->personnel_type_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>