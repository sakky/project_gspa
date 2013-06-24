<?php
/* @var $this AlumniNoController */
/* @var $model AlumniNo */

$this->breadcrumbs=array(
	'รุ่นที่จบ'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	//array('label'=>'List AlumniNo', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูล', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#alumni-no-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการข้อมูลรุ่นที่จบ</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'alumni-no-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=>'alumni_no_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		), 
		array(
			'name'=>'name_th',                        
                        'header'=>'ชื่อรุ่น',
                        'htmlOptions'=>array('style'=>'text-align: left;'),
		),
                array(
			'name'=>'alumni_group',                        
                        'header'=>'ระดับ',
                        'value'=> '($data->alumni_group==\'Master\')? \'ปริญญาโท\' : \'ปริญญาเอก\'',
                        'htmlOptions'=>array('style'=>'text-align: left;width: 90px;'),
                        'filter'=>array('Master'=>'ปริญญาโท','Doctor'=>'ปริญญาเอก'),
		),
                array(
			'name'=>'sort_order', 
			'htmlOptions'=>array('style'=>'text-align: left;width: 80px;'),
		),
		array(
			'name'=>'status',                 
			'value'=> '($data->status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
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
