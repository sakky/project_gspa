<?php
/* @var $this AdmissionController */
/* @var $model Admission */

$this->breadcrumbs=array(
	'สมัครเรียนออนไลน์'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Admission', 'url'=>array('index')),
	//array('label'=>'Create Admission', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#admission-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>สมัครเรียนออนไลน์</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admission-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=>'admission_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),  
                array(
			'name'=>'title',
			'htmlOptions'=>array('style'=>'text-align: center;width: 70px;'),
                        'filter'=>array('1'=>'นาย','2'=>'นาง','3'=>'นางสาว','4'=>'ยศ.'),
		),  
		array(
			'name'=>'firstname_th',                        
                        'header'=>'ชื่อ(ไทย)',
                        'htmlOptions'=>array('style'=>'text-align: left;width: 80px;'),
		),
            	array(
			'name'=>'lastname_th',                        
                        'header'=>'นามสกุล(ไทย)',
                        'htmlOptions'=>array('style'=>'text-align: left;width: 100px;'),
		),  
		array(
			'name'=>'location_id',                        
                        'header'=>'สถานที่เรียน',
                        'value'=> '$data->location->name',
                        'htmlOptions'=>array('style'=>'text-align: left;width: 120px;'),                        
                        'filter'=>CHtml::listData(AdmissionProgram::model()->findAll(), 'location_id', 'name'),
                    
		),  
		array(
			'name'=>'program_id',                        
                        'header'=>'สาขาที่สมัคร',
                        'value'=> '$data->program->name',
                        'filter'=>CHtml::listData(AdmissionLocation::model()->findAll(), 'program_id', 'name'),
		),              
		//'firstname_en',
		/*
		'lastname_en',
		'title',
		'birthday',
		'address',
		'district',
		'amphur',
		'province',
		'postcode',
		'home_phone',
		'mobile_phone',
		'email',
		'year_end_1',
		'university_1',
		'major_1',
		'degree_1',
		'score_1',
		'year_end_2',
		'university_2',
		'major_2',
		'degree_2',
		'score_2',
		'year_end_3',
		'university_3',
		'major_3',
		'degree_3',
		'score_3',
		'year_end_4',
		'university_4',
		'major_4',
		'degree_4',
		'score_4',
		'year_end_5',
		'university_5',
		'major_5',
		'degree_5',
		'score_5',
		'training_1',
		'training_2',
		'training_3',
		'training_4',
		'training_5',
		'work_experience',
		'career',
		'position',
		'level',
		'salary',
		'period',
		'company_name',
		'company_add',
		'company_road',
		'company_district',
		'company_amphur',
		'company_province',
		'company_postcode',
		'company_phone',
		'company_department',
		'ref_name_1',
		'ref_position_1',
		'ref_company_1',
		'ref_phone_1',
		'ref_name_2',
		'ref_position_2',
		'ref_company_2',
		'ref_phone_2',
		'ref_name_3',
		'ref_position_3',
		'ref_company_3',
		'ref_phone_3',
		'succeed',
		'reason',
		'goal',
		*/
            	array(
			'class'=>'CButtonColumn',
                        'template'=>'{view}&nbsp;&nbsp;{delete}',
                        'headerHtmlOptions'=>array('style'=>'width:40px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),
		),

	),
)); ?>
