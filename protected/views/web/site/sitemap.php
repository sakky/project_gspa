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
                <li class="submenu">About GSPA
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>1)); ?>">History of GSPA</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>2)); ?>">Sign of GSPA</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>4)); ?>">Vision</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>5)); ?>">Mission</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('about/executive'); ?>">Executive of GSPA</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('about/structure'); ?>">Organization Structure</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('about/board'); ?>">Teachers</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('about', array('id'=>6)); ?>">Map</a></li>
                    </ul>
                </li>
		<li class="submenu"><a href="<?php echo Yii::app()->createUrl('announce'); ?>">Announcement</a>
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('announce/admission'); ?>">Admission</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('announce/job'); ?>">Jobs</a></li>
                    </ul>
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('news'); ?>">News & Activities</a>
                    <ul>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('news/inside'); ?>">GSPA News</a>
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status=:status AND news_type_id=5';
                                    $criteria->params=array(':status'=>1);
                                    $criteria->order = 'sort_order';
                                    $news_type = NewsGroup::model()->findAll($criteria);

                                    foreach($news_type as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('news/group', array('id'=>$type->news_group_id)); ?>"><?php echo $type->name_en;?></a></li>        
                                <?php }?>                                                                
                            </ul>
                        </li>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('news/media'); ?>">Media News</a>
                            <ul>
                                <?php
                                    $criteria2 = new CDbCriteria();
                                    $criteria2->condition = 'status=:status AND news_type_id=1';
                                    $criteria2->params=array(':status'=>1);
                                    $criteria2->order = 'sort_order';
                                    $news_group = NewsGroup::model()->findAll($criteria2);

                                    foreach($news_group as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('news/groupMedia', array('id'=>$type->news_group_id)); ?>"><?php echo $type->name_en;?></a></li>        
                                <?php }?>                                
                            </ul>
                        </li>
                    </ul>                
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('document'); ?>">Download</a>
                    <ul>
                        <?php
                         foreach($doc as $key=>$type) {
                        ?>
                        <li><a href="<?php echo Yii::app()->createUrl('document/type', array('id'=>$type->doc_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
                        <?php }?>
                    </ul>                
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('cooperation'); ?>">Cooperation</a>
                    <ul>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('cooperation/inbound'); ?>">Domestic</a>
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status=:status AND t.group=:group';
                                    $criteria->params=array(':status'=>1,':group'=>'inbound');
                                    $criteria->order = 'sort_order';
                                    $co_type = CooperationType::model()->findAll($criteria);

                                    foreach($co_type as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('cooperation',array('type_id'=>$type->co_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
                                <?php }?>
                            </ul>
                        </li>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('cooperation/outbound'); ?>">International</a>
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status=:status AND t.group=:group';
                                    $criteria->params=array(':status'=>1,':group'=>'outbound');
                                    $criteria->order = 'sort_order';
                                    $co_type = CooperationType::model()->findAll($criteria);

                                    foreach($co_type as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('cooperation',array('type_id'=>$type->co_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
                                <?php }?>
                            </ul>
                        </li>
                    </ul>                  
                </li>
                <li class="submenu">Organization
                    <ul>
                        <?php
                         foreach($org as $key=>$type) {
                        ?>
                        <li><a href="<?php echo $type->link_en;?>" target="_blank"><?php echo $type->name_en;?></a></li>        
                        <?php }?>
                    </ul>
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('information'); ?>">Service</a>
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('information/download'); ?>">Download Documents</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('information/library'); ?>">Library</a></li>
                    </ul>
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('student'); ?>">Service for student</a>
                    <ul>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('student/group1'); ?>">Master's degree</a>
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status = 1 AND ser_group=1'; 
                                    $criteria->order = 'sort_order';
                                    $co_type = StudentServiceType::model()->findAll($criteria);

                                    foreach($co_type as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('student',array('type_id'=>$type->ser_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
                                <?php }?>                                
                            </ul>
                        </li>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('student/group1'); ?>">Doctorate Degree</a>
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status = 1 AND ser_group=2'; 
                                    $criteria->order = 'sort_order';
                                    $co_type = StudentServiceType::model()->findAll($criteria);

                                    foreach($co_type as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('student',array('type_id'=>$type->ser_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
                                <?php }?>                                
                            </ul>                        
                        </li>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('student/group3'); ?>">Evaluation of Teaching</a>
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status = 1 AND ser_group=3'; 
                                    $criteria->order = 'sort_order';
                                    $co_type = StudentServiceType::model()->findAll($criteria);

                                    foreach($co_type as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('student',array('type_id'=>$type->ser_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
                                <?php }?>                                
                            </ul>                        
                        </li>
                    </ul>
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('alumni'); ?>">Alumni</a>
                    <ul>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('alumni/master'); ?>">Master's degree</a>
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status = 1 AND alumni_group=\'Master\''; 
                                    $criteria->order = 'sort_order';
                                    $co_type = AlumniNo::model()->findAll($criteria);
                                    foreach($co_type as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('alumni',array('type_id'=>$type->alumni_no_id)); ?>"><?php echo $type->name_en;?></a></li>        
                                <?php }?>
                            </ul>
                        </li>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('alumni/doctor'); ?>">Doctorate Degree</a>
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status = 1 AND alumni_group=\'Doctor\''; 
                                    $criteria->order = 'sort_order';
                                    $co_type = AlumniNo::model()->findAll($criteria);
                                    foreach($co_type as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('alumni',array('type_id'=>$type->alumni_no_id)); ?>"><?php echo $type->name_en;?></a></li>        
                                <?php }?>
                            </ul>                        
                        </li>
                    </ul>
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('knowledge'); ?>">Knowledge</a>
                    <ul>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('knowledge/group1'); ?>">Knowledge Management</a>
                            <ul>
                                <?php
                                   $criteria = new CDbCriteria();
                                   $criteria->condition = 'status=:status AND know_group =1';
                                   $criteria->params=array(':status'=>1);
                                   $criteria->order = 'sort_order';
                                   $co_type = KnowledgeType::model()->findAll($criteria);

                                   foreach($co_type as $type) {
                               ?>
                               <li><a href="<?php echo Yii::app()->createUrl('knowledge',array('type_id'=>$type->know_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
                               <?php }?>                                
                            </ul>
                        </li>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('knowledge/group2'); ?>">Categories of Knowledge</a>
                            <ul>
                                <?php
                                   $criteria = new CDbCriteria();
                                   $criteria->condition = 'status=:status AND know_group =2';
                                   $criteria->params=array(':status'=>1);
                                   $criteria->order = 'sort_order';
                                   $co_type = KnowledgeType::model()->findAll($criteria);

                                   foreach($co_type as $type) {
                               ?>
                               <li><a href="<?php echo Yii::app()->createUrl('knowledge',array('type_id'=>$type->know_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
                               <?php }?>                                
                            </ul>
                        </li>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('knowledge/group3'); ?>">Documentary</a>
                            <ul>
                                <?php
                                   $criteria = new CDbCriteria();
                                   $criteria->condition = 'status=:status AND know_group =3';
                                   $criteria->params=array(':status'=>1);
                                   $criteria->order = 'sort_order';
                                   $co_type = KnowledgeType::model()->findAll($criteria);

                                   foreach($co_type as $type) {
                               ?>
                               <li><a href="<?php echo Yii::app()->createUrl('knowledge',array('type_id'=>$type->know_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
                               <?php }?>                                
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('report'); ?>">Reports</a>
                    <ul>
                        <?php
                         foreach($report as $key=>$type) {
                        ?>
                        <li><a href="<?php echo Yii::app()->createUrl('report', array('type_id'=>$type->report_type_id)); ?>"><?php echo $type->name_en;?></a></li>        
                        <?php }?>
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
                <li class="submenu">เกี่ยวกับหน่วยงาน
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
		<li class="submenu"><a href="<?php echo Yii::app()->createUrl('announce'); ?>">ประกาศ</a>
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('announce/admission'); ?>">ประกาศวิชาการ</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('announce/job'); ?>">รับสมัครงาน</a></li>
                    </ul>
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('news'); ?>">ประชาสัมพันธ์/กิจกรรม</a>
                    <ul>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('news/inside'); ?>">ภายใน</a>
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status=:status AND news_type_id=5';
                                    $criteria->params=array(':status'=>1);
                                    $criteria->order = 'sort_order';
                                    $news_type = NewsGroup::model()->findAll($criteria);

                                    foreach($news_type as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('news/group', array('id'=>$type->news_group_id)); ?>"><?php echo $type->name_th;?></a></li>        
                                <?php }?>                                                                
                            </ul>
                        </li>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('news/media'); ?>">จากสื่อ</a>
                            <ul>
                                <?php
                                    $criteria2 = new CDbCriteria();
                                    $criteria2->condition = 'status=:status AND news_type_id=1';
                                    $criteria2->params=array(':status'=>1);
                                    $criteria2->order = 'sort_order';
                                    $news_group = NewsGroup::model()->findAll($criteria2);

                                    foreach($news_group as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('news/groupMedia', array('id'=>$type->news_group_id)); ?>"><?php echo $type->name_th;?></a></li>        
                                <?php }?>                                
                            </ul>
                        </li>
                    </ul>                
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('document'); ?>">สื่อเผยแพร่/ดาวน์โหลด</a>
                    <ul>
                        <?php
                         foreach($doc as $key=>$type) {
                        ?>
                        <li><a href="<?php echo Yii::app()->createUrl('document/type', array('id'=>$type->doc_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
                        <?php }?>
                    </ul>                
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('cooperation'); ?>">ความร่วมมือ</a>
                    <ul>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('cooperation/inbound'); ?>">ภายในประเทศ</a>
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status=:status AND t.group=:group';
                                    $criteria->params=array(':status'=>1,':group'=>'inbound');
                                    $criteria->order = 'sort_order';
                                    $co_type = CooperationType::model()->findAll($criteria);

                                    foreach($co_type as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('cooperation',array('type_id'=>$type->co_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
                                <?php }?>
                            </ul>
                        </li>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('cooperation/outbound'); ?>">ต่างประเทศ</a>
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status=:status AND t.group=:group';
                                    $criteria->params=array(':status'=>1,':group'=>'outbound');
                                    $criteria->order = 'sort_order';
                                    $co_type = CooperationType::model()->findAll($criteria);

                                    foreach($co_type as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('cooperation',array('type_id'=>$type->co_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
                                <?php }?>
                            </ul>
                        </li>
                    </ul>                  
                </li>
                <li class="submenu">หน่วยงานภายใน
                    <ul>
                        <?php
                         foreach($org as $key=>$type) {
                        ?>
                        <li><a href="<?php echo $type->link_th;?>" target="_blank"><?php echo $type->name_th;?></a></li>        
                        <?php }?>
                    </ul>
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('information'); ?>">บริการ</a>
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('information/download'); ?>">ดาวน์โหลดแบบฟอร์ม</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('information/library'); ?>">ห้องสมุด</a></li>
                    </ul>
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('student'); ?>">บริการนิสิต</a>
                    <ul>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('student/group1'); ?>">ปริญญาโท</a>
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status = 1 AND ser_group=1'; 
                                    $criteria->order = 'sort_order';
                                    $co_type = StudentServiceType::model()->findAll($criteria);

                                    foreach($co_type as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('student',array('type_id'=>$type->ser_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
                                <?php }?>                                
                            </ul>
                        </li>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('student/group1'); ?>">ปริญญาเอก</a>
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status = 1 AND ser_group=2'; 
                                    $criteria->order = 'sort_order';
                                    $co_type = StudentServiceType::model()->findAll($criteria);

                                    foreach($co_type as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('student',array('type_id'=>$type->ser_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
                                <?php }?>                                
                            </ul>                        
                        </li>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('student/group3'); ?>">ประเมินการเรียนการสอน</a>
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status = 1 AND ser_group=3'; 
                                    $criteria->order = 'sort_order';
                                    $co_type = StudentServiceType::model()->findAll($criteria);

                                    foreach($co_type as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('student',array('type_id'=>$type->ser_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
                                <?php }?>                                
                            </ul>                        
                        </li>
                    </ul>
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('alumni'); ?>">ทำเนียบนิสิต</a>
                    <ul>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('alumni/master'); ?>">ปริญญาโท</a>
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status = 1 AND alumni_group=\'Master\''; 
                                    $criteria->order = 'sort_order';
                                    $co_type = AlumniNo::model()->findAll($criteria);
                                    foreach($co_type as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('alumni',array('type_id'=>$type->alumni_no_id)); ?>"><?php echo $type->name_th;?></a></li>        
                                <?php }?>
                            </ul>
                        </li>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('alumni/doctor'); ?>">ปริญญาเอก</a>
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status = 1 AND alumni_group=\'Doctor\''; 
                                    $criteria->order = 'sort_order';
                                    $co_type = AlumniNo::model()->findAll($criteria);
                                    foreach($co_type as $type) {
                                ?>
                                <li><a href="<?php echo Yii::app()->createUrl('alumni',array('type_id'=>$type->alumni_no_id)); ?>"><?php echo $type->name_th;?></a></li>        
                                <?php }?>
                            </ul>                        
                        </li>
                    </ul>
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('knowledge'); ?>">การจัดการความรู้</a>
                    <ul>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('knowledge/group1'); ?>">การจัดการความรู้</a>
                            <ul>
                                <?php
                                   $criteria = new CDbCriteria();
                                   $criteria->condition = 'status=:status AND know_group =1';
                                   $criteria->params=array(':status'=>1);
                                   $criteria->order = 'sort_order';
                                   $co_type = KnowledgeType::model()->findAll($criteria);

                                   foreach($co_type as $type) {
                               ?>
                               <li><a href="<?php echo Yii::app()->createUrl('knowledge',array('type_id'=>$type->know_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
                               <?php }?>                                
                            </ul>
                        </li>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('knowledge/group2'); ?>">หมวดความรู้</a>
                            <ul>
                                <?php
                                   $criteria = new CDbCriteria();
                                   $criteria->condition = 'status=:status AND know_group =2';
                                   $criteria->params=array(':status'=>1);
                                   $criteria->order = 'sort_order';
                                   $co_type = KnowledgeType::model()->findAll($criteria);

                                   foreach($co_type as $type) {
                               ?>
                               <li><a href="<?php echo Yii::app()->createUrl('knowledge',array('type_id'=>$type->know_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
                               <?php }?>                                
                            </ul>
                        </li>
                        <li class="submenu"><a href="<?php echo Yii::app()->createUrl('knowledge/group3'); ?>">สารคดี</a>
                            <ul>
                                <?php
                                   $criteria = new CDbCriteria();
                                   $criteria->condition = 'status=:status AND know_group =3';
                                   $criteria->params=array(':status'=>1);
                                   $criteria->order = 'sort_order';
                                   $co_type = KnowledgeType::model()->findAll($criteria);

                                   foreach($co_type as $type) {
                               ?>
                               <li><a href="<?php echo Yii::app()->createUrl('knowledge',array('type_id'=>$type->know_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
                               <?php }?>                                
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu"><a href="<?php echo Yii::app()->createUrl('report'); ?>">การประกันคุณภาพการศึกษา</a>
                    <ul>
                        <?php
                         foreach($report as $key=>$type) {
                        ?>
                        <li><a href="<?php echo Yii::app()->createUrl('report', array('type_id'=>$type->report_type_id)); ?>"><?php echo $type->name_th;?></a></li>        
                        <?php }?>
                    </ul>
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