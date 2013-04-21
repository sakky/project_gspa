<?php
/* @var $this ExecutiveController */
/* @var $model Executive */

$this->breadcrumbs=array(
	'ผู้บริหาร'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Executive', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูลผู้บริหาร', 'url'=>array('create')),
	array('label'=>'เรียงลำดับข้อมูลผู้บริหาร', 'url'=>array('order')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#executive-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการข้อมูล ผู้บริหารวิทยาลัย</h1>


<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'executive-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'exec_id',
                        'header'=>'รหัส',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		), 
		array(
			'name'=>'image',
			'htmlOptions'=>array('style'=>'text-align: center;width: 100px;'),
                        'type'=>'html',
                        'value'=>'CHtml::image(Yii::app()->request->baseUrl ."/uploads/executives/".$data->image, "รูปผู้บริหารวิทยาลัย")',
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
