<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->breadcrumbs=array(
	'หน่วยงานภายใน'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(	
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูลหน่วยงานภายใน</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>