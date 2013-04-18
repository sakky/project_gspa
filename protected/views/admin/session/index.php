<?php
$this->breadcrumbs=array(
	'Sessions',
);

$this->menu=array(
	array('label'=>'Create Answer Sheet', 'url'=>array('create')),
	array('label'=>'Manage Answer Sheet', 'url'=>array('admin')),
);
?>

<h1>Sessions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
