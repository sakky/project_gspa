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

<section id="content">
  <div class="main">
    <div class="wrapper">

      <article class="col-left">
          <div style="margin-bottom: 10px;">
            <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links'=>$this->breadcrumbs,
                    )); ?><!-- breadcrumbs -->
            <?php endif?>
          </div>
         <h3><?php echo $header;?></h3>
         <ul id="navmenu" class="tree_menu"  >
		<li>หน้าแรก</li>
                <li class="submenu">เกี่ยวกับหน่วยงาน
                    <ul>
                        <li>ความเป็นมา</li>
                        <li>ตราสัญลักษณ์</li>
                        <li>วิสัยทัศน์</li>
                        <li>พันธกิจ</li>
                        <li>ทำเนียบผู้บริหาร</li>
                        <li>โครงสร้างหน่วยงาน</li>
                        <li>คณาจารย์</li>
                        <li>แผนที่วิทยาลัย</li>
                    </ul>
                </li>
		<li class="submenu">ประกาศ
                    <ul>
                        <li>สมัครเรียน</li>
                        <li>รับสมัครงาน</li>
                    </ul>
                </li>
                <li class="submenu">ประชาสัมพันธ์/กิจกรรม
                    <ul>
                        <li class="submenu">ภายใน
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status=:status AND news_type_id=5';
                                    $criteria->params=array(':status'=>1);
                                    $criteria->order = 'sort_order';
                                    $news_type = NewsGroup::model()->findAll($criteria);

                                    foreach($news_type as $type) {
                                ?>
                                <li><?php echo $type->name_th;?></li>        
                                <?php }?>                                                                
                            </ul>
                        </li>
                        <li class="submenu">จากสื่อ
                            <ul>
                                <?php
                                    $criteria2 = new CDbCriteria();
                                    $criteria2->condition = 'status=:status AND news_type_id=1';
                                    $criteria2->params=array(':status'=>1);
                                    $criteria2->order = 'sort_order';
                                    $news_group = NewsGroup::model()->findAll($criteria2);

                                    foreach($news_group as $type) {
                                ?>
                                <li><?php echo $type->name_th;?></li>        
                                <?php }?>                                
                            </ul>
                        </li>
                    </ul>                
                </li>
                <li class="submenu">สื่อเผยแพร่/ดาวน์โหลด
                    <ul>
                        <?php
                         foreach($doc as $key=>$type) {
                        ?>
                        <li><?php echo $type->name_th;?></li>        
                        <?php }?>
                    </ul>                
                </li>
                <li class="submenu">ความร่วมมือ
                    <ul>
                        <li class="submenu">ภายในประเทศ
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status=:status AND t.group=:group';
                                    $criteria->params=array(':status'=>1,':group'=>'inbound');
                                    $criteria->order = 'sort_order';
                                    $co_type = CooperationType::model()->findAll($criteria);

                                    foreach($co_type as $type) {
                                ?>
                                <li><?php echo $type->name_th;?></li>        
                                <?php }?>
                            </ul>
                        </li>
                        <li class="submenu">ต่างประเทศ
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status=:status AND t.group=:group';
                                    $criteria->params=array(':status'=>1,':group'=>'outbound');
                                    $criteria->order = 'sort_order';
                                    $co_type = CooperationType::model()->findAll($criteria);

                                    foreach($co_type as $type) {
                                ?>
                                <li><?php echo $type->name_th;?></li>        
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
                        <li><?php echo $type->name_th;?></li>        
                        <?php }?>
                    </ul>
                </li>
                <li class="submenu">บริการ
                    <ul>
                        <li>ดาวน์โหลดแบบฟอร์ม</li>
                        <li>ห้องสมุด</li>
                    </ul>
                </li>
                <li class="submenu">บริการนิสิต
                    <ul>
                        <li class="submenu">ปริญญาโท
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status = 1 AND ser_group=1'; 
                                    $criteria->order = 'sort_order';
                                    $co_type = StudentServiceType::model()->findAll($criteria);

                                    foreach($co_type as $type) {
                                ?>
                                <li><?php echo $type->name_th;?></li>        
                                <?php }?>                                
                            </ul>
                        </li>
                        <li class="submenu">ปริญญาเอก
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status = 1 AND ser_group=2'; 
                                    $criteria->order = 'sort_order';
                                    $co_type = StudentServiceType::model()->findAll($criteria);

                                    foreach($co_type as $type) {
                                ?>
                                <li><?php echo $type->name_th;?></li>        
                                <?php }?>                                
                            </ul>                        
                        </li>
                        <li class="submenu">ประเมินการเรียนการสอน
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status = 1 AND ser_group=3'; 
                                    $criteria->order = 'sort_order';
                                    $co_type = StudentServiceType::model()->findAll($criteria);

                                    foreach($co_type as $type) {
                                ?>
                                <li><?php echo $type->name_th;?></li>        
                                <?php }?>                                
                            </ul>                        
                        </li>
                    </ul>
                </li>
                <li class="submenu">ทำเนียบนิสิต
                    <ul>
                        <li class="submenu">ปริญญาโท
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status = 1 AND alumni_group=\'Master\''; 
                                    $criteria->order = 'sort_order';
                                    $co_type = AlumniNo::model()->findAll($criteria);
                                    foreach($co_type as $type) {
                                ?>
                                <li><?php echo $type->name_th;?></li>        
                                <?php }?>
                            </ul>
                        </li>
                        <li class="submenu">ปริญญาเอก
                            <ul>
                                <?php
                                    $criteria = new CDbCriteria();
                                    $criteria->condition = 'status = 1 AND alumni_group=\'Doctor\''; 
                                    $criteria->order = 'sort_order';
                                    $co_type = AlumniNo::model()->findAll($criteria);
                                    foreach($co_type as $type) {
                                ?>
                                <li><?php echo $type->name_th;?></li>        
                                <?php }?>
                            </ul>                        
                        </li>
                    </ul>
                </li>
                <li class="submenu">คลังข้อมูลความรู้
                    <ul>
                        <li class="submenu">การจัดการความรู้
                            <ul>
                                <?php
                                   $criteria = new CDbCriteria();
                                   $criteria->condition = 'status=:status AND know_group =1';
                                   $criteria->params=array(':status'=>1);
                                   $criteria->order = 'sort_order';
                                   $co_type = KnowledgeType::model()->findAll($criteria);

                                   foreach($co_type as $type) {
                               ?>
                               <li><?php echo $type->name_th;?></li>        
                               <?php }?>                                
                            </ul>
                        </li>
                        <li class="submenu">หมวดความรู้
                            <ul>
                                <?php
                                   $criteria = new CDbCriteria();
                                   $criteria->condition = 'status=:status AND know_group =2';
                                   $criteria->params=array(':status'=>1);
                                   $criteria->order = 'sort_order';
                                   $co_type = KnowledgeType::model()->findAll($criteria);

                                   foreach($co_type as $type) {
                               ?>
                               <li><?php echo $type->name_th;?></li>        
                               <?php }?>                                
                            </ul>
                        </li>
                        <li class="submenu">สารคดี
                            <ul>
                                <?php
                                   $criteria = new CDbCriteria();
                                   $criteria->condition = 'status=:status AND know_group =3';
                                   $criteria->params=array(':status'=>1);
                                   $criteria->order = 'sort_order';
                                   $co_type = KnowledgeType::model()->findAll($criteria);

                                   foreach($co_type as $type) {
                               ?>
                               <li><?php echo $type->name_th;?></li>        
                               <?php }?>                                
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu">รายงานผลการดำเนินงาน
                    <ul>
                        <?php
                         foreach($report as $key=>$type) {
                        ?>
                        <li><?php echo $type->name_th;?></li>        
                        <?php }?>
                    </ul>
                </li>
                <li class="submenu">ลิงค์ที่เกี่ยวข้อง
                    <ul>
                        <?php foreach ($links as $key=>$value){?>      
                        <li><?php echo $value->name_th;?></li>
                        <?php }?>
                    </ul>
                </li>
                <li>ติดต่อเรา</li>
                <li>นโยบายความเป็นส่วนตัว</li>
                <li>คำถามที่พบบ่อย</li>
                <li>แผนที่เว็บไซต์</li>
	</ul>
      </article>
      <article class="col-right">
        <?php $this->renderPartial('rightmenu',array(
                                'newsInSide'=>$newsInSide,
                                'job'=>$job,
                                'student_news'=>$student_news,
                                'links'=>$links,
                                'vdo'=>$vdo,
                        ));?>
      </article>
    </div>
  </div>
</section>