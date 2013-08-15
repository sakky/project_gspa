<?php
/* @var $this StudentServiceTypeController */
/* @var $model StudentServiceType */

$this->breadcrumbs=array(
	'ประเภทย่อยบริการนิสิต'=>array('index'),
	'จัดการประเภทย่อ',
);

$this->menu=array(	
	array('label'=>'เพิ่มประเภทย่อย', 'url'=>array('create')),
        array('label'=>'เรียงลำดับประเภทย่อย', 'url'=>array('order')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#student-service-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการประเภทย่อยบริการนิสิต</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,'ser_group_list'=>$ser_group_list
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-service-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'ser_type_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
		array(
			'name'=>'name_th',                        
                        'header'=>'ชื่อประเภท',
		),
                array(
			'name'=>'ser_group',                        
                        'header'=>'กลุ่มประเภท',
                        'value'=> '$data->serGroup->ser_name',
                        'htmlOptions'=>array('style'=>'text-align: left;width: 120px;'),
                        'filter'=>array('1'=>'ปริญญาโท','2'=>'ปริญญาเอก','3'=>'ประเมินการเรียนการสอน','4'=>'ไม่ระบุกลุ่มย่อย'),
		),
		array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 60px;'),
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
