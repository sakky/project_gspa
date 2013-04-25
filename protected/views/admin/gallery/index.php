<?php
/* @var $this GalleryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'ภาพกิจกรรม',
);

$this->menu=array(
	array('label'=>'เพิ่มอัลบั้มภาพกิจกรรม', 'url'=>array('create')),
	array('label'=>'จัดการภาพกิจกรรม', 'url'=>array('admin')),
);
?>

<h1>อัลบั้มภาพกิจกรรม</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
