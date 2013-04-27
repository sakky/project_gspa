<div class="form">
<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
	<div class="row">
                <label>ข้อมูลหน้าภาษาอังกฤษ</label><br/>
                <?php 
                    $this->widget('application.extensions.cleditor.ECLEditor', array(
                    'model'=>$model,
                    'attribute'=>'desc_en', //Model attribute name. Nome do atributo do modelo.
                    'options'=>array(
                        'width'=>'700',
                        'height'=>'300',
                        'useCSS'=>true,
                    ),
                    'value'=>$model->desc_en, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
                ));?>
		<?php echo $form->error($model,'desc_en'); ?>
	</div>
        <br/><br/>
	<div class="row">
                <label>ข้อมูลหน้าภาษาไทย</label><br/>
                <?php 
                    $this->widget('application.extensions.cleditor.ECLEditor', array(
                    'model'=>$model,
                    'attribute'=>'desc_th', //Model attribute name. Nome do atributo do modelo.
                    'options'=>array(
                        'width'=>'700',
                        'height'=>'300',
                        'useCSS'=>true,
                    ),
                    'value'=>$model->desc_th, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
                ));?>
		<?php echo $form->error($model,'desc_th'); ?>
	</div>
        <?php if($model->page_id ==14 || $model->page_id ==15){?>
        <br/>
        <div class="row">
                <label>อัพโหลดใบสมัคร ภาษาอังกฤษ (ไฟล์ pdf เท่านั้น)</label><br/><br/>
                <?php if(!$model->isNewRecord) {echo $model->pdf_en." "; if($model->pdf_en) {echo cHtml::link('ดูไฟล์ต้นฉบับ', '../../uploads/pages/pdf/'.$model->pdf_en);} }?><br />
		<?php echo $form->fileField($model,'pdf_en',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'pdf_en'); ?>
	</div>

	<div class="row">
                <label>อัพโหลดใบสมัคร ภาษาไทย (ไฟล์ pdf เท่านั้น)</label><br/><br/>
		<?php if(!$model->isNewRecord) {echo $model->pdf_th." "; if($model->pdf_th) {echo cHtml::link('ดูไฟล์ต้นฉบับ', '../../uploads/pages/pdf/'.$model->pdf_th);} }?><br />
		<?php echo $form->fileField($model,'pdf_th',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'pdf_th'); ?>
	</div>
        <?php } ?>
        <br/>
        <div class="row">
            <table width="100%"  border="0" cellpadding="1" cellspacing="1">
                <tr>
                    <td width="20%"><b>วันที่ปรับปรุงล่าสุด</b></td>
                    <td width="2%">:</td>
                    <td ><?php echo $model->time_stamp;?></td>
                </tr>
                <tr>
                    <td><b>ผู้ปรับปรุงข้อมูล</b></td>
                    <td>:</td>
                    <td><?php echo $model->user->firstname.' '.$model->user->lastname;?></td>
                </tr>
                
            </table>
	</div>
        
	<div class="row buttons" align="center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'เพิ่มข้อมูล' : 'บันทึกข้อมูล'); ?>&nbsp;&nbsp;
                <?php echo CHtml::Button('ยกเลิก', array('submit' => array('site/index'))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->