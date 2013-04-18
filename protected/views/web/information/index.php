<?php
/* @var $this InformationController */

$this->breadcrumbs=array(
	'อัพเดทข่าวสาร',
);
?>

<div class="news_list_box">
	<?php foreach($informations as $information) { ?>
	<div class="news_box">
		<a href="<?php echo Yii::app()->createUrl('information/view', array('id'=>$information->information_id)) ?>"><?php echo CHtml::image(Yii::app()->baseUrl . '/uploads/information/' . $information->image, $information->title, array('class'=>'news_pic', 'width'=>'180', 'height'=>'180')); ?></a>
		<h3 class="news_title"><a href="<?php echo Yii::app()->createUrl('information/view', array('id'=>$information->information_id)) ?>"><?php echo $information->title; ?></a></h3>
		<p class="news_timestamp"><?php echo date('j F Y', strtotime($information->date_added)); ?></p>
		<p class="news_content ellipsis multiline" style="height: 100px;""><?php echo $information->description; ?></p>
		<p class="readmore"><a href="<?php echo Yii::app()->createUrl('information/view', array('id'=>$information->information_id)) ?>">อ่านต่อ...</a></p>
	</div>
	<?php } ?>
	
	<div class="clear"></div>

	<?php $this->widget('CLinkPager', array(
		'currentPage'=>$pages->getCurrentPage(),
		'pages' => $pages,
		'maxButtonCount'=>5,
		'htmlOptions'=>array('class'=>'pagenav'),
		'header'=> '',
	)) ?>
</div>

<script type="text/javascript">$(".ellipsis").ellipsis();</script>