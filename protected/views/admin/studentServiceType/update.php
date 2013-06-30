<?php
/* @var $this StudentServiceTypeController */
/* @var $model StudentServiceType */

$this->breadcrumbs=array(
	'ประเภทบริการนิสิต'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List StudentServiceType', 'url'=>array('index')),
	array('label'=>'เพิ่มประเภท', 'url'=>array('create')),
	//array('label'=>'View StudentServiceType', 'url'=>array('view', 'id'=>$model->ser_type_id)),
	array('label'=>'จัดการประเภท', 'url'=>array('admin')),
);
?>

<h1>แก้ไขประเภทบริการนิสิต# <?php echo $model->ser_type_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'ser_group_list'=>$ser_group_list)); ?>