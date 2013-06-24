<?php
/* @var $this AlumniController */
/* @var $model Alumni */

$this->breadcrumbs=array(
	'ทำเนียบนิสิต'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Alumni', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#alumni-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการข้อมูลนิสิต</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'alumni-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=>'alumni_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		), 
                array(
			'name'=>'image',
			'htmlOptions'=>array('style'=>'text-align: center;width: 100px;'),
                        'type'=>'html',
                        'value'=>'CHtml::image(Yii::app()->request->baseUrl ."/uploads/alumni/".$data->image, "รูปศิษย์เก่า")',
                ),
		array(
			'name'=>'name_th',                        
                        'header'=>'ชื่อ-นามสกุล',
                        'htmlOptions'=>array('style'=>'text-align: left;width: 160px;'),
		),
                array(
			'name'=>'alumni_group',                        
                        'header'=>'ระดับ',
                        'value'=> '($data->alumni_group==\'Master\')? \'ปริญญาโท\' : \'ปริญญาเอก\'',
                        'htmlOptions'=>array('style'=>'text-align: left;width: 90px;'),
                        'filter'=>array('Master'=>'ปริญญาโท','Doctor'=>'ปริญญาเอก'),
		),
                array(
			'name'=>'alumni_no_id',
                        'header'=>'รุ่นที่จบ',
                        'value'=> '$data->alumniType->name_th',
			'htmlOptions'=>array('style'=>'text-align: left;width: 70px;'),
                        'filter'=>CHtml::listData(AlumniNo::model()->findAll('status=1'), 'alumni_no_id', 'name_th'),
		),

                array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
                        'filter'=>array('1'=>'แสดง','0'=>'ไม่แสดง'),
		),
		/*
		'major_th',
		'campus_en',
		'campus_th',
		'position_en',
		'position_th',
		'desc_en',
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
