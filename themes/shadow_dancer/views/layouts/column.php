<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
<?php $this->renderPartial('/layouts/leftmenu');?>
	<div class="span-19">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	
</div>
<?php $this->endContent(); ?>