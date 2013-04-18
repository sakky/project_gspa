<?php
/* @var $this ProgramController */
/* @var $model Program */

$this->breadcrumbs=array(
	'หลักสูตรที่เปิดสอน'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Program', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูลหลักสูตร', 'url'=>array('create')),
	//array('label'=>'View Program', 'url'=>array('view', 'id'=>$model->program_id)),
	array('label'=>'จัดการข้อมูลหลักสูตร', 'url'=>array('admin')),
);
?>

<h1>Update Program <?php echo $model->program_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>