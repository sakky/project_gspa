<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'ภาพกิจกรรม'=>array('index'),
	'เพิ่มอัลบั้ม',
);

$this->menu=array(
        array('label'=>'จัดการภาพกิจกรรม', 'url'=>array('admin')),
	
);
?>

<h1>เพิ่มอัลบั้มภาพกิจกรรม</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>