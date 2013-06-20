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
if(Yii::app()->language == 'en_us'){
   Yii::app()->language = 'en' ;
}
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
    <div class="menu">    
        <ul>
            <?php if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?>
                <li><a <?php if($curpage=='site/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->request->baseUrl; ?>" title="Home">Home</a></li>
                <li><a <?php if($curpage=='about/index'||$curpage=='about/board'||$curpage=='about/executive'||$curpage=='alumni'){?>class="active"<?php }?> 
                        href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>" title="About GSPA">About GSPA</a>
                    <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>">History</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>2)); ?>">Sign of GSPA</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>4)); ?>">Vision</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>5)); ?>">Mission</a></li>   
                            <li><a href="<?php echo Yii::app()->createUrl('about/executive'); ?>">Executive of GSPA</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about/structure'); ?>">Organization Structure</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about/board'); ?>">Teachers</a></li>
<!--                            <li><a href="<?php echo Yii::app()->createUrl('cooperation'); ?>">Academic Cooperation</a></li>     
                            <li><a href="<?php echo Yii::app()->createUrl('alumni'); ?>">GSPA Alumni</a></li> 
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>6)); ?>">Map</a></li>           -->
                    </ul>
                </li>
                <li><a <?php if($curpage=='announce/admission'||$curpage=='announce/job'){?> class="active" <?php }?> href="#" title="Announcement" >Announcement</a>
                    <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('announce/admission'); ?>">Admission</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('announce/job'); ?>">Jobs</a></li>
                    </ul>
                </li>
                
                <li><a <?php if($curpage=='news/index'||$curpage=='news/media'||$curpage=='gallery/index'){?> class="active" <?php }?> href="#" title="News & Activities" >News & Activities</a>
                    <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('news'); ?>">GSPA News</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('news/media'); ?>">Media News</a></li>
                            <!--li><a href="<?php echo Yii::app()->createUrl('gallery'); ?>">Gallery</a></li-->
                    </ul>
                </li>
                <li><a <?php if($curpage=='document/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('document'); ?>" title="Download" >Download</a>                   
                    
                    <ul>
                        <?php
                            $criteria = new CDbCriteria();
                            $criteria->condition = 'status=:status';
                            $criteria->params=array(':status'=>1);
                            $criteria->order = 'sort_order';
                            $doc_type = DocumentType::model()->findAll($criteria);

                            foreach($doc_type as $type) {
                        ?>
                        <li><a href="<?php echo Yii::app()->createUrl('document/type', array('id'=>$type->doc_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
                        <?php }?>
                    </ul>
                </li>
<!--                <li><a <?php if($curpage=='program/index'||$curpage=='program/admission'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('program'); ?>" title="Programs">Programs</a>
                    <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('program'); ?>">Programs</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('program/admission', array('id'=>15)); ?>">PHD Admissions</a></li>          
                            <li><a href="<?php echo Yii::app()->createUrl('program/admission', array('id'=>14)); ?>">Master Admissions</a></li>           
                    </ul>
                </li>
                <li><a <?php if($curpage=='gallery/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('gallery'); ?>" title="Gallery">Gallery</a></li>
                <li><a <?php if($curpage=='news/index'||$curpage=='news/news'||$curpage=='news/student '||$curpage=='news/job'||$curpage=='news/advertise'){?> class="active" <?php }?> href="#" title="News" >News</a>
                    <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('news'); ?>">News & Events</a></li>  
                            <li><a href="<?php echo Yii::app()->createUrl('news/news'); ?>">Public Relations News</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('news/student'); ?>">Student News</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('news/job'); ?>">Employment News</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('news/advertise'); ?>">Announce</a></li>
                    </ul>
                </li>-->

<!--                <li><a <?php if($curpage=='document/index'||$curpage=='page/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('document'); ?>" title="Student Services" >Student Services</a>
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('document'); ?>">Document</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('page', array('id'=>16)); ?>">Thesis / Dissertation</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('page', array('id'=>17)); ?>">Special problems / Thesis work</a></li>         
                    </ul>
                </li>-->
<!--                <li><a <?php if($curpage=='link/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl(''); ?>" title="Organization" >Organization</a>
                    <ul>
                        <li><a href="#">ศูนย์อินโดจีนศึกษา</a></li>
                        <li><a href="#">ศูนย์วิจัยนโยบายและการบริหาร</a></li>
                        <li><a href="#">พิพิธภัณฑ์วิทยาศาสตร์ทางทะเล</a></li>
                        <li><a href="#">มหาวิทยาลัยบูรพา</a></li>
                        <li><a href="#">งานประกันคุณภาพ</a></li>
                    </ul>
                </li>-->
                <li><a <?php if($curpage=='site/contact'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('site/contact'); ?>"title="Contact Us" >Contact Us</a></li>
            <?php }else{?>
                <li><a <?php if($curpage=='site/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->request->baseUrl; ?>" title="หน้าแรก">หน้าแรก</a></li>
                <li><a <?php if($curpage=='about/index'||$curpage=='about/board'||$curpage=='about/executive'||$curpage=='alumni'){?>class="active"<?php }?> 
                        href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>" title="เกี่ยวกับวิทยาลัย">เกี่ยวกับหน่วยงาน</a>
                    <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>">ความเป็นมา</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>2)); ?>">ตราสัญลักษณ์</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>4)); ?>">วิสัยทัศน์</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>5)); ?>">พันธกิจ</a></li>                            
                            <li><a href="<?php echo Yii::app()->createUrl('about/executive'); ?>">ทำเนียบผู้บริหาร</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about/structure'); ?>">โครงสร้างหน่วยงาน</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about/board'); ?>">คณาจารย์</a></li>
<!--                            <li><a href="<?php echo Yii::app()->createUrl('cooperation'); ?>">ความร่วมมือทางวิชาการ</a></li>     
                            <li><a href="<?php echo Yii::app()->createUrl('alumni'); ?>">ทำเนียบศิษย์เก่า</a></li> 
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>6)); ?>">แผนที่วิทยาลัย</a></li>           -->
                    </ul>
                </li>
                <li><a <?php if($curpage=='announce/admission'||$curpage=='announce/job'){?> class="active" <?php }?> href="#" title="ประกาศ" >ประกาศ</a>
                    <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('announce/admission'); ?>">สมัครเรียน</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('announce/job'); ?>">รับสมัครงาน</a></li>
                    </ul>
                </li>
                <li><a <?php if($curpage=='news/index'||$curpage=='news/advertise'||$curpage=='gallery/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('news'); ?>" title="ประชาสัมพันธ์/กิจกรรม" >ประชาสัมพันธ์/กิจกรรม</a>
                    <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('news'); ?>">ภายใน</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('news/media'); ?>">จากสื่อ</a></li>
                            <!--li><a href="<?php echo Yii::app()->createUrl('gallery'); ?>">ประมวลภาพกิจกรรม</a></li-->
                    </ul>
                </li>
                <li><a <?php if($curpage=='document/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('document'); ?>" title="สื่อเผยแพร่/ดาวน์โหลด" >สื่อเผยแพร่/ดาวน์โหลด</a>                   
                    
                    <ul>
                        <?php
                            $criteria = new CDbCriteria();
                            $criteria->condition = 'status=:status';
                            $criteria->params=array(':status'=>1);
                            $criteria->order = 'sort_order';
                            $doc_type = DocumentType::model()->findAll($criteria);

                            foreach($doc_type as $type) {
                        ?>
                        <li><a href="<?php echo Yii::app()->createUrl('document/type', array('id'=>$type->doc_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
                        <?php }?>
                    </ul>
                </li>
<!--                <li><a <?php if($curpage=='program/index'||$curpage=='program/admission'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('program'); ?>" title="หลักสูตร">หลักสูตร</a>
                    <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('program'); ?>">หลักสูตรที่เปิดสอน</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('program/admission', array('id'=>15)); ?>">สมัครเรียนปริญญาเอก</a></li>          
                            <li><a href="<?php echo Yii::app()->createUrl('program/admission', array('id'=>14)); ?>">สมัครเรียนปริญญาโท</a></li>           
                    </ul>
                </li>-->
<!--                <li><a <?php if($curpage=='document/index'||$curpage=='page/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('document'); ?>" title="บริการนิสิต" >บริการนิสิต</a>
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('document'); ?>">เอกสารประกอบการเรียน</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('page', array('id'=>16)); ?>">วิทยานิพนธ์ / ดุษฎีนิพนธ์</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('page', array('id'=>17)); ?>">ปัญหาพิเศษ / งานนิพนธ์</a></li>         
                    </ul>
                </li>-->
<!--                <li><a <?php if($curpage=='link/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl(''); ?>" title="หน่วยงานภายใน" >หน่วยงานภายใน</a>
                    <ul>
                        <li><a href="#">ศูนย์อินโดจีนศึกษา</a></li>
                        <li><a href="#">ศูนย์วิจัยนโยบายและการบริหาร</a></li>
                        <li><a href="#">พิพิธภัณฑ์วิทยาศาสตร์ทางทะเล</a></li>
                        <li><a href="#">มหาวิทยาลัยบูรพา</a></li>
                        <li><a href="#">งานประกันคุณภาพ</a></li>
                    </ul>
                </li>-->
                <li><a <?php if($curpage=='site/contact'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('site/contact'); ?>"title="ติดต่อเรา" >ติดต่อเรา</a></li>
            
            <?php }?>
        </ul>
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
        <div class="alignright">
            Site Map | FAQ
        </div>
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