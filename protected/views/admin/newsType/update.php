<?php
/* @var $this NewsTypeController */
/* @var $model NewsType */

$this->breadcrumbs=array(
	'ประเภทหลัก ประชาสัมพันธ์/กิจกรรม'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List NewsType', 'url'=>array('index')),
	array('label'=>'เพิ่มประเภทหลัก', 'url'=>array('create')),
	//array('label'=>'View NewsType', 'url'=>array('view', 'id'=>$model->news_type_id)),
	array('label'=>'จัดการประเภทหลัก', 'url'=>array('admin')),
);
?>

<h1>แก้ไขประเภทหลัก #<?php echo $model->news_type_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>