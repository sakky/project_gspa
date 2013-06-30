<?php
/* @var $this UserGroupController */
/* @var $model UserGroup */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-group-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> ข้อมูลที่จำเป็นต้องกรอก</p>

	<?php echo $form->errorSummary($model,'กรุณากรอกข้อมูลให้ถูกต้อง');?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'role'); ?>
                <?php echo $form->dropDownList($model, 'role', array('top_admin'=>'Top Admin','admin'=>'Admin')); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_menu'); ?>
		<div style="float:left;">
                <?php 
                      $user_menu_list = $model->user_menu;
                      $menu_use = array();
                      $user_menu = explode(',', $user_menu_list);
                      foreach ($user_menu as $key => $value) {
                          
                          $menu_use[$value] = $value;
                      }
                ?>
                <?php foreach ($menu_list as $key=>$menu) {?>
                     <input type="checkbox" <?php if($menu_use[$menu->menu_id]==$menu->menu_id) echo "checked";?> id="user_menu_<?php echo $menu->menu_id;?>" name="user_menu[<?php echo $menu->menu_id;?>]" value="<?php echo $menu->menu_id;?>"> 
                     <?php echo $menu->name_th;?><br/>                     
                <?php }?>
                </div>
                <div style="clear:both"></div>
                <?php echo $form->hiddenField($model,'user_menu',array('type'=>"hidden")); ?>
		<?php echo $form->error($model,'user_menu'); ?>
	</div>

        <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'เพิ่มข้อมูล' : 'บันทึกข้อมูล'); ?>&nbsp;&nbsp;
                <?php echo CHtml::Button('ยกเลิก', array('submit' => array('index'))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->