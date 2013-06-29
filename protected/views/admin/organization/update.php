<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->breadcrumbs=array(
	'หน่วยงานภายใน'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Organization', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
	//array('label'=>'View Organization', 'url'=>array('view', 'id'=>$model->org_id)),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลหน่วยงาน #<?php echo $model->org_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>