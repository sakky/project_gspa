<?php
/* @var $this PersonnelController */
/* @var $model Personnel */

$this->breadcrumbs=array(
	'Personnels'=>array('index'),
	$model->personnel_id=>array('view','id'=>$model->personnel_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Personnel', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูลบุคลากร', 'url'=>array('create')),
	//array('label'=>'View Personnel', 'url'=>array('view', 'id'=>$model->personnel_id)),
	array('label'=>'จัดการข้อมูลบุคลากร', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลบุคลากร #<?php echo $model->personnel_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'personnel_type_list'=>$personnel_type_list,)); ?>