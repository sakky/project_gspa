<?php
/* @var $this KnowledgeTypeController */
/* @var $model KnowledgeType */

$this->breadcrumbs=array(
	'ประเภทการจัดการความรู้'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List KnowledgeType', 'url'=>array('index')),
	array('label'=>'เพิ่มประเภท', 'url'=>array('create')),
	//array('label'=>'View KnowledgeType', 'url'=>array('view', 'id'=>$model->know_type_id)),
	array('label'=>'จัดการประเภท', 'url'=>array('admin')),
);
?>

<h1>แก้ไขประเภทการจัดการความรู้</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>