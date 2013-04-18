<script>
    function changeShowType(value){
        if(value=='list'){
            document.getElementById('single_page').style.display = 'none';
            document.getElementById('link').style.display = 'none';
        }else
        if(value=='single'){
            document.getElementById('single_page').style.display = '';
            document.getElementById('link').style.display = 'none';
            
        }else
        if(value=='link'){
            document.getElementById('single_page').style.display = 'none';
            document.getElementById('link').style.display = '';
            
        }else{
            document.getElementById('single_page').style.display = 'none';
            document.getElementById('link').style.display = 'none';
        }
    }
</script>
<?php
/* @var $this LeftMenuController */
/* @var $model LeftMenu */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'left-menu-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model,'กรุณากรอกข้อมูลให้ถูกต้อง');?>

	<div class="row">
		<?php echo $form->labelEx($model,'page_type_id'); ?>
		<?php echo $form->dropDownList($model,'page_type_id',$page_type_list); ?> กรณีไม่มีข้อมูลคลิกเพิ่ม <a href="<?php echo Yii::app()->createUrl('pagetype'); ?>" target="_blank">ที่นี่</a>
		<?php echo $form->error($model,'page_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_en'); ?>
		<?php echo $form->textField($model,'name_en',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_th'); ?>
		<?php echo $form->textField($model,'name_th',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name_th'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'show_type'); ?>
                <select id="LeftMenu_show_type" name="LeftMenu[show_type]" onchange="changeShowType(this.value);">
                    <option value="">Please Select</option>
                    <option value="list" <?php if($model->show_type =='list'){ echo"selected";}?>>Show list of type</option>
                    <option value="single" <?php if($model->show_type =='single'){ echo"selected";}?>>Show single page</option>
                    <option value="link" <?php if($model->show_type =='link'){ echo"selected";}?>>External Link</option>
                </select>
                <?php echo $form->error($model,'show_type'); ?>
	</div>
        
        <div id="single_page" class="row" style="display:none">
		<?php echo $form->labelEx($model,'page_id'); ?>
		<?php echo $form->dropDownList($model, 'page_id',$page_id_list,array('empty' => 'Please Select Page')); ?>
		<?php echo $form->error($model,'page_id'); ?>
	</div>
        
        <div id="link" class="row" style="display:none">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>
	
        <div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
		<?php echo $form->error($model,'sort_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status', array('1'=>'Enabled','0'=>'Disabled')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->