<?php
/* @var $this PersonnelController */
/* @var $model Personnel */

$this->breadcrumbs=array(
	'บุคลากร'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(	
	array('label'=>'เพิ่มข้อมูลบุคลากร', 'url'=>array('create')),
        array('label'=>'เรียงลำดับข้อมูลบุคลากร', 'url'=>array('order')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#personnel-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการข้อมูลบุคลากร</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,'personnel_type_list'=>$personnel_type_list
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'personnel-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
            	array(
			'name'=>'personnel_id',
			'header'=>'รหัส',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),            

                array(
			'name'=>'image',
			'htmlOptions'=>array('style'=>'text-align: center;width: 100px;'),
                        'type'=>'html',
                        'value'=>'CHtml::image(Yii::app()->request->baseUrl ."/uploads/personnel/".$data->image, "รูปประจำตัว",array(\'height\'=>100))',
                ),
            	array(
			'name'=>'personnel_type_id',
                        'header'=> 'ประเภทบุคลากร',
                        'value'=>'$data->personnelType->name_th',
			'htmlOptions'=>array('style'=>'text-align: left;width: 100px;'),
                        'filter'=>CHtml::listData(PersonnelType::model()->findAll(), 'personnel_type_id', 'name_th'),

		),
                array(
			'name'=>'name_th',                        
                        'header'=>'ชื่อ-นามสกุล',
		),
                array(
			'name'=>'position_th',                        
                        'header'=>'ตำแหน่ง',
			'htmlOptions'=>array('style'=>'text-align: left;width: 150px;'),
		),
		/*
		'position_th',
		'detail_en',
		'detail_th',
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
