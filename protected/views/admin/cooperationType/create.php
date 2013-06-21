<?php
/* @var $this CooperationTypeController */
/* @var $model CooperationType */

$this->breadcrumbs=array(
	'ประเภทความร่วมมือ'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	array('label'=>'จัดการประเภท', 'url'=>array('admin')),
        array('label'=>'เรียงลำดับประเภท', 'url'=>array('order')),
);
?>

<h1>เพิ่มประเภทความร่วมมือ</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>