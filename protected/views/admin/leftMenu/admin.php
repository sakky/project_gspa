<?php
/* @var $this LeftMenuController */
/* @var $model LeftMenu */

$this->breadcrumbs=array(
	'Left Menus'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Left Menu', 'url'=>array('index')),
	array('label'=>'Create Left Menu', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#left-menu-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Left Menus</h1>

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
	'id'=>'left-menu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=>'left_menu_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
                array(
			'name'=>'page_type_id',
                        'value'=> '$data->pageType->name_th',
			'htmlOptions'=>array('style'=>'text-align: left;width: 120px;'),
		),
		'name_en',
		'name_th',
                array(
			'name'=>'show_type',                 
			'value'=> '$data->show_type',
			'htmlOptions'=>array('style'=>'text-align: center;width: 70px;'),
		),
                array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'Enabled\' : \'Disabled\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 60px;'),
		),
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',                   
                        'template'=>'{update}&nbsp;&nbsp;{delete}',
                        'headerHtmlOptions'=>array('style'=>'width:40px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),
		),
	),
)); ?>
