<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->page_id=>array('view','id'=>$model->page_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Page', 'url'=>array('index')),
	array('label'=>'Create Page', 'url'=>array('create')),
	//array('label'=>'View Page', 'url'=>array('view', 'id'=>$model->page_id)),
	array('label'=>'Manage Page', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลหน้า <?php echo $model->name_th; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'page_type_list'=>$page_type_list)); ?>