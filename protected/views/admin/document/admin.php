<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'สื่อเผยแพร่/ดาวน์โหลด'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	
	array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
        //array('label'=>'เรียงลำดับข้อมูล', 'url'=>array('documentType/index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#document-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการสื่อเผยแพร่/ดาวน์โหลด</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'document-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=>'doc_id',
			'header'=>'รหัส',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
		array(
			'name'=>'name_th',                        
                        'header'=>'สื่อเผยแพร่/ดาวน์โหลด',
		),
                array(
			'name'=>'doc_type_id',
                        'header'=>'ประเภท',
                        'value'=> '$data->documentType->name_th',
			'htmlOptions'=>array('style'=>'text-align: left;width: 150px;'),
                        'filter'=>CHtml::listData(DocumentType::model()->findAll('status=1'), 'doc_type_id', 'name_th'),
		),
//                array(
//			'name'=>'last_update',
//                        'header'=>'วันที่ปรับปรุง',
//                        'value'=> 'date(\'d/m/Y\',strtotime($data->last_update))',
//			'htmlOptions'=>array('style'=>'text-align: center;width: 80px;'),
//                        'filter'=>FALSE,
//		),
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
		'counter',
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
