<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.3.min.js" type="text/javascript"></script>

<?php
/* @var $this SiteController */
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle="Graduate School of Public Administration - Direct Line‎ to Dean";
    $col1_header = "Direct Line‎ to Dean";
    $col2_header = "Contact Us"; 
    $name = "Name";
    $subject = "Subject";
    $email = "E-mail";
    $message = "Message";
    $btn_submit = "Send Message";
    $btn_reset = "Reset Message";
    $img_dean = "dean_en.png";
    $captcha_text = 'Enter the letters as they are shown in the image.';

}else{
    $this->pageTitle=Yii::app()->name. ' - สายตรงคณบดี';
    $col1_header = "สายตรงคณบดี"; 
    $col2_header = "ติดต่อเรา"; 
    $name = "ชื่อผู้ติดต่อ";
    $subject = "ชื่อเรื่องที่ติดต่อ";
    $email = "อีเมล์";
    $message = "ข้อความ";  
    $btn_submit = "ส่งข้อความ";
    $btn_reset = "ล้างข้อความ";  
    $img_dean = "dean_th.png";
    $captcha_text = 'กรุณาใส่รหัสป้องกันตามภาพ';
}
?>
<div id="page2">
<section id="content">
  <div class="main">

      <div class="wrapper">
        <article class="col-1">
            <div class="indent-left">
                <h3><?php echo $col1_header;?></h3>
                <div class="p1">
                  <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/<?php echo $img_dean;?>" width="100%">
                  <div class="clear"></div>
                </div>
                <dl>
                  <?php 
                  $lang = Yii::app()->language;
                  if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                      echo 'ท่านสามารถส่งข้อเสนอแนะ ติชม ถึงคณบดี เพื่อเป็นประโยชน์ในการพัฒนาวิทยาลัยการบริหารรัฐกิจ';
                  }else{
                      echo 'ท่านสามารถส่งข้อเสนอแนะ ติชม ถึงคณบดี เพื่อเป็นประโยชน์ในการพัฒนาวิทยาลัยการบริหารรัฐกิจ';
                  }?>  
                </dl>
            </div>
        </article>
        <article class="col-left">
            <h3>&nbsp;</h3>
        <?php if(Yii::app()->user->hasFlash('contact')): ?>
        <div class="confirmation">
                <?php echo Yii::app()->user->getFlash('contact'); ?>
        </div>
        <?php endif; ?> 

          <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'contact-form',
                    'enableAjaxValidation'=>false,
            )); ?>
            <fieldset>
               <?php echo $form->error($model,'name'); ?>
                <label>
                <input type="text" name="Directline[name]" value="<?php echo $name;?>" onBlur="if(this.value=='') this.value='<?php echo $name;?>'" onFocus="if(this.value =='<?php echo $name;?>' ) this.value=''" />                
                </label>
                
                <?php echo $form->error($model,'email'); ?> 
                <label>
                    <input type="text" name="Directline[email]" value="<?php echo $email;?>" onBlur="if(this.value=='') this.value='<?php echo $email;?>'" onFocus="if(this.value =='<?php echo $email;?>' ) this.value=''" />               
                </label>
                <?php echo $form->error($model,'subject'); ?>
                <label>
                    <input type="text" name="Directline[subject]" value="<?php echo $subject;?>" onBlur="if(this.value=='') this.value='<?php echo $subject;?>'" onFocus="if(this.value =='<?php echo $subject;?>' ) this.value=''" />                
                </label>
                <?php echo $form->error($model,'message'); ?>
                <textarea name="Directline[message]" onBlur="if(this.value=='') this.value='<?php echo $message;?>'" onFocus="if(this.value =='<?php echo $message;?>' ) this.value=''"><?php echo $message;?></textarea>

                
<?php if(CCaptcha::checkRequirements()): ?>
    <br/><br/>
<div class="row">
    <span style="width:400px;">

    <?php //echo $form->labelEx($model,'verifyCode'); ?>

           <?php
            $this->widget('CCaptcha',
                          array('showRefreshButton'=>true,
                                'buttonType'=>'button',
                                'buttonOptions'=>
                                                    array('type'=>'image',
                                                          'src'=> Yii::app()->request->baseUrl."/images/front/refresh.png",
                                                          'width'=>20,
                                                    ),                                                            
                                'buttonLabel'=>'Refresh'),
                          false); 
            ?>

       
    <?php echo $form->textField($model,'verifyCode',array('size'=>70,'maxlength'=>100,'encode'=>false,'value'=>'','placeholder'=>$captcha_text)); ?>
    </span>
    <!--div class="hint"><?php echo $captcha_text;?></div-->
    <?php echo $form->error($model,'verifyCode'); ?>
</div>
<?php endif; ?>              
                
              	<div class="buttons-wrapper">
                    <input name="submit" type="submit" value="<?php echo $btn_submit;?>" />&nbsp;&nbsp;<input name="reset" type="reset" value="<?php echo $btn_reset;?>"/>
                </div>
            </fieldset>
          <?php $this->endWidget(); ?> 
                          
        </article>
      </div>

  </div>
</section>
</div>

