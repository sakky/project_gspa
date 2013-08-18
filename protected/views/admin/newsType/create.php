<?php
/* @var $this NewsTypeController */
/* @var $model NewsType */

$this->breadcrumbs=array(
	'ประเภทหลัก ประชาสัมพันธ์/กิจกรรม'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List NewsType', 'url'=>array('index')),
	array('label'=>'จัดการประเภทหลัก', 'url'=>array('admin')),
);
?>

<h1>เพิ่มประเภทหลัก</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>