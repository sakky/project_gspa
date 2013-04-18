<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->news_id=>array('view','id'=>$model->news_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูลข่าวสาร', 'url'=>array('create')),
	//array('label'=>'View News', 'url'=>array('view', 'id'=>$model->news_id)),
	array('label'=>'จัดการข้อมูลข่าวสาร', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลข่าวสาร #<?php echo $model->news_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'news_type_list'=>$news_type_list,)); ?>