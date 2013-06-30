<?php
/* @var $this KnowledgeTypeController */
/* @var $model KnowledgeType */

$this->breadcrumbs=array(
	'ประเภทคลังข้อมูลความรู้'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(	
	array('label'=>'จัดการประเภท', 'url'=>array('admin')),
        array('label'=>'เรียงลำดับประเภท', 'url'=>array('order')),
);
?>

<h1>เพิ่มประเภทคลังข้อมูลความรู้</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>