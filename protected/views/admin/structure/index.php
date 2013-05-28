<?php
/* @var $this StructureController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'โครงสร้างหน่วยงาน',
        'ข้อมูลบุคลากร',
);

$this->menu=array(
	array('label'=>'Create Structure', 'url'=>array('create')),
	array('label'=>'Manage Structure', 'url'=>array('admin')),
);
?>

<h1>Structures</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
