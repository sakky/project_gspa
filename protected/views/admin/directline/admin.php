<?php
/* @var $this DirectlineController */
/* @var $model Directline */

$this->breadcrumbs=array(
	'สายตรงคณบดี'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Directline', 'url'=>array('index')),
	//array('label'=>'Create Directline', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#directline-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>ข้อมูลสายตรงคณบดี</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'directline-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                        'header'=>'ลำดับ',
			'name'=>'admission_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),  
            	array(
			'name'=>'name',                        
                        'htmlOptions'=>array('style'=>'text-align: left;width: 150px;'),
		),
                array(
			'name'=>'email',                        
                        'htmlOptions'=>array('style'=>'text-align: left;width: 120px;'),
		),
		'subject',
            	array(
			'class'=>'CButtonColumn',
                        'template'=>'{view}&nbsp;&nbsp;{delete}',
                        'headerHtmlOptions'=>array('style'=>'width:40px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),
		),
	),
)); ?>
