<?php
/* @var $this ReportTypeController */
/* @var $model ReportType */

$this->breadcrumbs=array(
	'ประเภทรายงาน'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List ReportType', 'url'=>array('index')),
	array('label'=>'เพิ่มประเภท', 'url'=>array('create')),
	//array('label'=>'View ReportType', 'url'=>array('view', 'id'=>$model->report_type_id)),
	array('label'=>'จัดการประเภท', 'url'=>array('admin')),
);
?>

<h1>แก้ไขประเภทรายงาน #<?php echo $model->report_type_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>