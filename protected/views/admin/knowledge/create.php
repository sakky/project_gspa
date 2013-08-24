<?php
/* @var $this KnowledgeController */
/* @var $model Knowledge */

$this->breadcrumbs=array(
	'การจัดการความรู้'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(	
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
        //array('label'=>'เรียงลำดับข้อมูล', 'url'=>array('order')),
);
?>

<h1>เพิ่มข้อมูลการจัดการความรู้</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'know_type_list'=>$know_type_list)); ?>