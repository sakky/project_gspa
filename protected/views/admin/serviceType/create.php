<?php
/* @var $this ServiceTypeController */
/* @var $model DocumentType */

$this->breadcrumbs=array(
	'ประเภทบริการ'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List DocumentType', 'url'=>array('index')),
	array('label'=>'จัดการประเภท', 'url'=>array('admin')),
);
?>

<h1>เพิ่มประเภทบริการ</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>