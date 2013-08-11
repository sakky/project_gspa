<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'ปฏิทินกิจกรรม'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	array('label'=>'เพิ่มข้อมูลปฏิทินกิจกรรม', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#event-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการข้อมูล ปฏิทินกิจกรรม</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'event-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'event_id',
                        'header'=> 'รหัส',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		), 
            	array(
			'name'=>'event_title_th',
			'htmlOptions'=>array('style'=>'text-align: left;'),
		),
                array(
			'name'=>'event_start',
			'htmlOptions'=>array('style'=>'text-align: left;width: 100px;'),
                        'value'=>'date(\'d/m/Y\',strtotime($data->event_start))',
		),
                array(
			'name'=>'event_end',
			'htmlOptions'=>array('style'=>'text-align: left;width: 100px;'),
                        'value'=>'($data->event_end!=\'0000-00-00\' && $data->event_end)? date(\'d/m/Y\',strtotime($data->event_end)):\'00/00/0000\'',
		),
                array(
			'name'=>'event_status',                 
			'value'=> '($data->event_status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
                        'filter'=>array('1'=>'แสดง','0'=>'ไม่แสดง'),
		),
		/*
		'event_status',
		*/
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update}&nbsp;&nbsp;{delete}',
                        'headerHtmlOptions'=>array('style'=>'width:40px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),
		),
	),
)); ?>
