<?php
/* @var $this StudentServiceController */
/* @var $model StudentService */

$this->breadcrumbs=array(
	'บริการนิสิต'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	//array('label'=>'List StudentService', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#student-service-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการข้อมูลบริการนิสิต</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,'ser_group_list'=>$ser_group_list,'ser_type_list'=>$ser_type_list
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-service-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	       array(
			'name'=>'ser_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		), 
		array(
			'name'=>'name_th',                        
                        'header'=>'บริการ',
		),
		array(
			'name'=>'ser_type_id',
                        'header'=>'ประเภทบริการ',
                        'value'=> '$data->serType->name_th',
			'htmlOptions'=>array('style'=>'text-align: left;width: 100px;'),
                        'filter'=>CHtml::listData(StudentServiceType::model()->findAll('status=1'), 'ser_type_id', 'name_th'),
		),
                array(
			'name'=>'ser_group',                        
                        'header'=>'กลุ่มประเภท',
                        'value'=> '$data->serGroup->ser_name',
                        'htmlOptions'=>array('style'=>'text-align: left;width: 100px;'),
                        'filter'=>CHtml::listData(StudentServiceGroup::model()->findAll(), 'ser_group', 'ser_name'),
		),
                array(
			'name'=>'last_update',
                        'header'=>'วันที่ปรับปรุง',
                        'value'=> 'Controller::getThaiDate($data->last_update,"dmY")',
			'htmlOptions'=>array('style'=>'text-align: center;width: 80px;'),
		),
            	array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
                        'filter'=>array('1'=>'แสดง','0'=>'ไม่แสดง'),
		),
		/*
		'ser_group',
		'pdf_en',
		'pdf_th',
		'last_update',
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
