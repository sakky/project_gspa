<?php
/* @var $this CooperationTypeController */
/* @var $model CooperationType */

$this->breadcrumbs=array(
	'ประเภทความร่วมมือ'=>array('index'),
	'จัดการข้อมูล',
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
	$('#cooperation-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการประเภทความร่วมมือ</h1>


<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cooperation-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'co_type_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		), 
                array(
			'name'=>'name_th',                        
                        'header'=>'ชื่อประเภท',
                        'htmlOptions'=>array('style'=>'text-align: left;'),
		),
                array(
			'name'=>'group',                        
                        'header'=>'กลุ่มความร่วมมือ',
                        'value'=> '($data->group==\'inbound\')? \'ในประเทศ\' : \'ต่างประเทศ\'',
                        'htmlOptions'=>array('style'=>'text-align: left;width: 100px;'),
                        'filter'=>array('inbound'=>'ในประเทศ','outbound'=>'ต่างประเทศ'),
		),
//                array(
//			'name'=>'sort_order', 
//                        'header'=>'ลำดับ',
//			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
//		),
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
