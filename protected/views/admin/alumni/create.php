<?php
/* @var $this AlumniController */
/* @var $model Alumni */

$this->breadcrumbs=array(
	'ทำเนียบนิสิต'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Alumni', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูลศิษย์เก่า', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูลนิสิต</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'alumni_no_list'=>$alumni_no_list)); ?>