<?php
/* @var $this StudentServiceTypeController */
/* @var $model StudentServiceType */

$this->breadcrumbs=array(
	'ประเภทย่อยบริการนิสิต'=>array('index'),
	'เพิ่มประเภทย่อย',
);

$this->menu=array(
	//array('label'=>'List StudentServiceType', 'url'=>array('index')),
	array('label'=>'จัดการประเภทย่อย', 'url'=>array('admin')),
);
?>

<h1>เพิ่มประเภทย่อยบริการนิสิต</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'ser_group_list'=>$ser_group_list)); ?>