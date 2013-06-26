<?php
/* @var $this ReportController */
/* @var $model Report */

$this->breadcrumbs=array(
	'รายงาน'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Report', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
	//array('label'=>'View Report', 'url'=>array('view', 'id'=>$model->report_id)),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลรายงาน #<?php echo $model->report_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'report_type_list'=>$report_type_list)); ?>