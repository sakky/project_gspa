<?php
/* @var $this SlideController */
/* @var $model Slide */

$this->breadcrumbs=array(
	'Slides'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Slide', 'url'=>array('index')),
	array('label'=>'เพิ่ม Slide', 'url'=>array('create')),
        array('label'=>'เรียงลำดับ Slide', 'url'=>array('order')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#slide-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการ Slide</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'slide-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=>'slide_id',
			'header'=>'รหัส',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
                array(
			'name'=>'image',
			'htmlOptions'=>array('style'=>'text-align: center;width: 100px;'),
                        'type'=>'html',
                        'value'=>'CHtml::image(Yii::app()->request->baseUrl ."/uploads/slide/".$data->image, "รูป Slide",array(\'width\'=>120))',
                ),
            	array(
			'name'=>'title_th',                        
                        'header'=>'ชื่อเรื่อง',
		),
		array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 60px;'),
                        'filter'=>array('1'=>'แสดง','0'=>'ไม่แสดง'),
		),
                /*array(
			'name'=>'desc_en',
			'htmlOptions'=>array('style'=>'text-align: left;width: 150px;'),
		),
                array(
			'name'=>'desc_th',
			'htmlOptions'=>array('style'=>'text-align: left;width: 150px;'),
		),
		'link_en',
		'link_th',
		'image',
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
