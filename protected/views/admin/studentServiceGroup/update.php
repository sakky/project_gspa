<?php
/* @var $this StudentServiceGroupController */
/* @var $model StudentServiceGroup */

$this->breadcrumbs=array(
	'ประเภทหลักบริการนิสิต'=>array('index'),
        'แก้ไขประเภทหลัก',
);

$this->menu=array(
	//array('label'=>'List StudentServiceGroup', 'url'=>array('index')),
	array('label'=>'เพิ่มประเภทหลัก', 'url'=>array('create')),
	//array('label'=>'View StudentServiceGroup', 'url'=>array('view', 'id'=>$model->ser_group)),
	array('label'=>'จัดการประเภทหลัก', 'url'=>array('admin')),
);
?>

<h1>แก้ไขประเภทหลักบริการนิสิต <?php echo $model->ser_group; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>