<?php
/* @var $this AlumniNoController */
/* @var $model AlumniNo */

$this->breadcrumbs=array(
	'Alumni Nos'=>array('index'),
	$model->alumni_no_id=>array('view','id'=>$model->alumni_no_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List AlumniNo', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
	//array('label'=>'View AlumniNo', 'url'=>array('view', 'id'=>$model->alumni_no_id)),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลรุ่นที่จบ #<?php echo $model->alumni_no_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>