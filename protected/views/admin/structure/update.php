<?php
/* @var $this StructureController */
/* @var $model Structure */

$this->breadcrumbs=array(
	'โครงสร้างหน่วยงาน',
        'ข้อมูลบุคลากร'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Structure', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูลบุคลากร', 'url'=>array('create')),
	//array('label'=>'View Structure', 'url'=>array('view', 'id'=>$model->str_id)),
	array('label'=>'จัดการข้อมูลบุคลากร', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลบุคลากร #<?php echo $model->str_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'str_type_list'=>$str_type_list,)); ?>