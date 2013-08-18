<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'ประชาสัมพันธ์/กิจกรรม จากสื่อ'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>เพิ่มประชาสัมพันธ์/กิจกรรม จากสื่อ</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'news_type_list'=>$news_type_list,'news_group_list'=>$news_group_list,)); ?>