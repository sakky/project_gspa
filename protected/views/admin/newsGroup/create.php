<?php
/* @var $this NewsGroupController */
/* @var $model NewsGroup */

$this->breadcrumbs=array(
	'ประเภทประชาสัมพันธ์/กิจกรรม ภายใน'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List NewsGroup', 'url'=>array('index')),
	array('label'=>'จัดการประเภท', 'url'=>array('admin')),
);
?>

<h1>เพิ่มประเภท</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>