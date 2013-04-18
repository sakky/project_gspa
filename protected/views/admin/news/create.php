<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'ข่าวสาร'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูลข่าวสาร', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูลข่าวสาร</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'news_type_list'=>$news_type_list,)); ?>