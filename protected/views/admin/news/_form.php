<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note"><span class="required">*</span> ข้อมูลที่จำเป็นต้องกรอก</p>

	<?php echo $form->errorSummary($model,'กรุณากรอกข้อมูลให้ถูกต้อง');?>
	<div class="row">          
		<?php echo $form->labelEx($model,'news_type_id'); ?>
		<?php echo $form->dropDownList($model, 'news_type_id', $news_type_list,array(
                        'prompt' => '--กรุณาเลือกประเภทหลัก--',
                        'value' => '0',
                        'ajax'  => array(
                        'type'  => 'POST',
                        'url' => CController::createUrl('news/type'),
                        'update' => '#News_news_group_id',   //selector to update value
                        'data' => array('news_type_id'=>'js:this.value'),
                        )
                  )); ?>              

		<?php echo $form->error($model,'news_type_id'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'news_group_id'); ?>
                <?php echo $form->dropDownList($model, 'news_group_id', $news_group_list,array(
                                    'prompt' => '--กรุณาเลือกประเภทย่อย--',
                                    'value' => '0',)); ?>            
		<?php echo $form->error($model,'news_group_id'); ?>
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
		<?php echo $form->labelEx($model,'title_en'); ?>
		<?php echo $form->textArea($model,'title_en',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title_th'); ?>
		<?php echo $form->textArea($model,'title_th',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_en'); ?><br/>
                <?php $this->widget('ext.widgets.xheditor.XHeditor',array(
                        'model'=>$model,
                        'modelAttribute'=>'desc_en',
                        'config'=>array(
                                'id'=>'xheditor_1',
                                'tools'=>'mfull', // mini, simple, mfull, full or from XHeditor::$_tools, tool names are case sensitive
                                'skin'=>'default', // default, nostyle, o2007blue, o2007silver, vista
                                'width'=>'700px',
                                'height'=>'300px',
                                'loadCSS'=>XHtml::cssUrl('editor.css'),
                                'upLinkUrl'=>$this->createUrl('request/uploadFile'),
                                'upLinkExt'=>'zip,rar,txt,pdf',
                                'upImgUrl'=>$this->createUrl('request/uploadFile'),
                                'upImgExt'=>'jpg,jpeg,gif,png',
                        ),
                )); ?>
                
		<?php echo $form->error($model,'desc_en'); ?>
	</div>

	<div class="row"><br/>
		<?php echo $form->labelEx($model,'desc_th'); ?><br/>
                 <?php $this->widget('ext.widgets.xheditor.XHeditor',array(
                        'model'=>$model,
                        'modelAttribute'=>'desc_th',
                        'config'=>array(
                                'id'=>'xheditor_2',
                                'tools'=>'mfull', // mini, simple, mfull, full or from XHeditor::$_tools, tool names are case sensitive
                                'skin'=>'default', // default, nostyle, o2007blue, o2007silver, vista
                                'width'=>'700px',
                                'height'=>'300px',
                                'loadCSS'=>XHtml::cssUrl('editor.css'),
                                'upLinkUrl'=>$this->createUrl('request/uploadFile'),
                                'upLinkExt'=>'zip,rar,txt,pdf',
                                'upImgUrl'=>$this->createUrl('request/uploadFile'),
                                'upImgExt'=>'jpg,jpeg,gif,png',
                        ),
                )); ?>
		<?php echo $form->error($model,'desc_th'); ?>
	</div>       

        <?php
        $icon_list = array('new'=>'new','hot'=>'hot','update'=>'update');
        ?>        
	<div class="row"  style="margin-top: 20px;vertical-align: middle;">
		<?php echo $form->labelEx($model,'news_icon'); ?>
		<?php echo $form->dropDownList($model,'news_icon',$icon_list,array(
                            'prompt' => '--ไม่แสดงไอคอน--',
                            'value' => '0',)); ?>
	</div>
        <div class="row buttons"><br/>         
	</div>
        
       <div class="row"><br/>
		<?php echo $form->labelEx($model,'image'); ?><br/>                
		<?php if(!$model->isNewRecord) echo CHtml::image(Yii::app()->request->baseUrl . '/uploads/news/' . $model->image, '', array('style'=>'width: 600px')); ?><br />
                <span class="required">รูปภาพขนาดความกว้างไม่เกิน 600 px</span><br/>
		<?php echo $form->fileField($model,'image',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>
        
        <div class="row"><br/>
		<?php echo $form->labelEx($model,'thumbnail'); ?><br/>                
		<?php if(!$model->isNewRecord) echo CHtml::image(Yii::app()->request->baseUrl . '/uploads/news/' . $model->thumbnail, '', array('style'=>'width: 290px')); ?><br />
                <span class="required">รูปภาพขนาด กว้าง 290px ยาว 157px เท่านั้น</span><br/>
		<?php echo $form->fileField($model,'thumbnail',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'thumbnail'); ?>
	</div>

        <div class="row" style="vertical-align: middle;">
		<?php echo $form->labelEx($model,'vdo_link'); ?>
		<?php echo $form->textField($model,'vdo_link',array('size'=>80,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'vdo_link'); ?>
	</div>      
        
        <div class="row buttons"><br/>         
	</div>

        <div class="row"><br/>
                <label>อัพโหลดไฟล์ pdf<br/>(ภาษาอังกฤษ)</label><br/>
                <?php if(!$model->isNewRecord) {echo $model->pdf_en." "; if($model->pdf_en) {echo cHtml::link('ดูไฟล์ต้นฉบับ', '../../uploads/news/pdf/'.$model->pdf_en);} }?><br />
		<?php echo $form->fileField($model,'pdf_en',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'pdf_en'); ?>
	</div>

	<div class="row"><br/>
                <label>อัพโหลดไฟล์ pdf<br/>(ภาษาไทย)</label><br/>
		<?php if(!$model->isNewRecord) {echo $model->pdf_th." "; if($model->pdf_th) {echo cHtml::link('ดูไฟล์ต้นฉบับ', '../../uploads/news/pdf/'.$model->pdf_th);} }?><br />
		<?php echo $form->fileField($model,'pdf_th',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'pdf_th'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
                <?php list($year,$month,$day) = explode('-',$model->create_date);
                      $crate_date = $day.'/'.$month.'/'.$year;
                      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'create_date',
                        'language'=>'th',

                        'options'=>array(
                                    'showAnim'=>'fold',
                                    'dateFormat'=>'dd/mm/yy',
                                    'changeMonth'=>true,
                                    'changeYear'=>true,
                                    'changeDate'=>true,
                                    'showAnim'=>'fold',
                                    //'showButtonPanel'=>true,
                                    'debug'=>true,

                                    ),
                        'htmlOptions' => array(
                            'value' => ($model->create_date)?$crate_date:date('d/m/Y'), // set the default date here
                            'class'=>'shadowdatepicker',
                            'readonly'=>"readonly",
                        ),
                    )) ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

<!--	<div class="row">
		<?php //echo $form->labelEx($model,'show_homepage'); ?>
                <?php //echo $form->dropDownList($model, 'show_homepage', array('1'=>'แสดง','0'=>'ไม่แสดง')); ?>
		<?php //echo $form->error($model,'show_homepage'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'show_new'); ?>
                <?php //echo $form->dropDownList($model, 'show_new', array('1'=>'แสดง','0'=>'ไม่แสดง')); ?>
		<?php //echo $form->error($model,'show_new'); ?>
	</div>-->
        
        <div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status', array('1'=>'แสดง','0'=>'ไม่แสดง')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

<?php if (!$model->isNewRecord) { ?>
        <div class="row buttons"><br/>
<script type="text/javascript">
  $(function(){
    var lastHeightx = 0, curHeightx = 0, $frame = $('iframe:eq(0)');
    setInterval(function(){
      curHeightx = $frame.contents().find('body').height();
      if ( curHeightx != lastHeightx ) {
        $frame.css('height', (lastHeightx = parseInt(curHeightx)+50) + 'px' );
      }
    },500);
  });
</script>
            <iframe id="ifrmUpload" src="<?=Yii::app()->request->baseUrl;?>/gallery/index.php?album_id=<?=$_GET['id'];?>" width="700" scrolling="no"></iframe>
	</div>
        
<? } ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'เพิ่มข้อมูล' : 'บันทึกข้อมูล'); ?>&nbsp;&nbsp;
                <?php echo CHtml::Button('ยกเลิก', array('submit' => array('index'))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->