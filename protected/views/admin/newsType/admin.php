<?php
/* @var $this NewsTypeController */
/* @var $model NewsType */

$this->breadcrumbs=array(
	'ประเภทหลัก ประชาสัมพันธ์/กิจกรรม'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(	
	array('label'=>'เพิ่มประเภทหลัก', 'url'=>array('create')),
        array('label'=>'เรียงลำดับประเภทหลัก', 'url'=>array('order')),    
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#news-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการประเภทหลัก</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                        'header'=> 'ลำดับ',
                        'type' => 'raw',
                        'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1', //this for the auto page number of cgridview
                        'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
                ),               

		'name_en',
		'name_th',
		array(
			'name'=>'sort_order',
			'htmlOptions'=>array('style'=>'text-align: center;width: 80px;'),
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
