<?php
/* @var $this LeftMenuController */
/* @var $model LeftMenu */

$this->breadcrumbs=array(
	'Left Menus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Left Menu', 'url'=>array('index')),
	array('label'=>'Manage Left Menu', 'url'=>array('admin')),
);
?>

<h1>Create Left Menu</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'page_type_list'=>$page_type_list,'page_id_list'=>$page_id_list,)); ?>