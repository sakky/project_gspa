<?php
$this->breadcrumbs=array(
	'Sessions'=>array('index'),
	$model->session_id=>array('view','id'=>$model->session_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Session', 'url'=>array('index')),
	array('label'=>'Create Session', 'url'=>array('create')),
	//array('label'=>'View Session', 'url'=>array('view', 'id'=>$model->session_id)),
	array('label'=>'Manage Session', 'url'=>array('admin')),
);
?>

<h1>Update Session <?php echo $model->session_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'examOption'=>$examOption,'answerTypeOption'=>$answerTypeOption)); ?>