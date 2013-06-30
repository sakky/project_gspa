<?php
/* @var $this StudentServiceController */
/* @var $model StudentService */

$this->breadcrumbs=array(
	'บริการนิสิต'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List StudentService', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
	//array('label'=>'View StudentService', 'url'=>array('view', 'id'=>$model->ser_id)),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลบริการนิสิต #<?php echo $model->ser_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'ser_group_list'=>$ser_group_list,'ser_type_list'=>$ser_type_list)); ?>