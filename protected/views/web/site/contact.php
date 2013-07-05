<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.googlemaps1.01.js"></script>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;hl=en&amp;sensor=true&amp;key=" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#map_canvas').googleMaps({
        latitude: 13.285964,
        longitude: 100.924763,
        markers: {
            latitude: 13.285964,
            longitude: 100.924763
        }
    });
});
</script>

<section id="content">
  <div class="main">
    <div class="indent-left">
      <div class="wrapper">
        <article class="col-1">
          <h3>ที่ตั้งวิทยาลัย</h3>
          <div class="p1">
            <figure class="img-border">
              <div id="map_canvas"></div>
            </figure>
            <div class="clear"></div>
          </div>
          <dl>
            <?php 
            $lang = Yii::app()->language;
            if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                echo nl2br($page->desc_en);
            }else{
                echo nl2br($page->desc_th);
            }?>  
          </dl>
        </article>
        <article class="col-2">
            <h3>ติดต่อเรา</h3>
        <?php if(Yii::app()->user->hasFlash('contact')): ?>
        <div class="confirmation">
                <?php echo Yii::app()->user->getFlash('contact'); ?>
        </div>
        <?php else: ?>          
          <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'contact-form',
                    'enableClientValidation'=>true,
                    'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                    ),
            )); ?>
            <fieldset>
               <?php echo $form->error($model,'name'); ?>
                <label>
                <input type="text" name="ContactForm[name]" value="ชื่อผู้ติดต่อ" onBlur="if(this.value=='') this.value='ชื่อผู้ติดต่อ'" onFocus="if(this.value =='ชื่อผู้ติดต่อ' ) this.value=''" />                
                </label>
                
                <?php echo $form->error($model,'email'); ?> 
                <label>
                    <input type="text" name="ContactForm[email]" value="อีเมล์" onBlur="if(this.value=='') this.value='อีเมล์'" onFocus="if(this.value =='อีเมล์' ) this.value=''" />               
                </label>
                <?php echo $form->error($model,'subject'); ?>
                <label>
                    <input type="text" name="ContactForm[subject]" value="ชื่อเรื่องที่ติดต่อ" onBlur="if(this.value=='') this.value='ชื่อเรื่องที่ติดต่อ'" onFocus="if(this.value =='ชื่อเรื่องที่ติดต่อ' ) this.value=''" />                
                </label>
                <?php echo $form->error($model,'body'); ?>
                <textarea name="ContactForm[body]" onBlur="if(this.value=='') this.value='ข้อความ'" onFocus="if(this.value =='ข้อความ' ) this.value=''">ข้อความ</textarea>
              
              	<div class="buttons-wrapper">
                    <input name="submit" type="submit" value="ส่งข้อความ" />&nbsp;&nbsp;<input name="reset" type="reset" value="ล้างข้อความ"/>
                </div>
            </fieldset>
          <?php $this->endWidget(); ?> 
        <?php endif; ?>                   
        </article>
      </div>
    </div>
  </div>
</section>


