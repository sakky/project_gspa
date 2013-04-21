<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'คณะกรรมการประจำวิทยาลัย'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Board', 'url'=>array('index')),
        array('label'=>'เพิ่มข้อมูลคณะกรรมการ', 'url'=>array('create')),
        array('label'=>'เรียงลำดับคณะกรรมการ', 'url'=>array('order')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#board-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการข้อมูล คณะกรรมการประจำวิทยาลัย</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'board-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'board_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		), 
                array(
			'name'=>'image',
			'htmlOptions'=>array('style'=>'text-align: center;width: 100px;'),
                        'type'=>'html',
                        'value'=>'CHtml::image(Yii::app()->request->baseUrl ."/uploads/boards/".$data->image, "รูปคณะกรรมการ")',
                ),
		array(
			'name'=>'name_th',                        
                        'header'=>'ชื่อ-นามสกุล',
		),
//                array(
//			'name'=>'sex',                 
//			'value'=> '($data->sex==\'M\')? \'ชาย\' : \'หญิง\'',
//			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
//		),
                array(
			'name'=>'position_th',                        
                        'header'=>'ตำแหน่ง',
			'htmlOptions'=>array('style'=>'text-align: left;width: 150px;'),
		),
//                array(
//			'name'=>'sort_order', 
//			'htmlOptions'=>array('style'=>'text-align: center;width: 80px;'),
//		),
		array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
		),
		/*
		'position_en',
		'position_th',
		'image',
		'sort_order',
		'status',
		'time_stamp',
		'user_id',
		*/
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update}&nbsp;&nbsp;{delete}',
                        'headerHtmlOptions'=>array('style'=>'width:40px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),
		),
	),
)); ?>
