<?php
/* @var $this NewsGroupController */
/* @var $model NewsGroup */

$this->breadcrumbs=array(
	'ประชาสัมพันธ์/กิจกรรม ภายใน'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List NewsGroup', 'url'=>array('index')),
	array('label'=>'เพิ่มประเภท', 'url'=>array('create')),
	//array('label'=>'View NewsGroup', 'url'=>array('view', 'id'=>$model->news_group_id)),
	array('label'=>'จัดการประเภท', 'url'=>array('admin')),
);
?>

<h1>แก้ไขประเภท #<?php echo $model->news_group_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'news_type_list'=>$news_type_list,)); ?>