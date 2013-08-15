<?php
/* @var $this StudentServiceGroupController */
/* @var $model StudentServiceGroup */

$this->breadcrumbs=array(
	'ประเภทหลักบริการนิสิต'=>array('index'),
	'เพิ่มประเภทหลัก',
);

$this->menu=array(
	//array('label'=>'List StudentServiceGroup', 'url'=>array('index')),
	array('label'=>'จัดการประเภทหลัก', 'url'=>array('admin')),
);
?>

<h1>เพิ่มประเภทหลักบริการนิสิต</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>