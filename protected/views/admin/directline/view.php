<?php
/* @var $this DirectlineController */
/* @var $model Directline */
$this->breadcrumbs=array(
	'สายตรงคณบดี'=>array('index'),
	'ดูรายละเอียด',
);

$this->menu=array(
//	array('label'=>'List Directline', 'url'=>array('index')),
//	array('label'=>'Create Directline', 'url'=>array('create')),
//	array('label'=>'Update Directline', 'url'=>array('update', 'id'=>$model->direct_id)),
//	array('label'=>'Delete Directline', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->direct_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'จัดการข้อมูลสายตรงคณบดี', 'url'=>array('admin')),
);
?>

<h1>ดูข้อมูลสายตรงคณบดี #<?php echo $model->direct_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'direct_id',
		'name',
		'email',
		'subject',
		'message',
	),
)); ?>
