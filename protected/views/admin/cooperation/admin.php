<?php
/* @var $this CooperationController */
/* @var $model Cooperation */

$this->breadcrumbs=array(
	'ความร่วมมือ'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Cooperation', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
        array('label'=>'เรียงลำดับข้อมูล', 'url'=>array('order')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cooperation-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการข้อมูลความร่วมมือ</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,'co_type_list'=>$co_type_list,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cooperation-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=>'co_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		), 
		array(
			'name'=>'name_th',                        
                        'header'=>'ชื่อเรื่อง',
                        'htmlOptions'=>array('style'=>'text-align: left;'),
		),

                array(
			'name'=>'co_type_id',
                        'header'=>'ประเภทความร่วมมือ',
                        'value'=> '$data->coType->name_th',
			'htmlOptions'=>array('style'=>'text-align: left;width: 150px;'),
                        'filter'=>CHtml::listData(CooperationType::model()->findAll('status=1'), 'co_type_id', 'name_th'),
		),
                array(
			'name'=>'group',                        
                        'header'=>'กลุ่มความร่วมมือ',
                        'value'=> '($data->group==\'inbound\')? \'ในประเทศ\' : \'ต่างประเทศ\'',
                        'htmlOptions'=>array('style'=>'text-align: left;width: 90px;'),
                        'filter'=>array('inbound'=>'ในประเทศ','outbound'=>'ต่างประเทศ'),
		),
//                array(
//			'name'=>'sort_order', 
//			'htmlOptions'=>array('style'=>'text-align: center;width: 80px;'),
//		),
                array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
                        'filter'=>array('1'=>'แสดง','0'=>'ไม่แสดง'),
		),
		/*
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
