<?php
/* @var $this StructureController */
/* @var $model Structure */

$this->breadcrumbs=array(
	'โครงสร้างหน่วยงาน',
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
	$('#structure-grid').yiiGridView('update', {
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
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'structure-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
            	array(
			'name'=>'str_id',
			'header'=>'รหัส',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
                array(
			'name'=>'str_type_id',
                        'header'=> 'ประเภทหน่วยงาน',
                        'value'=>'$data->structureType->name_th',
			'htmlOptions'=>array('style'=>'text-align: left;width: 100px;'),
                        'filter'=>CHtml::listData(StructureType::model()->findAll(), 'str_type_id', 'name_th'),

		),
                array(
			'name'=>'image',
			'htmlOptions'=>array('style'=>'text-align: center;width: 100px;'),
                        'type'=>'html',
                        'value'=>'CHtml::image(Yii::app()->request->baseUrl ."/uploads/structures/".$data->image, "รูปประจำตัว",array(\'width\'=>100))',
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

                //'sort_order',
		/*
		'sex',
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
