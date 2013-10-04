<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="th">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
   <title><?php echo CHtml::encode($this->pageTitle); ?></title>
   <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" />
   <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/reset.css" type="text/css" media="screen">
   <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/style_new.css" type="text/css" media="screen">
   <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/style_old.css" type="text/css" media="screen">

   <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/vslides.css" media="screen"/>
   <!--script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.3.min.js" type="text/javascript"></script-->


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
    $admission = "Admission";

    
}else{ 
    $privacy = "นโยบายความเป็นส่วนตัว";
    $faq = "คำถามที่พบบ่อย";
    $site_map = "แผนที่เว็บไซต์";
    $service = "บริการ";
    $service_student = "บริการนิสิต";
    $service1 = "ดาวน์โหลดแบบฟอร์ม";
    $service2 = "ห้องสมุด";
    $service_student1 = "ปริญญาโท";
    $service_student2 = "ปริญญาเอก";
    $service_student3 = "ประเมินการเรียนการสอน";
    $knowledge = "การจัดการความรู้";
    $knowledge1 = "การจัดการความรู้";
    $knowledge2 = "หมวดความรู้";
    $knowledge3 = "สารคดี";
    $report = "รายงานผลการดำเนินงาน";
    $admission = "สมัครเรียน";
}
?>
<body><!-- HEADER -->
   <div id="vanderbilt">
      <div id="header">
         <div class="container">
            <div class="vulogo">
               <h1>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>" title="<?php echo $h1_text;?>"><h1 class="<?php echo $css_class;?>"><?php echo $h1_text;?></h1></a>          
               </h1>
            </div>
            <div id="tools">
                <div id="searchme" class="roundbtm">
                  <form action="<?php echo Yii::app()->createUrl('site/search'); ?>" method="GET">
                     <input class="searchbox" type="text" name="q" maxlength="256" placeholder="<?php echo $search_text;?>..."  />                     
                     <input class="searchbtn" name="go"  id="go" tabindex="2" type="submit" value="GO"/>
                  </form>
                </div>
                <div class="clear"></div>
                <div class="lang" id="lang" style="z-index: 10000">
                    <a title="ภาษาไทย" href="<?php echo Yii::app()->UrlManager->createLanguageUrl('th');?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/flag_th.png" alt="Thai" border="0" /></a>
                    <a title="English" href="<?php echo Yii::app()->UrlManager->createLanguageUrl('en');?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/flag_en.png" alt="English" border="0" /></a>
                </div>
                <div class="clear"></div>
            </div>
         </div>
      </div><!-- /header -->
      <div id="nav">
         <div class="container">
            <?php if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?>
            <ul id="vunav">
               <li><a <?php if($curpage=='site/index'|| $curpage=='site/home'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('site/home'); ?>" title="Home">Home</a></li>
               <li class="about">
                  <a <?php if($curpage=='about/index'||$curpage=='about/board'||$curpage=='about/executive'||$curpage=='about/structure'||$curpage=='cooperation/index'||$curpage=='about/personnel'){?>class="active"<?php }?> 
                        href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>" title="About GSPA">About GSPA</a>
                  <div>
                     <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>">History of GSPA</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>2)); ?>">Sign of GSPA</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>4)); ?>">Vision</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>5)); ?>">Mission</a></li> 
                            <li><a href="<?php echo Yii::app()->createUrl('about/board'); ?>">Board</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about/executive'); ?>">Executive of GSPA</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about/structure'); ?>">Organization Structure</a></li>                            
                            <li><a href="<?php echo Yii::app()->createUrl('about/personnel'); ?>">Personnel</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('cooperation/index'); ?>">Cooperation</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('report'); ?>">Report</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('knowledge'); ?>">Knowledge</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>6)); ?>">Map</a></li>
                     </ul>
                  </div>
               </li>
               <li class="about">
                  <a <?php if($curpage=='program/index'||$curpage=='program/admission'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('program'); ?>" title="Programs">Programs</a>
                  <div>
                     <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('program/doctor'); ?>">Doctorate Degree Programs</a></li>          
                            <li><a href="<?php echo Yii::app()->createUrl('program/master'); ?>">Master's Degree Programs</a></li>           
                    
                     </ul>
                  </div>
               </li>
               <li class="about">
                  <a <?php if($curpage=='student/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('student'); ?>"><?php echo $service_student;?></a>
                  <div>
                     <ul>
                        <?php
                            $criteria = new CDbCriteria();
                            $criteria->order = 'sort_order';
                            $ServiceGroup = StudentServiceGroup::model()->findAll($criteria);        
                            foreach($ServiceGroup as $group) {
                        ?>
                        <li><a href="<?php echo Yii::app()->createUrl('student', array('group'=>$group->ser_group)); ?>"><?php echo $group->ser_name_en;?></a></li>        
                        <?php }?>
                     </ul>                     
                  </div>
               </li>
               <li class="download">
                  <a <?php if($curpage=='news/index'||$curpage=='news/media'||$curpage=='news/inside'||$curpage=='news/group'||$curpage=='news/groupMedia'||$curpage=='event/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('news'); ?>" title="News & Activities" >News & Activities</a>
                  <div>
                     <ul>
                        <?php
                            $criteria = new CDbCriteria();
                            $criteria->select = '*';
                            $criteria->condition = '(news_type_id <> 2 AND news_type_id <> 3)';
                            $criteria->order = 'sort_order';
                            $NewsType = NewsType::model()->findAll($criteria);        
                            foreach($NewsType as $group) {
                        ?>
                        <li><a href="<?php echo Yii::app()->createUrl('news', array('type_id'=>$group->news_type_id)); ?>"><?php echo $group->name_en;?></a></li>        
                        <?php }?>
                    </ul>                            
                  </div>
               </li>
               <li class="download">
                  <a <?php if($curpage=='document/index'||$curpage=='document/type'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('document'); ?>" title="Download" >Download</a>   
                  <div>
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
                  </div>
               </li>
               <li class="organize">
                  <a <?php if($curpage=='organization/index'){?> class="active" <?php }?> href="#" title="Organization" >Organization</a>
                  <div>
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
                  </div>
               </li>
               <li class="admissions last">
                   <a <?php if($curpage=='information/index' || $curpage=='admission/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('information'); ?>"><?php echo $admission;?></a>
                   <div> 
                    <ul>
                        <?php
                            $criteria = new CDbCriteria();
                            $criteria->condition = 'status=:status AND doc_group=\'service\'';
                            $criteria->params=array(':status'=>1,);
                            $criteria->order = 'sort_order';
                            $doc_type = DocumentType::model()->findAll($criteria);

                            foreach($doc_type as $type) {

                        ?>
                        <li><a href="<?php echo Yii::app()->createUrl('information',array('type_id'=>$type->doc_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
                        <?php }?>
                        <!--li><a href="<?php echo Yii::app()->createUrl('admission'); ?>">Online Admission</a-->
                    </ul>
                   </div>
                </li>
            </ul>             
            <?php }else{ ?>
          <ul id="vunav">
               <li><a <?php if($curpage=='site/index'||$curpage=='site/home'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('site/home'); ?>" title="หน้าแรก">หน้าแรก</a></li>
               <li class="about">
                  <a <?php if($curpage=='about/index'||$curpage=='about/board'||$curpage=='about/executive'||$curpage=='about/structure'||$curpage=='about/personnel'||$curpage=='report/index'||$curpage=='knowledge/index'){?>class="active"<?php }?> 
                        href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>" title="เกี่ยวกับวิทยาลัย">เกี่ยวกับหน่วยงาน</a>
                  <div>
                     <ul>                            
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>">ความเป็นมา</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>2)); ?>">ตราสัญลักษณ์</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>4)); ?>">วิสัยทัศน์</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>5)); ?>">พันธกิจ</a></li>                            
                            <li><a href="<?php echo Yii::app()->createUrl('about/board'); ?>">คณะกรรมการ</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about/executive'); ?>">ทำเนียบผู้บริหาร</a></li>                            
                            <li><a href="<?php echo Yii::app()->createUrl('about/structure'); ?>">โครงสร้างหน่วยงาน</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about/personnel'); ?>">บุคลากร</a></li>                            
                            <li><a href="<?php echo Yii::app()->createUrl('cooperation/index'); ?>">ความร่วมมือ</a></li>                            
                            <li><a href="<?php echo Yii::app()->createUrl('report'); ?>">การประกันคุณภาพการศึกษา</a></li>                            
                            <li><a href="<?php echo Yii::app()->createUrl('knowledge'); ?>">การจัดการความรู้</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>6)); ?>">แผนที่วิทยาลัย</a></li> 
                     </ul>
                  </div>
               </li>
               <li class="about">
                  <a <?php if($curpage=='program/index'||$curpage=='program/admission'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('program'); ?>" title="หลักสูตร">หลักสูตรที่เปิดสอน</a>
                  <div>
                     <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('program/doctor'); ?>">หลักสูตรปริญญาเอก</a></li>          
                            <li><a href="<?php echo Yii::app()->createUrl('program/master'); ?>">หลักสูตรปริญญาโท</a></li>           
                     </ul>
                  </div>
               </li>
               <li class="about">
                  <a <?php if($curpage=='student/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('student'); ?>"><?php echo $service_student;?></a>
                  <div>
                      <ul>
                        <?php
                            $criteria = new CDbCriteria();
                            $criteria->order = 'sort_order';
                            $ServiceGroup = StudentServiceGroup::model()->findAll($criteria);        
                            foreach($ServiceGroup as $group) {
                        ?>
                        <li><a href="<?php echo Yii::app()->createUrl('student', array('group'=>$group->ser_group)); ?>"><?php echo $group->ser_name;?></a></li>        
                        <?php }?>
                    </ul>                     
                  </div>
               </li>
               <li class="download">
                  <a <?php if($curpage=='news/index'||$curpage=='news/media'||$curpage=='news/inside'||$curpage=='news/group'||$curpage=='news/groupMedia'||$curpage=='event/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('news'); ?>" title="ประชาสัมพันธ์" >ประชาสัมพันธ์</a>
                  <div>
                     <ul>
                        <?php
                            $criteria = new CDbCriteria();
                            $criteria->select = '*';
                            $criteria->condition = '(news_type_id <> 2 AND news_type_id <> 3)';
                            $criteria->order = 'sort_order';
                            $NewsType = NewsType::model()->findAll($criteria);        
                            foreach($NewsType as $group) {
                        ?>
                        <li><a href="<?php echo Yii::app()->createUrl('news', array('type_id'=>$group->news_type_id)); ?>"><?php echo $group->name_th;?></a></li>        
                        <?php }?>
                    </ul>                        
                  </div>
               </li>
               <li class="download">
                  <a <?php if($curpage=='document/index'||$curpage=='document/type'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('document'); ?>" title="สื่อเผยแพร่" >สื่อเผยแพร่</a> 
                  <div>
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
                  </div>
               </li>
               <li class="organize_th">
                  <a <?php if($curpage=='organization/index'){?> class="active" <?php }?> href="#" title="Organization" >หน่วยงานภายใน</a>
                  <div>
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
                  </div>
               </li>
               <li class="admissions_th last">
                   <a <?php if($curpage=='information/index' || $curpage=='admission/index'){?> class="active" <?php }?> href="<?php echo Yii::app()->createUrl('information'); ?>"><?php echo $admission;?></a>
                   <div> 
                    <ul>
                        <?php
                            $criteria = new CDbCriteria();
                            $criteria->condition = 'status=:status AND doc_group=\'service\'';
                            $criteria->params=array(':status'=>1,);
                            $criteria->order = 'sort_order';
                            $doc_type = DocumentType::model()->findAll($criteria);

                            foreach($doc_type as $type) {

                        ?>
                        <li><a href="<?php echo Yii::app()->createUrl('information',array('type_id'=>$type->doc_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
                        <?php }?>
                        <!--li><a href="<?php echo Yii::app()->createUrl('admission'); ?>">Online Admission</a-->
                    </ul>
                   </div>
                </li>
            </ul>                 
            <?php }?>
            
            
        </div>
</div><!-- /nav -->
<!-- END HEADER -->
<!--==============================content================================-->
<?php echo $content;?>
<!--==============================footer=================================-->
        <!-- FOOTER -->
         <div id="navsec">
         <div class="container">
            <ul style="float:right">
               <li>
                  <a href="<?php echo Yii::app()->createUrl('site/contact'); ?>"><?php echo $contact_us;?></a>
               </li>
               <li>
                  <a href="<?php echo Yii::app()->createUrl('site/privacy'); ?>"><?php echo $privacy;?></a>            
               </li>
               <li>
                   <a href="<?php echo Yii::app()->createUrl('site/faq'); ?>"><?php echo $faq;?></a> 
               </li>
               <li>
                  <a class="last" href="<?php echo Yii::app()->createUrl('site/sitemap'); ?>"><?php echo $site_map;?></a>
               </li>
             
            </ul>
         </div>
      </div><!-- the footer code --><div id="footer">
         <div class="container">
<div class="footgroup">

<div id="yourvu" class="round">
    <h4 style="margin:0 0 5px 0"><?php echo $h1_text;?></h4>
    <div style="margin-left:0px;font-size:12px;line-height: 1.5em;"><?php echo nl2br($footer_text);?></div>	                                   
</div>

<div id="social" style="margin: 0; padding: 0;  width: 400px;">	
<h4 style="margin:0 10px 5px 0">Follow us on</h4>
    <ul>
        <li id="socialfacebook">
           <a target="_blank" href="#"></a>
        </li>
        <li id="socialtwitter">
           <a target="_blank" href="#"></a>
        </li>
    </ul>

<p><a style="border: 0;" href="#">Copyright &copy;</a> 2013 Graduate School of Public Administration.<br/>All rights reserved.</a></p>

</div>

</div><!-- /footgroup -->
</div>
      </div><!-- /footer --></div>
</body></html>