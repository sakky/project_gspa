<?php
/* @var $this NewsGroupController */
/* @var $model NewsGroup */

$this->breadcrumbs=array(
	'ประเภทประชาสัมพันธ์/กิจกรรม จากสื่อ'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	array('label'=>'เพิ่มประเภท', 'url'=>array('create')),
        array('label'=>'เรียงลำดับ', 'url'=>array('order')),        
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

<h1>จัดการประเภท ประชาสัมพันธ์/กิจกรรม จากสื่อ</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-group-grid',
	'dataProvider'=>$model->search2(),
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
                        'header'=> 'ชื่อประเภท',
			'htmlOptions'=>array('style'=>'text-align: left;width: 150px;'),
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
