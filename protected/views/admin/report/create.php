<?php
/* @var $this ReportController */
/* @var $model Report */

$this->breadcrumbs=array(
	'รายงาน'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	array('label'=>'จัดการข้อมูล', 'url'=>array('index')),
);
?>

<h1>เพิ่มข้อมูลรายงาน</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'report_type_list'=>$report_type_list)); ?>