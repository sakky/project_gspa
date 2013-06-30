<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'ผู้ใช้งาน'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	//array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'เพิ่มผู้ใช้งาน', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการข้อมูลผู้ใช้งาน</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'user_id',
			'header'=>'ID',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
                'firstname',
                'lastname',
                array(
			'name'=> 'username',
			'htmlOptions'=>array('style'=>'text-align: left; width: 80px;'),
		),
		array(
			'name'=> 'user_group_id',
			'value'=> '$data->userGroup->name',
			'htmlOptions'=>array('style'=>'text-align: left; width: 100px;'),
                        'filter'=>CHtml::listData(UserGroup::model()->findAll(), 'user_group_id', 'name'),
		),
		array(
			'name'=> 'status',
			'value'=> '($data->status)? \'แสดง\' : \'ไม่แสดง\'',
			'htmlOptions'=>array('style'=>'text-align: center; width: 60px;'),
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
