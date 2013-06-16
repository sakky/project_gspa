<?php
/* @var $this NewsGroup2Controller */
/* @var $model NewsGroup */

$this->breadcrumbs=array(
	'ประชาสัมพันธ์/กิจกรรม จากสื่อ'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List NewsGroup', 'url'=>array('index')),
	array('label'=>'เพิ่มประเภท', 'url'=>array('create')),
	//array('label'=>'View NewsGroup', 'url'=>array('view', 'id'=>$model->news_group_id)),
	array('label'=>'จัดการประเภท', 'url'=>array('admin')),
);
?>

<h1>แก้ไขประเภท #<?php echo $model->news_group_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>