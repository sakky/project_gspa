<?php
/* @var $this PersonnelTypeController */
/* @var $model PersonnelType */

$this->breadcrumbs=array(
	'ประเภทบุคลากร'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(	
	array('label'=>'เพิ่มประเภทบุคลากร', 'url'=>array('create')),
        array('label'=>'เรียงลำดับประเภทบุคลากร', 'url'=>array('order')),    
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#personnel-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการประเภทบุคลากร</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'personnel-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'personnel_type_id',
			'header'=>'รหัสประเภท',
			'htmlOptions'=>array('style'=>'text-align: center;width: 80px;'),
		),
		array(
			'name'=>'name_th',                        
                        'header'=>'ชื่อประเภท',
		),
                array(
			'name'=>'sort_order', 
			'htmlOptions'=>array('style'=>'text-align: center;width: 80px;'),
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
