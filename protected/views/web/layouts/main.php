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
//echo $curpage;
if(Yii::app()->language == 'en_us'){
   Yii::app()->language = 'en' ;
}
$contact =Page::model()->findByPk(7);
$lang = Yii::app()->language;
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $contact_us = "Contact Us";
    $h1_text = "Graduate School of Public Administration";
    $css_class = "logo_en";
    $search_text = "Search Here";
    $footer_text = $contact->desc_en;
}else{
    $contact_us = "ติดต่อเรา";
    $h1_text = "วิทยาลัยการบริหารรัฐกิจ มหาวิทยาลัยบูรพา";
    $css_class = "logo_th";
    $search_text = "ค้นหาที่นี่";
    $footer_text = $contact->desc_th;
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
        <form action="<?php echo Yii::app()->createUrl('site/search'); ?>" method="GET">
            <fieldset>
            <legend>Site Search</legend>
            <input type="text" name="q" placeholder="<?php echo $search_text;?>..." />
            <input type="submit" id="go" value="GO" />
            </fieldset>
        </form>
      </div>
    <div class="clear"></div>
    <nav>
    <div class="menu">    
        <ul>
            <?php if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?>
                <li><a <?php if($curpage=='site/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->request->baseUrl; ?>" title="Home">Home</a></li>
                <li><a <?php if($curpage=='about/index'||$curpage=='about/board'||$curpage=='about/executive'||$curpage=='about/structure'){?>class="active"<?php }?> 
                        href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>" title="About GSPA">About GSPA</a>
                    <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>">History</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>2)); ?>">Sign of GSPA</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>4)); ?>">Vision</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>5)); ?>">Mission</a></li>   
                            <li><a href="<?php echo Yii::app()->createUrl('about/executive'); ?>">Executive of GSPA</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about/structure'); ?>">Organization Structure</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about/board'); ?>">Teachers</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>6)); ?>">Map</a></li>
                    </ul>
                </li>
                <li><a <?php if($curpage=='announce/index'||$curpage=='announce/admission'||$curpage=='announce/job'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('announce'); ?>" title="Announcement" >Announcement</a>
                    <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('announce/admission'); ?>">Admission</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('announce/job'); ?>">Jobs</a></li>
                    </ul>
                </li>
                
                <li><a <?php if($curpage=='news/index'||$curpage=='news/media'||$curpage=='news/inside'||$curpage=='news/group'||$curpage=='news/groupMedia'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('news'); ?>" title="News & Activities" >News & Activities</a>
                    <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('news/inside'); ?>">GSPA News</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('news/media'); ?>">Media News</a></li>
                    </ul>
                </li>
                <li><a <?php if($curpage=='document/index'||$curpage=='document/type'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('document'); ?>" title="Download" >Download</a>                   
                    
                    <ul>
                        <?php
                            $criteria = new CDbCriteria();
                            $criteria->condition = 'status=:status AND doc_group =\'download\'';
                            $criteria->params=array(':status'=>1);
                            $criteria->order = 'sort_order';
                            $doc_type = DocumentType::model()->findAll($criteria);

                            foreach($doc_type as $type) {
                        ?>
                        <li><a href="<?php echo Yii::app()->createUrl('document/type', array('id'=>$type->doc_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
                        <?php }?>
                    </ul>
                </li>
               <li><a <?php if($curpage=='cooperation/index'||$curpage=='cooperation/inbound'||$curpage=='cooperation/outbound'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('cooperation/index'); ?>" title="Cooperation" >Cooperation</a>
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('cooperation/inbound'); ?>">Inbound</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('cooperation/outbound'); ?>">Outbound</a></li>
                    </ul>
                </li>
                <li><a <?php if($curpage=='organization/index'){?> class="active" <?php }?> href="#" title="Organization" >Organization</a>
                    <ul>
                        <?php
                            $criteria = new CDbCriteria();
                            $criteria->condition = 'status=:status';
                            $criteria->params=array(':status'=>1);
                            $criteria->order = 'sort_order';
                            $org = Organization::model()->findAll($criteria);

                            foreach($org as $or) {
                        ?>
                        <li><a href="<?php echo $or->link_en;?>" target="_blank"><?php echo $or->name_en;?></a></li>        
                        <?php }?>
                    </ul>
                </li>
<!--                <li><a <?php if($curpage=='site/contact'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('site/contact'); ?>"title="Contact Us" >Contact Us</a></li>-->
            <?php }else{?>
                <li><a <?php if($curpage=='site/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->request->baseUrl; ?>" title="หน้าแรก">หน้าแรก</a></li>
                <li><a <?php if($curpage=='about/index'||$curpage=='about/board'||$curpage=='about/executive'||$curpage=='about/structure'){?>class="active"<?php }?> 
                        href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>" title="เกี่ยวกับวิทยาลัย">เกี่ยวกับหน่วยงาน</a>
                    <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>">ความเป็นมา</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>2)); ?>">ตราสัญลักษณ์</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>4)); ?>">วิสัยทัศน์</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>5)); ?>">พันธกิจ</a></li>                            
                            <li><a href="<?php echo Yii::app()->createUrl('about/executive'); ?>">ทำเนียบผู้บริหาร</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about/structure'); ?>">โครงสร้างหน่วยงาน</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about/board'); ?>">คณาจารย์</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>6)); ?>">แผนที่วิทยาลัย</a></li> 
                    </ul>
                </li>
                <li><a <?php if($curpage=='announce/index'||$curpage=='announce/admission'||$curpage=='announce/job'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('announce'); ?>" title="ประกาศ" >ประกาศ</a>
                    <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('announce/admission'); ?>">สมัครเรียน</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('announce/job'); ?>">รับสมัครงาน</a></li>
                    </ul>
                </li>
                <li><a <?php if($curpage=='news/index'||$curpage=='news/media'||$curpage=='news/inside'||$curpage=='news/group'||$curpage=='news/groupMedia'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('news'); ?>" title="ประชาสัมพันธ์/กิจกรรม" >ประชาสัมพันธ์/กิจกรรม</a>
                    <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('news/inside'); ?>">ภายใน</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('news/media'); ?>">จากสื่อ</a></li>
                    </ul>
                </li>
                <li><a <?php if($curpage=='document/index'||$curpage=='document/type'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('document'); ?>" title="สื่อเผยแพร่/ดาวน์โหลด" >สื่อเผยแพร่/ดาวน์โหลด</a>                   
                    
                    <ul>
                        <?php
                            $criteria = new CDbCriteria();
                            $criteria->condition = 'status=:status AND doc_group =\'download\'';
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
               <li><a <?php if($curpage=='cooperation/index'||$curpage=='cooperation/inbound'||$curpage=='cooperation/outbound'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('cooperation/index'); ?>" title="ความร่วมมือ" >ความร่วมมือ</a>
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('cooperation/inbound'); ?>">ภายในประเทศ</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('cooperation/outbound'); ?>">ต่างประเทศ</a></li>
                    </ul>
                </li>
                <li><a <?php if($curpage=='organization/index'){?> class="active" <?php }?> href="#" title="Organization" >หน่วยงานภายใน</a>
                    <ul>
                        <?php
                            $criteria = new CDbCriteria();
                            $criteria->condition = 'status=:status';
                            $criteria->params=array(':status'=>1);
                            $criteria->order = 'sort_order';
                            $org = Organization::model()->findAll($criteria);

                            foreach($org as $or) {
                        ?>
                        <li><a href="<?php echo $or->link_th;?>" target="_blank"><?php echo $or->name_th;?></a></li>        
                        <?php }?>
                    </ul>
                </li>
<!--                <li><a <?php if($curpage=='site/contact'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('site/contact'); ?>"title="ติดต่อเรา" >ติดต่อเรา</a></li>-->
            
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
<?php
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $privacy = "Privacy Policy";
    $faq = "FAQ";
    $site_map = "Site Map";
    $service = "Service";
    $service_student = "Service for student";
    $service1 = "Download Documents";
    $service2 = "Library";
    $service_student1 = "Master's degree";
    $service_student2 = "Doctorate Degree";
    $service_student3 = "Evaluation of Teaching";
    $alumni ="Alumni";
    $knowledge = "Knowledge";
    $knowledge1 = "Knowledge Management";
    $knowledge2 = "Categories of Knowledge";
    $knowledge3 = "Documentary";
    $report = "Reports";

    
}else{ 
    $privacy = "นโยบายความเป็นส่วนตัว";
    $faq = "คำถามที่พบบ่อย";
    $site_map = "แผนที่เว็บไซต์";
    $service = "บริการ";
    $service_student = "บริการนิสิต";
    $service1 = "ดาวน์โหลดแบบฟอร์ม";
    $service2 = "ห้องสมุด";
    $service_student1 = "ปริญญาโท";
    $service_student2 = "ปริญาเอก";
    $service_student3 = "ประเมินการเรียนการสอน";
    $alumni ="ทำเนียบนิสิต";
    $knowledge = "คลังข้อมูลความรู้";
    $knowledge1 = "การจัดการความรู้";
    $knowledge2 = "หมวดความรู้";
    $knowledge3 = "สารคดี";
    $report = "รายงานผลการดำเนินงาน";
}
?>
<footer>
    <div class="main">
    <div class="wrapper border-bot2 margin-bot">
      <article class="fcol-1">
         <h3 class="color-1"><?php echo $service;?></h3>
          <ul class="list-3">
            <li><a href="<?php echo Yii::app()->createUrl('information/download'); ?>"><?php echo $service1;?></a></li>
	    <li><a href="<?php echo Yii::app()->createUrl('information/library'); ?>"><?php echo $service2;?></a></li>            
          </ul>
         <br/>
         <h3 class="color-1"><?php echo $service_student;?></h3>
         <ul class="list-3">
            <li><a href="<?php echo Yii::app()->createUrl('student/group1'); ?>"><?php echo $service_student1;?></a></li>
            <li><a href="<?php echo Yii::app()->createUrl('student/group2'); ?>"><?php echo $service_student2;?></a></li>
	    <li class="last-item"><a href="<?php echo Yii::app()->createUrl('student/group3'); ?>"><?php echo $service_student3;?></a></li>
            
          </ul>
      </article>
      <article class="fcol-2">
         <h3 class="color-1"><?php echo $alumni;?></h3>
          <ul class="list-3">
            <li><a href="<?php echo Yii::app()->createUrl('alumni/master'); ?>"><?php echo $service_student1;?></a></li>
	    <li><a href="<?php echo Yii::app()->createUrl('alumni/doctor'); ?>"><?php echo $service_student2;?></a></li>            
          </ul>
         <br/>
         <h3 class="color-1"><?php echo $knowledge;?></h3>
         <ul class="list-3">
            <li><a href="<?php echo Yii::app()->createUrl('knowledge/group1'); ?>"><?php echo $knowledge1;?></a></li>
            <li><a href="<?php echo Yii::app()->createUrl('knowledge/group2'); ?>"><?php echo $knowledge2;?></a></li>
	    <li class="last-item"><a href="<?php echo Yii::app()->createUrl('knowledge/group3'); ?>"><?php echo $knowledge3;?></a></li>            
          </ul>
      </article>
      <article class="fcol-3">
        <h3 class="color-1"><?php echo $report;?></h3>
        <ul class="list-3">
             <?php
                    $criteria = new CDbCriteria();
                    $criteria->condition = 'status=:status';
                    $criteria->params=array(':status'=>1);
                    $criteria->order = 'sort_order';
                    $report = ReportType::model()->findAll($criteria);
                    $count = -1;
                    foreach($report as $key=>$type) {
                    
                    if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                        $name = $type->name_en;
                    }else{
                        $name = $type->name_th;
                    }
                ?>
                    <li><a href="<?php echo Yii::app()->createUrl('report', array('type_id'=>$type->report_type_id)); ?>"><?php echo $name;?></a></li>        
                <?php }?>
        </ul>
      </article>
    </div>
<!--        <ul class="list-services">
            <li><a href="#">Facebook</a></li>
            <li class="last-item"><a class="it-2" href="#">Twitter</a></li>
        </ul>-->
        <div style="clear:both"></div>
        <div style="color:#FFFFFF;float:left;width: 550px;">
            <div style="float:left;margin-left:1px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/logo2.png" alt="" border="0" height="65" /></div>
            <div style="margin-left:70px;"><?php echo nl2br($footer_text);?></div>
        </div>
       <div style="margin-bottom: 10px;float: right;">
            
            <a class="yellow" href="<?php echo Yii::app()->createUrl('site/contact'); ?>"><?php echo $contact_us;?> |</a>
            <a class="yellow" href="<?php echo Yii::app()->createUrl('site/privacy'); ?>"><?php echo $privacy;?> |</a>            
            <a class="yellow" href="<?php echo Yii::app()->createUrl('site/faq'); ?>"><?php echo $faq;?> |</a> 
            <a class="yellow" href="<?php echo Yii::app()->createUrl('site/sitemap'); ?>"><?php echo $site_map;?></a>
        </div>
        <div style="clear:both"></div>

  </div>
</footer>

</body>
</html>