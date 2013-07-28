<?php
$curpage = Yii::app()->getController()->getAction()->controller->id;
$curpage .= '/'.Yii::app()->getController()->getAction()->controller->action->id;
//echo $curpage;
if(Yii::app()->language == 'en_us'){
   Yii::app()->language = 'en' ;
}
$contact =Page::model()->findByPk(7);
$lang = Yii::app()->language;
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $link = "Enter Site";
    $desc = $model->desc_en;
}else{
    $link = "เข้าสู่เว็บไซต์";
    $desc = $model->desc_th;
}?>
<!-- Top Banner -->
<div class="main">
    <div class="lang">
    	   <a title="ภาษาไทย" href="<?php echo Yii::app()->UrlManager->createLanguageUrl('th');?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/flag_th.png" alt="Thai" border="0" /></a>
           <a title="English" href="<?php echo Yii::app()->UrlManager->createLanguageUrl('en');?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/flag_en.png" alt="English" border="0" /></a>
    </div>
</div>
<section id="content">
  <div class="main">
    <div class="slider-wrapper">
        <?php echo $desc;?>
    </div>
    <div align="center">
        <a class="button" href="<?php echo Yii::app()->createUrl('site/home'); ?>"><?php echo $link;?></a>
    </div>
  </div>
</section>