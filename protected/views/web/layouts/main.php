<!DOCTYPE html>
<html lang="th">
<head>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta charset="utf-8">
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/layout.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/fonts.css" type="text/css" charset="utf-8" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.3.min.js" type="text/javascript"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/FF-cash.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/tms-0.3.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/tms_presets.js" type="text/javascript"></script>
<script type="text/javascript">
$(function () {
    $('.close').bind('click', function () {
        $(this).parent().show().fadeOut(500);
    });
});
</script>
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/ie.css" type="text/css" media="screen">
<![endif]-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/Scripts/AC_ActiveX.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<?php
$curpage = Yii::app()->getController()->getAction()->controller->id;
$curpage .= '/'.Yii::app()->getController()->getAction()->controller->action->id;
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $h1_text = "Graduate School of Public Administration";
    $css_class = "logo_en";
    $search_text = "Search Here";
    $footer_text = "Graduate School of Public Administration, Burapha University<br/>
        168 Long-Hard Bangsaen Road, Saen Sook Sub-district, Mueang District, Chonburi 20131<br/>
        Tel. +66 (0) 38-393-260 (Auto 5 lines) Fax. +66 (0) 38-745-851-2 Ext. 120";
}else{  
    $h1_text = "วิทยาลัยการบริหารรัฐกิจ มหาวิทยาลัยบูรพา";
    $css_class = "logo_th";
    $search_text = "ค้นหาที่นี่";
    $footer_text = "วิทยาลัยการบริหารรัฐกิจ มหาวิทยาลัยบูรพา<br/>
        168 ถ.ลงหาดบางแสน ต.แสนสุข อ.เมือง จ.ชลบุรี 20131<br/>
        โทร. 038-393-260 (อัตโนมัติ 5 คู่สาย) โทรสาร 038-745-851-2 ต่อ 120";
}
//echo Yii::app()->controller->getId();
//echo "<br/>";
//echo Yii::app()->controller->getAction()->getId();
//echo "<br/>";
//echo Yii::app()->createUrl(Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId(), $_GET);
?>
<body <?php if($curpage=='site/index'){?>id="page1"<?php }else{?>id="page2"<?php }?>>
<!--==============================header=================================-->
<header>
  <div class="main">
    <div class="wrapper">
      <a href="<?php echo Yii::app()->request->baseUrl; ?>" title="<?php echo $h1_text;?>"><h1 class="<?php echo $css_class;?>"><?php echo $h1_text;?></h1></a>          
       <div id="search">    
        <form action="#" method="post">
            <fieldset>
            <legend>Site Search</legend>
            <input type="text" placeholder="<?php echo $search_text;?>..." />
            <input type="submit" name="go" id="go" value="GO" />
            </fieldset>
        </form>
      </div>
    <div class="clear"></div>
    <nav>
    <!--<ul class="menu">
        <li><a class="active" href="<?php echo Yii::app()->request->baseUrl; ?>" title="หน้าแรก">หน้าแรก</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>" title="เกี่ยวกับเรา">เกี่ยวกับเรา</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('program'); ?>" title="หลักสูตรที่เปิดสอน">หลักสูตร</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('gallery'); ?>" title="ประมวลภาพกิจกรรม">ภาพกิจกรรม</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('news'); ?>" title="ข่าวสาร" >ข่าวสาร</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('document'); ?>" title="บริการนิสิต" >บริการนิสิต</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>"title="ติดต่อเรา" >ติดต่อเรา</a></li>
    </ul>-->
    <div class="menu">
    <?php if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?>
                <?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site')),
				array('label'=>'About GSPA', 'url'=>array('/about', 'id'=>'1'),
                                                           'active'=>$this->isActive(
                                                                   array(
                                                                        'about',
                                                                        'about/board',
                                                                        'about/executive',
                                                                        'alumni',
                                                                    ))), 
				array('label'=>'Programs', 'url'=>array('/program'),
                                                           'active'=>$this->isActive(
                                                                   array(
                                                                        'program',
                                                                        'program/admission',
                                                                    ))), 
				array('label'=>'Activities', 'url'=>array('/gallery')),
				array('label'=>'News', 'url'=>array('/news/index'),
                                                           'active'=>$this->isActive(
                                                                   array(
                                                                        'news',
                                                                        'news/news',
                                                                        'news/student',
                                                                        'news/job',
                                                                    ))), 
				array('label'=>'Student Services', 'url'=>array('/document'),
                                                           'active'=>$this->isActive(
                                                                   array(
                                                                        'document',
                                                                        'page',
                                                                    ))), 
				array('label'=>'Contact Us', 'url'=>array('/site/contact')),
			),
		)); ?> 
    <?php }else{?>
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'หน้าแรก', 'url'=>array('/site')),
				array('label'=>'เกี่ยวกับวิทยาลัย', 'url'=>array('/about', 'id'=>'1'),
                                                           'active'=>$this->isActive(
                                                                   array(
                                                                        'about',
                                                                        'about/board',
                                                                        'about/executive',
                                                                        'alumni',
                                                                    ))), 
				array('label'=>'หลักสูตร', 'url'=>array('/program'),
                                                           'active'=>$this->isActive(
                                                                   array(
                                                                        'program',
                                                                        'program/admission',
                                                                    ))), 
				array('label'=>'ภาพกิจกรรม', 'url'=>array('/gallery')),
				array('label'=>'ข่าวสาร', 'url'=>array('/news/index'),
                                                           'active'=>$this->isActive(
                                                                   array(
                                                                        'news',
                                                                        'news/news',
                                                                        'news/student',
                                                                        'news/job',
                                                                    ))), 
				array('label'=>'บริการนิสิต', 'url'=>array('/document'),
                                                           'active'=>$this->isActive(
                                                                   array(
                                                                        'document',
                                                                        'page',
                                                                    ))), 
				array('label'=>'ติดต่อเรา', 'url'=>array('/site/contact')),
			),
		)); ?> 
    <?php } ?>
    </div>
    </nav>
    <div class="lang">
    	   <a title="ภาษาไทย" href="<?php echo Yii::app()->UrlManager->createLanguageUrl('th');?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/flag_th.png" alt="Thai" border="0" /></a>
           <a title="English" href="<?php echo Yii::app()->UrlManager->createLanguageUrl('en');?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/flag_en.png" alt="English" border="0" /></a>
    </div>
    <div class="clear"></div>
    </div>
  </div>
</header>
<!--==============================content================================-->
<?php echo $content;?>
<!--==============================footer=================================-->
<footer>
  <div class="main">
    <ul class="list-services">
        <li><a href="#">Facebook</a></li>
        <li class="last-item"><a class="it-2" href="#">Twitter</a></li>
    </ul>  
    <div class="alignleft">
        <?php echo $footer_text;?>
    </div>
  </div>
</footer>
<script type="text/javascript">
$(window).load(function () {
    $('.slider')._TMS({
        duration: 800,
        easing: 'easeOutQuart',
        preset: 'diagonalExpand',
        slideshow: 7000,
        pagNums: false,
        pagination: '.pagination',
        banners: 'fade',
        pauseOnHover: true,
        waitBannerAnimation: true
    });
});
</script>
</body>
</html>