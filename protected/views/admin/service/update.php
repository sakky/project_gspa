<?php
/* @var $this ServiceController */
/* @var $model Document */

$this->breadcrumbs=array(
	'บริการ'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Document', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
	//array('label'=>'View Document', 'url'=>array('view', 'id'=>$model->doc_id)),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลบริการ #<?php echo $model->doc_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'doc_type_list'=>$doc_type_list)); ?>