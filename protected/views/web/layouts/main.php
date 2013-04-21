<!DOCTYPE html>
<html lang="th">
<head>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta charset="utf-8">
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/layout.css" type="text/css" media="screen">
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
      <h1 class="logo"><a href="index.html" title="วิทยาลัยการบริหารรัฐกิจ มหาวิทยาลัยบูรพา"><img src="images/front/buu_logo.png" border="0" /></a><span>GSPA</span><strong>Graduate School of Public Administration</strong> </h1>
      <nav>
        <ul class="menu">
          <li><a class="active" href="<?php echo Yii::app()->request->baseUrl; ?>" title="หน้าแรก">Home</a></li>
          <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>" title="เกี่ยวกับเรา">About Us</a>
          </li>
          <li><a href="<?php echo Yii::app()->createUrl('gallery'); ?>" title="ประมวลภาพกิจกรรม">Gallery</a></li>
          <li><a href="<?php echo Yii::app()->createUrl('news'); ?>" title="ข่าวสาร" >News</a></li>
          <li><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>"title="ติดต่อเรา" >Contacts Us</a></li>
        </ul>

      </nav>
      <div class="logo2"><img src="images/front/logo2.png" title="วิทยาลัยบริหารรัฐกิจ มหาวิทยาลัยบูรพา"/></div>
       
      <div id="search">
           
      <form action="#" method="post">
     
        <fieldset>
          <legend>Site Search</legend>
          <input type="text" placeholder="ค้นหาที่นี่" />
          <input type="submit" name="go" id="go" value="GO" />
          
        </fieldset>
      </form>
    </div>
    <div class="lang">
    	   <a title="" href="&lang=th"><img src="images/front/flag_th.png" alt="Thai" border="0" /></a>
           <a title="" href="&lang=en"><img src="images/front/flag_en.png" alt="English" border="0" /></a>
    </div>
    <div class="clear"></div>
    <div style="margin-top: 30px;padding-left: 20px;">
    <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
    <?php endif?>
    </div>
    </div>
  </div>
</header>



<!--==============================content================================-->
<?php echo $content;?>
<!--==============================footer=================================-->
<footer>
  <div class="main">
    <div class="wrapper border-bot2 margin-bot">
      <article class="fcol-1">
        <div class="indent-left">
          <h3 class="color-1">Contact Detail</h3>
            <p class="p3">168 ถ.ลงหาดบางแสน ต.แสนสุข 
            อ.เมือง จ.ชลบุรี 20131<br>
            Tel. 038-393-260 (Auto 5 lines)<br>
            Fax. 038-745-851-2 Ext. 120<br>
            Email : infoxxx@xxx.com
            </p>
             <h3 class="color-1">Social Link</h3>
             <ul class="list-services">
                <li><a href="#">Facebook</a></li>
                <li class="last-item"><a class="it-2" href="#">Twitter</a></li>
             </ul>
        </div>
      </article>
      <article class="fcol-2">
         <h3 class="color-1">Organization</h3>
          <ul class="list-3">
            <li><a href="#">ศูนย์อินโดจีนศึกษา</a></li>
            <li><a href="#">ศูนย์วิจัยนโยบายและการบริหาร</a></li>
            <li><a href="#">พิพิธภัณฑ์วิทยาศาสตร์ทางทะเล</a></li>
            <li><a href="#">มหาวิทยาลัยบูรพา</a></li>
            <li><a href="#">งานประกันคุณภาพวิทยาลัยบริหารรัฐกิจ</a></li>
			<li class="last-item"><a href="#">การจัดการความรู้วิทยาลัยบริหารรัฐกิจ</a></li>
            
          </ul>
      </article>
      <article class="fcol-3">
        <h3 class="color-1">Links</h3>
        <ul class="list-3">
          <li><a href="#">E-Register</a> <span> - ระบบทะเบียนและสถิติ</span></li>
          <li><a href="#">E-Learning</a> <span> - ระบบการเรียนรู้ออนไลน์</span></li>
          <li><a href="#">E-Library GSPA</a> <span> - ห้องสมุดวิทยาลัยบริหารรัฐกิจ</span></li>
          <li><a href="#">E-Form for Student</a> <span> - แบบฟอร์มสำหรับนิสิต</span></li>
          <li><a href="#">E-News</a> <span> - ข่าวสารสำหรับนิสิต</span></li>
          <li class="last-item"><a href="#">E-Document</a> <span> - ระบบสารบรรณอิเล็กทรอนิกส์</span></li>
        </ul>
      </article>
    </div>
    <div class="aligncenter">Copyright &copy; <a class="color-1" href="#">Domain Name</a> All Rights Reserved </div>
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