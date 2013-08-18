<?php
/* @var $this NewsGroupController */
/* @var $model NewsGroup */

$this->breadcrumbs=array(
	'ประเภทย่อย ประชาสัมพันธ์/กิจกรรม'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	array('label'=>'เพิ่มประเภทย่อย', 'url'=>array('create')),
        array('label'=>'เรียงลำดับประเภทย่อย', 'url'=>array('order')),        
	//array('label'=>'<<ย้อนกลับ', 'url'=>array('newsGroup/index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#news-group-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการประเภทย่อย</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,'news_type_list'=>$news_type_list,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-group-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                        'header'=> 'ลำดับ',
                        'type' => 'raw',
                        'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1', //this for the auto page number of cgridview
                        'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
                ),
		array(
			'name'=>'name_th',
                        'header'=> 'ชื่อประเภท',
			'htmlOptions'=>array('style'=>'text-align: left;width: 150px;'),
		),
                array(
			'name'=>'news_type_id',
                        'header'=> 'ประเภทหลัก',
                        'value'=>'$data->newsType->name_th',
			'htmlOptions'=>array('style'=>'text-align: left;width: 100px;'),
                        'filter'=>CHtml::listData(NewsType::model()->findAll('status=1 AND news_type_id<>3 AND news_type_id<>5'), 'news_type_id', 'name_th'),

		),            
		array(
			'name'=>'sort_order',
                        'header'=> 'ลำดับ',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
		array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
                        'filter'=>array('1'=>'แสดง','0'=>'ไม่แสดง'),
		),
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update}&nbsp;&nbsp;{delete}',
                        'headerHtmlOptions'=>array('style'=>'width:40px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),
		),
	),
)); ?>
