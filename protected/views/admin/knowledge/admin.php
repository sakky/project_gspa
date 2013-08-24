<?php
/* @var $this KnowledgeController */
/* @var $model Knowledge */

$this->breadcrumbs=array(
	'การจัดการความรู้'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	 array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
	 array('label'=>'เรียงลำดับข้อมูล', 'url'=>array('order')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#knowledge-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการข้อมูล การจัดการความรู้</h1>

<?php echo CHtml::link('ค้นหารายละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,'know_type_list'=>$know_type_list
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'knowledge-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=>'know_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		), 
                array(
			'name'=>'name_th',                        
                        'header'=>'ชื่อข้อมูลความรู้',
                        'htmlOptions'=>array('style'=>'text-align: left;'),
		),
                array(
			'name'=>'know_type_id',
                        'header'=>'ประเภทคลังข้อมูล',
                        'value'=> '$data->knowType->name_th',
			'htmlOptions'=>array('style'=>'text-align: left;width: 150px;'),
                        'filter'=>CHtml::listData(KnowledgeType::model()->findAll('status=1'), 'know_type_id', 'name_th'),
		),
                array(
			'name'=>'know_group',                        
                        'header'=>'กลุ่มประเภท',
                        'value'=> '$data->knowGroup->know_name',
                        'htmlOptions'=>array('style'=>'text-align: left;width: 110px;'),
                        'filter'=>array('1'=>'การจัดการความรู้','2'=>'หมวดความรู้','3'=>'สารคดี'),
		),
		array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
                        'filter'=>array('1'=>'แสดง','0'=>'ไม่แสดง'),
		),
		/*
		'desc_th',
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
