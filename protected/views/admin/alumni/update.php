<?php
/* @var $this AlumniController */
/* @var $model Alumni */

$this->breadcrumbs=array(
	'ทำเนียบนิสิต'=>array('index'),
	'แก้ไขมูล',
);

$this->menu=array(
	//array('label'=>'List Alumni', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
	//array('label'=>'View Alumni', 'url'=>array('view', 'id'=>$model->alumni_id)),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลนิสิต #<?php echo $model->alumni_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'alumni_no_list'=>$alumni_no_list)); ?>