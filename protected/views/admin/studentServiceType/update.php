<?php
/* @var $this StudentServiceTypeController */
/* @var $model StudentServiceType */

$this->breadcrumbs=array(
	'ประเภทย่อยบริการนิสิต'=>array('index'),
	'แก้ไขประเภทย่อย',
);

$this->menu=array(
	//array('label'=>'List StudentServiceType', 'url'=>array('index')),
	array('label'=>'เพิ่มประเภทย่อย', 'url'=>array('create')),
	//array('label'=>'View StudentServiceType', 'url'=>array('view', 'id'=>$model->ser_type_id)),
	array('label'=>'จัดการประเภทย่อย', 'url'=>array('admin')),
);
?>

<h1>แก้ไขประเภทย่อยบริการนิสิต# <?php echo $model->ser_type_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'ser_group_list'=>$ser_group_list)); ?>