<?php
/* @var $this ServiceTypeController */
/* @var $model DocumentType */

$this->breadcrumbs=array(
	'ประเภทบริการ'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List DocumentType', 'url'=>array('index')),
	array('label'=>'เพิ่มประเภท', 'url'=>array('create')),
	//array('label'=>'View DocumentType', 'url'=>array('view', 'id'=>$model->doc_type_id)),
	array('label'=>'จัดการประเภท', 'url'=>array('admin')),
);
?>

<h1>แก้ไขประเภทบริการ</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>