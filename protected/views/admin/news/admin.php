<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'ข่าวสาร'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	//array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูลข่าวสาร', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#news-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการข้อมูลข่าวสาร</h1>
<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'news_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
//                array(
//			'name'=>'thumbnail',
//                        'header'=> 'Thumbnail',
//                        'type'=>'html',
//                        'value'=>'CHtml::image(Yii::app()->request->baseUrl ."/uploads/news/".$data->thumbnail, "รูปข่าว",array(\'width\'=>120))',
//                        'htmlOptions'=>array('width'=>'100px'),
//                        'filter'=>FALSE,
//
//                ),                
		array(
			'name'=>'name_th',
                        'header'=> 'หัวข้อข่าว',
			'htmlOptions'=>array('style'=>'text-align: left;width: 150px;'),
		),
                array(
			'name'=>'news_type_id',
                        'header'=> 'ประเภทข่าว',
                        'value'=>'$data->newsType->name_th',
			'htmlOptions'=>array('style'=>'text-align: left;width: 100px;'),
                        'filter'=>CHtml::listData(NewsType::model()->findAll('status=1'), 'news_type_id', 'name_th'),

		),
                array(
			'name'=>'create_date',
                        'value'=> 'date(\'d/m/Y\',strtotime($data->create_date))',
			'htmlOptions'=>array('style'=>'text-align: left;width: 70px;'),
                        'filter'=>FALSE,
		),
                array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
                        'filter'=>array('1'=>'แสดง','0'=>'ไม่แสดง'),
		),
		/*
                'title_en',
		'title_th',
		'desc_en',
		'desc_th',
		'image',
		'create_date',
		'show_homepage',
		'show_new',
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
