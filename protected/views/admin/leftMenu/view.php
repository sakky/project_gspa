<?php
/* @var $this LeftMenuController */
/* @var $model LeftMenu */

$this->breadcrumbs=array(
	'Left Menus'=>array('index'),
	$model->left_menu_id,
);

$this->menu=array(
	//array('label'=>'List LeftMenu', 'url'=>array('index')),
	array('label'=>'Create LeftMenu', 'url'=>array('create')),
	array('label'=>'Update LeftMenu', 'url'=>array('update', 'id'=>$model->left_menu_id)),
	array('label'=>'Delete LeftMenu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->left_menu_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LeftMenu', 'url'=>array('admin')),
);
?>

<h1>View LeftMenu #<?php echo $model->left_menu_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'left_menu_id',
		'page_type_id',
		'name_en',
		'name_th',
		'title_en',
		'title_th',
		'desc_en',
		'desc_th',
		'images',
		'create_date',
		'sort_order',
		'status',
		'user_id',
		'time_stamp',
	),
)); ?>
