<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main_new'); ?>

<div class="grid_10 push_1 news_single">

	<div class="breadcrumb">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	</div>

	<?php echo $content; ?>

</div>

<div class="clear"></div>
<?php $this->endContent(); ?>