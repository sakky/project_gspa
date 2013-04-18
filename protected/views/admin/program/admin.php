<?php
/* @var $this ProgramController */
/* @var $model Program */

$this->breadcrumbs=array(
	'หลักสูตรที่เปิดสอน'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Program', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูลหลักสูตร', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#program-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการข้อมูล หลักสูตรที่เปิดสอน</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'program-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=>'program_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		), 
                 array(
			'name'=>'program_type',                 
			'value'=> '($data->program_type==\'Master\')? \'หลักสูตร ป.โท\' : \'หลักสูตร ป.เอก\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 90px;'),
		),
                array(
			'name'=>'name_th',                        
                        'header'=>'ชื่อหลักสูตร',
		),
                 array(
			'name'=>'sort_order', 
			'htmlOptions'=>array('style'=>'text-align: center;width: 80px;'),
		),
                array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 60px;'),
		),
		/*
		'pdf_en',
		'pdf_th',
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
