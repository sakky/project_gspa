<?php
/* @var $this KnowledgeTypeController */
/* @var $model KnowledgeType */

$this->breadcrumbs=array(
	'ประเภทการจัดการความรู้'=>array('index'),
	'จัดการประเภท',
);

$this->menu=array(	
	array('label'=>'เพิ่มประเภท', 'url'=>array('create')),
        array('label'=>'เรียงลำดับประเภท', 'url'=>array('order')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#knowledge-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการประเภทการจัดการความรู้</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'knowledge-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=>'know_type_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		), 
                array(
			'name'=>'name_th',                        
                        'header'=>'ชื่อประเภท',
                        'htmlOptions'=>array('style'=>'text-align: left;'),
		),
                array(
			'name'=>'know_group',                        
                        'header'=>'กลุ่มประเภท',
                        'value'=> '$data->knowGroup->know_name',
                        'htmlOptions'=>array('style'=>'text-align: left;width: 120px;'),
                        'filter'=>array('1'=>'การจัดการความรู้','2'=>'หมวดความรู้','3'=>'สารคดี'),
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
