<?php
/* @var $this LinkController */
/* @var $model Link */

$this->breadcrumbs=array(
	'Link ที่เกี่ยวข้อง'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Link', 'url'=>array('index')),
	array('label'=>'จัดการ Link ที่เกี่ยวข้อง', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูล Link ที่เกี่ยวข้อง</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>