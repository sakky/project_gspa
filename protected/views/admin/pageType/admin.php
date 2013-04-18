<?php
/* @var $this PageTypeController */
/* @var $model PageType */

$this->breadcrumbs=array(
	'Page Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List PageType', 'url'=>array('index')),
	array('label'=>'Create Page Type', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#page-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Page Types</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'page-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'page_type_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 70px;'),
		),
		'name_en',
		'name_th',
                array(
			'name'=>'sort_order',
			'htmlOptions'=>array('style'=>'text-align: center;width: 70px;'),
		),
                array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'Enabled\' : \'Disabled\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 70px;'),
		),
                array(
                        'class'=>'CButtonColumn',
                        'template'=>'{update}&nbsp;&nbsp;{delete}',
                        'headerHtmlOptions'=>array('style'=>'width:40px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),
                ),
	),
)); ?>
