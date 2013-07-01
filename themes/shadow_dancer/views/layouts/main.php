<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/buttons.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/icons.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/tables.css" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mbmenu.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mbmenu_iestyles.css" />
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js" type="text/javascript"></script>
	

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    
<div class="container" id="page">
	<div id="header">
		<div id="logo"><a href="<?php echo Yii::app()->createUrl('site'); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/images/front/buu_logo.png" width="80px"/></a><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	
	<?php 
        /* if($this->showMenu) { $this->widget('application.extensions.mbmenu.MbMenu',array(
		'items'=>array(
//			array('label'=>'หน้าแรก', 'url'=>array('/site')),
//			array('label'=>'จัดการหน้าเว็บ', 'items'=>array(
//				array('label'=>'Manage Page Type', 'url'=>array('/pagetype')),
//                              array('label'=>'Manage Left Menu', 'url'=>array('/leftmenu')),
//                              array('label'=>'Manage Pages', 'url'=>array('/page')),                        
//			)),
                        array('label'=>'เกี่ยวกับหน่วยงาน', 'items'=>array(
                            //array('label'=>'Manage Pages', 'url'=>array('/page')),
				array('label'=>'ความเป็นมา', 'url'=>array('/page/edit?id=1')),
                                array('label'=>'ตราสัญลักษณ์', 'url'=>array('/page/edit?id=2')),
                                array('label'=>'วิสัยทัศน์', 'url'=>array('/page/edit?id=4')),
                                array('label'=>'พันธกิจ', 'url'=>array('/page/edit?id=5')),                               
                                array('label'=>'ทำเนียนผู้บริหาร', 'url'=>array('/executive')),
                                array('label'=>'โครงสร้างหน่วยงาน', 'items' => array(
					array('label'=>'ประเภทโครงสร้างหน่วยงาน', 'url'=>array('/structureType')),
					array('label'=>'รายชื่อบุคลากร', 'url'=>array('/structure')),
                                )),
                                array('label'=>'คณาจารย์', 'url'=>array('/board')),
//                                array('label'=>'ความร่วมมือทางวิชาการ', 'url'=>array('/cooperation')),
//                                array('label'=>'ข้อมูลศิษย์เก่า', 'url'=>array('/alumni')),
//                                array('label'=>'แผนที่วิทยาลัย', 'url'=>array('/page/edit?id=6')),

			)),
                        array('label'=>'ประกาศ/กิจกรรม', 'items'=> 
				array(
                                        array('label'=>'ประเภทข่าว', 'url'=>array('/newstype')),
                                        array('label'=>'ข่าวทั้งหมด', 'url'=>array('/news')),
                                        //array('label'=>'จดหมายข่าว Online', 'url'=>array('/news')),
                                     array('label'=>'ประกาศ', 'items'=> 
                                            array(

                                                    array('label'=>'สมัครเรียน', 'url'=>array('/student')),
                                                    array('label'=>'รับสมัครงาน', 'url'=>array('/jobs')),
                                            ),
                                     ),
                                     array('label'=>'ประชาสัมพันธ์/กิจกรรม', 'items'=> 
                                            array(

                                                    array('label'=>'ภายใน', 'url'=>array('/news')),
                                                    array('label'=>'จากสื่อ', 'url'=>array('/news')),
                                            ),
                                    ),
				),
                           
			),
                        array('label'=>'สื่อเผยแพร่', 'items'=> 
				array(
					
                                        array('label'=>'บทความ-งานวิจัย', 'url'=>array('/student')),
                                        array('label'=>'วารสารการเมืองและการบริหารรัฐกิจ', 'url'=>array('/newstype')),
                                        array('label'=>'คู่มือปัญหาพิเศษ', 'url'=>array('/news')),
                                        array('label'=>'คู่มือวิทยานิพนธ์', 'url'=>array('/news')),
				),
			),
                        array('label'=>'ความร่วมมือ', 'items'=> 
				array(
                                       array('label'=>'ในประเทศ', 'url'=>array('/inbound')),
                                       array('label'=>'ต่างประเทศ', 'url'=>array('/outbound')),
                                       array('label'=>'ประเภทความร่วมมือ', 'url'=>array('/cooperationType')),
				),
                           
			),
			array('label'=>'คลังข้อมูลความรู้', 'items'=>array(
                                array('label'=>'การจัดการความรู้', 'url'=>array('/program')),
                                array('label'=>'หมวดความรู้', 'url'=>array('/program')),
                                array('label'=>'สารคดี', 'url'=>array('/program')),                            
                                //array('label'=>'บทความ', 'url'=>array('/article')),
			)),
//			array('label'=>'หลักสูตร', 'items'=>array(
//                                array('label'=>'หลักสูตรที่เปิดสอน', 'url'=>array('/program')),
//                                array('label'=>'สมัครเรียนปริญญาเอก', 'url'=>array('/page/edit?id=15')),
//                                array('label'=>'สมัครเรียนปริญญาโท', 'url'=>array('/page/edit?id=14')),                            
//                                //array('label'=>'บทความ', 'url'=>array('/article')),
//			)),
                    
                    
                        //array('label'=>'ภาพกิจกรรม','url'=>array('/gallery')),
                        
                        array('label'=>'บริการนิสิต', 'items'=>array(
				array('label'=>'ปริญญาโท', 'url'=>array('/document')),
                                array('label'=>'ปริญญาเอก', 'url'=>array('/page/edit?id=16')),
                                array('label'=>'ประเมินการเรียนการสอน', 'url'=>array('/page/edit?id=17')),
//                            	array('label'=>'เอกสารประกอบการเรียน', 'url'=>array('/document')),
//                                array('label'=>'วิทยานิพนธ์ / ดุษฎีนิพนธ์', 'url'=>array('/page/edit?id=16')),
//                                array('label'=>'ปัญหาพิเศษ / งานนิพนธ์', 'url'=>array('/page/edit?id=17')),
                                //array('label'=>'บทความ', 'url'=>array('/article')),
			)),                        
                        
		        array('label'=>'ทำเนียบนิสิต', 'items'=>array(
				array('label'=>'ปริญญาโท', 'url'=>array('/alumni')),
                                array('label'=>'ปริญญาเอก', 'url'=>array('/alumni')),
			)), 
                        array('label'=>'เมนูอื่นๆ', 'items'=> 
				array(	
                                        
                                        array('label'=>'หน่วยงานภายใต้กำกับ', 'url'=>array('/organization')),
                                        array('label'=>'รายงานผลการดำเนินงาน', 'url'=>array('/organization')),
                                        array('label'=>'บริการ', 'url'=>array('/organization')),
                                        array('label'=>'Link ที่เกี่ยวข้อง', 'url'=>array('/link')),
                                        array('label'=>'ข้อมูลการติดต่อ', 'url'=>array('/page/edit?id=7')),
                                        array('label'=>'แผนที่วิทยาลัย', 'url'=>array('/page/edit?id=6')),
                                        array('label'=>'Slide Show', 'url'=>array('/slide')),
                                        array('label'=>'VDO', 'url'=>array('/page/edit?id=3')),
				),
			),
                        array('label'=>'ผู้ใช้งาน','url'=>array('/user')),
			
                 ),
	)); }*/ ?>
        <?php if(!Yii::app()->user->isGuest){
            $user = $this->getUserProfile(Yii::app()->user->id);
        ?>
        <div style="overflow: hidden;background-color: #F1F1F1;border-bottom: 2px solid #cccccc;">
        <div style="float:left; padding: 15px 20px;">
            <b>ยินดีต้อนรับ : </b><?php echo $user->firstname." ".$user->lastname;?>
            <b>กลุ่มผู้ใช้ : </b><?php echo $user->userGroup->name; ?>
            <b>เข้าใช้ระบบล่าสุดเมื่อ : </b><?php echo $user->last_login; ?>
        </div>
        <div style="float:right;padding: 15px 20px;">
            <a style="text-decoration: none;" href="<?php echo Yii::app()->createUrl('user/edit', array('id'=>Yii::app()->user->id)); ?>">[ แก้ไขข้อมูลส่วนตัว ]</a>
            <a style="text-decoration: none;" href="<?php echo Yii::app()->createUrl('site/logout'); ?>">[ ออกจากระบบ ]</a>
        </div>
        </div>
        <div style="clear:both"></div>
        <?php } ?>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
        <?php echo $content; ?>

	<div id="footer">
		Content management System (CMS)<br/>
                ระบบจัดการเนื้อหาเว็บไซต์<br/>

	</div><!-- footer -->

</div><!-- page -->

</body>
</html>