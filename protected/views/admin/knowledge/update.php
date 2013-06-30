<?php
/* @var $this KnowledgeController */
/* @var $model Knowledge */

$this->breadcrumbs=array(
	'คลังข้อมูลความรู้'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Knowledge', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
	//array('label'=>'View Knowledge', 'url'=>array('view', 'id'=>$model->know_id)),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลคลังข้อมูลความรู้ #<?php echo $model->know_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'know_type_list'=>$know_type_list)); ?>