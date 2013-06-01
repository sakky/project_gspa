<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
<?php $this->renderPartial('/layouts/leftmenu');?>
	<div class="span-19">
		<div id="content">
                        <div class="top_menu">
                            <?php
                            $this->widget('ext.rlmenu.RLMenu', array(
                                'items' => $this->menu,
                                ));
                            ?>
                        </div>
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
<!--	<div class="span-5 last">
		<div id="sidebar">
		<?php
			/*$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'<span class="icon icon-sitemap_color">'.$this->head_menu.'</span>',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();*/
		?>
		
		
		
		</div> sidebar 
	</div>-->
</div>
<?php $this->endContent(); ?>