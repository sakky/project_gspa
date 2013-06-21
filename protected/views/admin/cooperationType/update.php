<?php
/* @var $this CooperationTypeController */
/* @var $model CooperationType */

$this->breadcrumbs=array(
	'ความร่วมมือทางวิชาการ'=>array('index'),
        'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List CooperationType', 'url'=>array('index')),
	array('label'=>'เพิ่มประเภทความร่วมมือ', 'url'=>array('create')),
	//array('label'=>'View CooperationType', 'url'=>array('view', 'id'=>$model->co_type_id)),
	array('label'=>'จัดการประเภทความร่วมมือ', 'url'=>array('admin')),
);
?>

<h1>แก้ไขประเภทความร่วมมือ #<?php echo $model->co_type_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>