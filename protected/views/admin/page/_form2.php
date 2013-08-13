<div class="form">
<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
        <?php if($model->page_id!=3){?>
	<div class="row">
                <label>ข้อมูลหน้าภาษาอังกฤษ</label><br/>
                <?php if($model->page_id==7){?>
                        <?php echo $form->textArea($model,'desc_en',array('rows'=>6, 'cols'=>50)); ?>
                <?php }else{?>
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
                <?php } ?>
		<?php echo $form->error($model,'desc_en'); ?>
	</div>
        <br/><br/>
	<div class="row">
                <label>ข้อมูลหน้าภาษาไทย</label><br/>
                <?php if($model->page_id==7){?>
                        <?php echo $form->textArea($model,'desc_th',array('rows'=>6, 'cols'=>50)); ?>
                <?php }else{?>
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
                <?php } ?>
		<?php echo $form->error($model,'desc_th'); ?>
	</div>
        <?php }?>
        <?php if($model->page_id==7){?>
        <div class="row">
            <table width="100%"  border="0" cellpadding="1" cellspacing="1">
                <tr>
                    <td width="20%"><b>อีเมล์ผู้ดูแลระบบ</b></td>
                    <td width="2%">:</td>
                    <td ><?php echo $form->textField($model,'title_en',array('size'=>80,'maxlength'=>255)); ?>
                        <br/>(ถ้ามีมากกว่า 1 อีเมล์ให้ใส่ (,) คั่นระหว่างอีเมล์)
                        <?php echo $form->error($model,'title_en'); ?></td>
                </tr>                
            </table>
	</div>
        <?php }?>
        <?php if($model->page_id==3){?>
        <div class="row">
            <table width="100%"  border="0" cellpadding="1" cellspacing="1">
                <tr>
                    <td width="20%"><b>Link Video youtube</b></td>
                    <td width="2%">:</td>
                    <td ><?php echo $form->textField($model,'title_th',array('size'=>80, 'maxlength'=>255)); ?><?php echo $form->error($model,'title_th'); ?></td>
                </tr>                
            </table>

	</div>
        <?php }?>
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
        <div class="row">
            <table width="100%"  border="0" cellpadding="1" cellspacing="1">
                <?php if($model->page_id ==10){?>
                <tr>
                    <td width="20%"><b>สถานะ</b></td>
                    <td width="2%">:</td>
                    <td >
                        <?php echo $form->dropDownList($model, 'status', array('1'=>'แสดง','0'=>'ไม่แสดง')); ?>
                        <?php echo $form->error($model,'status'); ?>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td width="20%"><b>วันที่ปรับปรุงล่าสุด</b></td>
                    <td width="2%">:</td>
                    <td ><?php echo $this->getThaiDate($model->time_stamp,'dmYHis');?></td>
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