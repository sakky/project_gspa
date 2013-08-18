<?php
/* @var $this NewsGroupController */
/* @var $model NewsGroup */

$this->breadcrumbs=array(
	'ประเภทย่อย ประชาสัมพันธ์/กิจกรรม'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List NewsGroup', 'url'=>array('index')),
	array('label'=>'จัดการประเภทย่อย', 'url'=>array('admin')),
);
?>

<h1>เพิ่มประเภทย่อย</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'news_type_list'=>$news_type_list, )); ?>