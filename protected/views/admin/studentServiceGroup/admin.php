<?php
/* @var $this StudentServiceGroupController */
/* @var $model StudentServiceGroup */

$this->breadcrumbs=array(
	'ประเภทหลักบริการนิสิต'=>array('index'),
	'จัดการประเภทหลัก',
);

$this->menu=array(
	//array('label'=>'List StudentServiceGroup', 'url'=>array('index')),
	array('label'=>'เพิ่มประเภทหลักบริการนิสิต', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#student-service-group-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการประเภทหลักบริการนิสิต</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-service-group-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
            	array(
			'name'=>'ser_group',
                        'header'=>'รหัส',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
		),
                'ser_name_en',
		'ser_name',
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update}&nbsp;&nbsp;{delete}',
                        'headerHtmlOptions'=>array('style'=>'width:40px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),
		),
	),
)); ?>
