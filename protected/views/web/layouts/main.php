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
<body id="page1">
<!--==============================header=================================-->
<header>
  <div class="main">
    <div class="wrapper">
      <h1 class="logo"><a href="index.html" title="วิทยาลัยการบริหารรัฐกิจ มหาวิทยาลัยบูรพา"><img src="images/front/buu_logo.png" border="0" /></a><span>GSPA</span><strong>วิทยาลัยการบริหารรัฐกิจ ม.บูรพา</strong> </h1>    
      <!--<div class="logo2"><img src="images/front/logo2.png" title="วิทยาลัยบริหารรัฐกิจ มหาวิทยาลัยบูรพา"/></div>-->       
       <div id="search">    
        <form action="#" method="post">
            <fieldset>
            <legend>Site Search</legend>
            <input type="text" placeholder="ค้นหาที่นี่" />
            <input type="submit" name="go" id="go" value="GO" />
            </fieldset>
        </form>
      </div>
    <div class="clear"></div>
    <nav>
    <ul class="menu">
        <li><a class="active" href="<?php echo Yii::app()->request->baseUrl; ?>" title="หน้าแรก">หน้าแรก</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>" title="เกี่ยวกับเรา">เกี่ยวกับเรา</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('program'); ?>" title="หลักสูตรที่เปิดสอน">หลักสูตร</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('gallery'); ?>" title="ประมวลภาพกิจกรรม">ภาพกิจกรรม</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('news'); ?>" title="ข่าวสาร" >ข่าวสาร</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('alumni'); ?>" title="ศิษย์เก่าดีเด่น" >ศิษย์เก่า</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>"title="ติดต่อเรา" >ติดต่อเรา</a></li>
    </ul>
    </nav>
    <div class="lang">
    	   <a title="ภาษาไทย" href="&lang=th"><img src="images/front/flag_th.png" alt="Thai" border="0" /></a>
           <a title="English" href="&lang=en"><img src="images/front/flag_en.png" alt="English" border="0" /></a>
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
    <div class="alignleft">วิทยาลัยการบริหารรัฐกิจ มหาวิทยาลัยบูรพา<br/>
        168 ถ.ลงหาดบางแสน ต.แสนสุข อ.เมือง จ.ชลบุรี 20131<br/>
        โทร. 038-393-260 (อัตโนมัติ 5 คู่สาย) โทรสาร 038-745-851-2 ต่อ 120
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