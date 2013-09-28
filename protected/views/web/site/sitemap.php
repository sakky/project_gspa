<?php
/* @var $this SiteController */
Yii::app()->counter->refresh();
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle="Graduate School of Public Administration - Site Map";
    $header = "Site Map";
    $this->breadcrumbs=array(
            'Site Map',
    );
}else{
    $this->pageTitle=Yii::app()->name. ' - แผนที่เว็บไซต์';
    $header = "แผนที่เว็บไซต์"; 
    $this->breadcrumbs=array(
            'แผนที่เว็บไซต์',
    );
}
?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.4.4.min.js"></script>
<div id="page3">
<section id="content">
  <div class="main">
    <div class="wrapper">

      <article>
          <div style="margin-bottom: 10px;">
            <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links'=>$this->breadcrumbs,
                    )); ?><!-- breadcrumbs -->
            <?php endif?>
          </div>
         <h3><?php echo $header;?></h3>
         <ul id="navmenu" class="tree_menu"  >
         <?php if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){?>
             	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>">Home</a></li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>">About GSPA</a>
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
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('program'); ?>" title="Programs">Programs</a>
                     <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('program/doctor'); ?>">Doctorate Degree Programs</a></li>          
                            <li><a href="<?php echo Yii::app()->createUrl('program/master'); ?>">Master's Degree Programs</a></li>           
                    
                     </ul>
               </li>
               <li class="submenu">
                  <a href="<?php echo Yii::app()->createUrl('student'); ?>">Service for Student</a>
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
               </li> 
               <li class="submenu">
                  <a href="<?php echo Yii::app()->createUrl('news'); ?>" title="News & Activities" >News & Activities</a>
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
               <li class="submenu">
                  <a href="<?php echo Yii::app()->createUrl('document'); ?>" title="Download" >Download</a>   
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
               <li class="submenu">
                  <a  href="#" title="Organization" >Organization</a>
                  <div>
                     <ul>
                        <?php

                            foreach($org as $or) {
                        ?>
                        <li><a href="<?php echo $or->link_en;?>" target="_blank"><?php echo $or->name_en;?></a></li>        
                        <?php }?>
                    </ul>
                  </div>
               </li>
               <li class="submenu">
                   <a href="<?php echo Yii::app()->createUrl('information'); ?>">Admission</a>
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
                </li>


                <li class="submenu">Links
                    <ul>
                        <?php foreach ($links as $key=>$value){?>      
                        <li><a target="_blank" href="<?php echo $value->link_en;?>"><?php echo $value->name_en;?></a></li>
                        <?php }?>
                    </ul>
                </li>
                <li><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>">Contact Us</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('site/privacy'); ?>">Privacy Policy</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('site/faq'); ?>">FAQ</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('site/sitemap'); ?>">Site Map</a></li>
             
         <?php }else{?>
		<li><a href="<?php echo Yii::app()->request->baseUrl; ?>">หน้าแรก</a></li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>">เกี่ยวกับหน่วยงาน</a>
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
                </li>
                <li class="submenu">
                  <a href="<?php echo Yii::app()->createUrl('program'); ?>" title="หลักสูตรที่เปิดสอน">หลักสูตรที่เปิดสอน</a>
                     <ul>
                            <li><a href="<?php echo Yii::app()->createUrl('program/doctor'); ?>">หลักสูตรปริญญาเอก</a></li>          
                            <li><a href="<?php echo Yii::app()->createUrl('program/master'); ?>">หลักสูตรปริญญาโท</a></li>      
                    
                     </ul>
               </li>
               <li class="submenu">
                  <a href="<?php echo Yii::app()->createUrl('student'); ?>">บริการนิสิต</a>
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
               <li class="submenu">
                  <a href="<?php echo Yii::app()->createUrl('news'); ?>" title="ประชาสัมพันธ์" >ประชาสัมพันธ์</a>
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
               <li class="submenu">
                  <a href="<?php echo Yii::app()->createUrl('document'); ?>" title="สื่อเผยแพร่" >สื่อเผยแพร่</a> 
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
               <li class="submenu">
                  <a href="#" title="Organization" >หน่วยงานภายใน</a>
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
               <li class="submenu">
                   <a href="<?php echo Yii::app()->createUrl('information'); ?>">สมัครเรียน</a>
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
                <li class="submenu">ลิงค์ที่เกี่ยวข้อง
                    <ul>
                        <?php foreach ($links as $key=>$value){?>      
                        <li><a target="_blank" href="<?php echo $value->link_th;?>"><?php echo $value->name_th;?></a></li>
                        <?php }?>
                    </ul>
                </li>
                <li><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>">ติดต่อเรา</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('site/privacy'); ?>">นโยบายความเป็นส่วนตัว</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('site/faq'); ?>">คำถามที่พบบ่อย</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('site/sitemap'); ?>">แผนที่เว็บไซต์</a></li>
	
         <?php }?>
        </ul>
      </article>
    </div>
  </div>
</section>
</div>