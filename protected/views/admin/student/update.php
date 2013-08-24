<?php
/* @var $this StudentController */
/* @var $model News */

$this->breadcrumbs=array(
	'ประกาศวิชาการ'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
	//array('label'=>'View News', 'url'=>array('view', 'id'=>$model->news_id)),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลประกาศวิชาการ #<?php echo $model->news_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>