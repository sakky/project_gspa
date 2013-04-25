<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'ภาพกิจกรรม'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	array('label'=>'เพิ่มอัลบั้มภาพกิจกรรม', 'url'=>array('create')),
	array('label'=>'จัดการภาพกิจกรรม', 'url'=>array('admin')),
);
?>

<h1>แก้ไขอัลบั้มภาพกิจกรรม #<?php echo $model->gallery_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>