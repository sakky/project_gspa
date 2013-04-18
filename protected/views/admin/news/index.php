<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'ข่าวสาร',
);

$this->menu=array(
	array('label'=>'เพิ่มข้อมูลข่าวสาร', 'url'=>array('create')),
	//array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<h1>News</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
