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
	'model'=>$model,'doc_type_list'=>$doc_type_list
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'document-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                        'header'=> 'ลำดับ',
                        'type' => 'raw',
                        'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1', //this for the auto page number of cgridview
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
                array(
			'name'=>'last_update',
                        'header'=>'วันที่ปรับปรุง',
                        'value'=> 'date(\'d/m/Y\',strtotime($data->last_update))',
			'htmlOptions'=>array('style'=>'text-align: center;width: 80px;'),
                        'filter'=>$this->widget('zii.widgets.jui.CJuiDatepicker', array('model'=>$model, 'attribute'=>'last_update','language'=>'th','options'=>array(
                                    'showAnim'=>'fold',
                                    'changeMonth'=>true,
                                    'changeYear'=>true,
                                    'changeDate'=>true,
                                    'showAnim'=>'fold',
                                    'dateFormat' => 'yy-mm-dd', // save to db format
                                    'altFormat' => 'dd/mm/yy', // show to user format
                                    //'showButtonPanel'=>true,
                                    'debug'=>true,

                                    ),
                        'htmlOptions' => array(
                            //'value' => ($model->last_update)?$crate_date:date('d/m/Y'), // set the default date here
                            'class'=>'shadowdatepicker',
                            'readonly'=>"readonly",
                        )), true),
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
