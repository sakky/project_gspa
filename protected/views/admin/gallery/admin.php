<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'ภาพกิจกรรม'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
        array('label'=>'เพิ่มอัลบั้มภาพกิจกรรม', 'url'=>array('create')),
	array('label'=>'เรียงลำดับภาพกิจกรรม', 'url'=>array('order')),
	
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gallery-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการอัลบั้มภาพกิจกรรม</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gallery-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=>'gallery_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
                array(
			'name'=>'image',
			'htmlOptions'=>array('style'=>'text-align: center;width: 120px;'),
                        'type'=>'html',
                        'value'=>'CHtml::image(Yii::app()->request->baseUrl ."/uploads/gallery/".$data->image, "รูปปกอัลบั้ม",array(\'width\'=>140))',
                        'htmlOptions'=>array('width'=>'100px'),
                ),
                array(
			'name'=>'name_th',                        
                        'header'=>'ชื่ออัลบั้ม',
		),       
//                array(
//			'name'=>'sort_order',
//			'htmlOptions'=>array('style'=>'text-align: center;width: 80px;'),
//		),
            	array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 60px;'),
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
