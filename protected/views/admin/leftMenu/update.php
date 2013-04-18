<?php
/* @var $this LeftMenuController */
/* @var $model LeftMenu */

$this->breadcrumbs=array(
	'Left Menus'=>array('index'),
	$model->left_menu_id=>array('view','id'=>$model->left_menu_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List LeftMenu', 'url'=>array('index')),
	array('label'=>'Create Left Menu', 'url'=>array('create')),
	//array('label'=>'View LeftMenu', 'url'=>array('view', 'id'=>$model->left_menu_id)),
	array('label'=>'Manage Left Menu', 'url'=>array('admin')),
);
?>

<h1>Update Left Menu <?php echo $model->left_menu_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'page_type_list'=>$page_type_list,'page_id_list'=>$page_id_list,)); ?>