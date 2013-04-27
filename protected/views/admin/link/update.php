<?php
/* @var $this LinkController */
/* @var $model Link */

$this->breadcrumbs=array(
	'Link ที่เกี่ยวข้อง'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Link', 'url'=>array('index')),
	array('label'=>'เพิ่ม Link ที่เกี่ยวข้อง', 'url'=>array('create')),
	//array('label'=>'View Link', 'url'=>array('view', 'id'=>$model->link_id)),
	array('label'=>'จัดการ Link ที่เกี่ยวข้อง', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูล Link ที่เกี่ยวข้อง #<?php echo $model->link_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>