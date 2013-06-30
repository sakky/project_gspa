<?php
/* @var $this UserGroupController */
/* @var $model UserGroup */

$this->breadcrumbs=array(
	'ประเภทผู้ใช้งาน'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	//array('label'=>'List UserGroup', 'url'=>array('index')),
	array('label'=>'เพิ่มประเภทผู้ใช้งาน', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-group-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการประเภทผู้ใช้งาน</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-group-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'user_group_id',
			'header'=>'ID',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
		'name',
                array(
			'name'=>'role',
			'htmlOptions'=>array('style'=>'text-align: left;width: 100px;'),
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}&nbsp;&nbsp;{delete}',
			'headerHtmlOptions'=>array('style'=>'width:40px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),
			
		),
	),
)); ?>
