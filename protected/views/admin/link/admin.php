<?php
/* @var $this LinkController */
/* @var $model Link */

$this->breadcrumbs=array(
	'Link ที่เกี่ยวข้อง'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Link', 'url'=>array('index')),
	array('label'=>'เพิ่ม Link ที่เกี่ยวข้อง', 'url'=>array('create')),
        array('label'=>'เรียงลำดับ Link ที่เกี่ยวข้อง', 'url'=>array('order')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#link-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการข้อมูล Link ที่เกี่ยวข้อง</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'link-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=>'link_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
		array(
			'name'=>'name_th',                        
                        'header'=>'ชื่อ Link ที่เกี่ยวข้อง',
                        'htmlOptions'=>array('style'=>'text-align: left;width: 200px;'),
		),
                array(
			'name'=>'link_th',                        
                        'header'=>'URL Link ที่เกี่ยวข้อง',
		),
                array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
                        'filter'=>array('1'=>'แสดง','0'=>'ไม่แสดง'),
		),
		/*
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
