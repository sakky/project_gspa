<?php
/* @var $this NewsInSideController */
/* @var $model News */

$this->breadcrumbs=array(
        'ประชาสัมพันธ์/กิจกรรม ภายใน'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	
	array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
        array('label'=>'ประเภท', 'url'=>array('newsGroup/index')),
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

<h1>จัดการประชาสัมพันธ์/กิจกรรม ภายใน</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,'news_type_list'=>$news_type_list,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'dataProvider'=>$model->searchInSide(),
	//'filter'=>$model,
	'columns'=>array(
                array(
                        'header'=> 'ลำดับ',
                        'type' => 'raw',
                        'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1', //this for the auto page number of cgridview
                        'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
                ),
		array(
			'name'=>'name_th',
                        'header'=> 'หัวข้อข่าว',
			'htmlOptions'=>array('style'=>'text-align: left;'),
		),
                array(
			'name'=>'news_group_id',
                        'header'=> 'ประเภท',
                        'value'=>'$data->newsGroup->name_th',
			'htmlOptions'=>array('style'=>'text-align: left;width: 100px;'),
                        'filter'=>CHtml::listData(NewsGroup::model()->findAll('status=1 AND news_type_id=5'), 'news_group_id', 'name_th'),

		),
                array(
			'name'=>'create_date',
                        'value'=> 'Controller::getThaiDate($data->create_date,"dmY")',
			'htmlOptions'=>array('style'=>'text-align: left;width: 80px;'),
		),
                array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
                        'filter'=>array('1'=>'แสดง','0'=>'ไม่แสดง'),
		),
		/*
		'title_th',
		'desc_en',
		'desc_th',
		'pdf_en',
		'pdf_th',
		'image',
		'thumbnail',
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
