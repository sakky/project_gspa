<?php
/* @var $this StudentServiceController */
/* @var $model StudentService */

$this->breadcrumbs=array(
	'บริการนิสิต'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List StudentService', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูลบริการนิสิต</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'ser_group_list'=>$ser_group_list,'ser_type_list'=>$ser_type_list)); ?>