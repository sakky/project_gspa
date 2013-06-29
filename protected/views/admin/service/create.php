<?php
/* @var $this ServiceController */
/* @var $model Document */

$this->breadcrumbs=array(
	'บริการ'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Document', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูลบริการ</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'doc_type_list'=>$doc_type_list)); ?>