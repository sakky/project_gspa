<?php
$this->breadcrumbs=array(
	'ประวัติการเข้าใช้ระบบ',
);?>
<h1>ประวัติการเข้าใช้ระบบ</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
                array(
                        'header'=> 'ลำดับ',
                        'type' => 'raw',
                        'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1', //this for the auto page number of cgridview
                        'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
                ),               
		array(
			'name'=>'user_id',
                        'value'=>'$data->user->firstname." ".$data->user->lastname',
			'htmlOptions'=>array('style'=>'text-align: left;width: 150px;'),
		),
                array(
			'name'=>'login_time',
			'htmlOptions'=>array('style'=>'text-align: left;width: 120px;'),                        

		),
                array(
			'name'=>'logout_time',
			'htmlOptions'=>array('style'=>'text-align: left;width: 120px;'),                        

		),
                array(
			'name'=>'browser',
			'htmlOptions'=>array('style'=>'text-align: left;'),                        

		),
	),
)); ?>
