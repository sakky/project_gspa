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
	

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
	<div id="topnav">
		<div class="topnav_text"><?php echo (!Yii::app()->user->isGuest)? CHtml::link('ออกจากระบบ ('.Yii::app()->user->name.')', array('site/logout')) :''; ?></div>
	</div>
	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	
	<?php if($this->showMenu) { $this->widget('application.extensions.mbmenu.MbMenu',array(
		'items'=>array(
			array('label'=>'หน้าแรก', 'url'=>array('/site')),
//			array('label'=>'จัดการหน้าเว็บ', 'items'=>array(
//				array('label'=>'Manage Page Type', 'url'=>array('/pagetype')),
//                                array('label'=>'Manage Left Menu', 'url'=>array('/leftmenu')),
//                                array('label'=>'Manage Pages', 'url'=>array('/page')),
//                                
//                                
//			)),
                        array('label'=>'แนะนำวิทยาลัย', 'items'=>array(
                            //array('label'=>'Manage Pages', 'url'=>array('/page')),
				array('label'=>'เกี่ยวกับวิทยาลัย', 'url'=>array('/page/edit?id=1')),
                                array('label'=>'สัญลักษณ์ประจำวิทยาลัย', 'url'=>array('/page/edit?id=2')),
                                array('label'=>'คณะกรรมการประจำวิทยาลัย', 'url'=>array('/board')),
                                array('label'=>'ผู้บริหารวิทยาลัย', 'url'=>array('/executive')),
                                array('label'=>'โครงสร้างองค์กร', 'url'=>array('/page/edit?id=4')),
                                array('label'=>'ความร่วมมือทางวิชาการ', 'url'=>array('/page/edit?id=5')),
                                array('label'=>'แผนที่วิทยาลัย', 'url'=>array('/page/edit?id=6')),
                                /*array('label'=>'Payments', 'items' => array(
					array('label'=>'Bank Transfer', 'url'=>array('/payment', 'method'=>'bank_transfer')),
					array('label'=>'Credit Card', 'url'=>array('/payment', 'method'=>'credit_card')),
					array('label'=>'PAYSBUY', 'url'=>array('/payment', 'method'=>'paysbuy')),
				)),
				array('label'=>'Credits', 'url'=>array('/credit/admin')),
				array('label'=>'Coupons', 'url'=>array('/coupon')),*/
			)),
			array('label'=>'เมนูด้านซ้าย', 'items'=>array(
                                array('label'=>'หลักสูตรที่เปิดสอน', 'url'=>array('/program')),
				array('label'=>'เอกสารประกอบการเรียน', 'url'=>array('/document')),
                                array('label'=>'วิทยานิพนธ์ / ดุษฎีนิพนธ์', 'url'=>array('/page/edit?id=16')),
                                array('label'=>'ปัญหาพิเศษ / งานนิพนธ์', 'url'=>array('/page/edit?id=17')),
                                array('label'=>'รวมพลคนเก่ง GSPA', 'url'=>array('/alumni')),
                                array('label'=>'สมัครเรียนปริญญาเอก', 'url'=>array('/page/edit?id=15')),
                                array('label'=>'สมัครเรียนปริญญาโท', 'url'=>array('/page/edit?id=14')),
                            
                                //array('label'=>'บทความ', 'url'=>array('/article')),
			)),
                        array('label'=>'เมนูด้านล่าง', 'items'=>array(
                                array('label'=>'ข้อมูลการติดต่อ', 'url'=>array('/page/edit?id=7')),
				array('label'=>'หน่วยงานภายใน', 'url'=>array('/organization')),
                                array('label'=>'Links ที่เกี่ยวข้อง', 'url'=>array('/link')),
			)),
                        
                        array('label'=>'ภาพกิจกรรม','url'=>array('/gallery')),
			array('label'=>'ข่าวสาร', 'items'=> 
				array(
					//array('label'=>'ประเภทข่าว', 'url'=>array('/newstype')),
                                        array('label'=>'ข่าวทั้งหมด', 'url'=>array('/news')),
                                        //array('label'=>'จดหมายข่าว Online', 'url'=>array('/news')),
                                        //array('label'=>'ข่าวประชาสัมพันธ์นิสิต', 'url'=>array('/student')),
                                        //array('label'=>'ข่าวรับสมัครงาน', 'url'=>array('/jobs')),
//                                        array('label'=>'GSPA Newsletter ', 'url'=>array('/#')),
				),
			),
                        array('label'=>'อื่นๆ', 'items'=> 
				array(				
                                        array('label'=>'Slide Show', 'url'=>array('/slide')),
                                        array('label'=>'VDO', 'url'=>array('/page/edit?id=3')),
				),
			),
                        array('label'=>'ผู้ใช้งาน','url'=>array('/user')),
			
                        /*array('label'=>'Theme Pages','items'=>
                                array(
                                        array('label'=>'Graphs & Charts', 'url'=>array('/site/page', 'view'=>'graphs'),'itemOptions'=>array('class'=>'icon_chart')),
                                        array('label'=>'Form Elements', 'url'=>array('/site/page', 'view'=>'forms')),
                                        array('label'=>'Interface Elements', 'url'=>array('/site/page', 'view'=>'interface')),
                                        array('label'=>'Error Pages', 'url'=>array('/site/page', 'view'=>'Demo 404 page')),
                                        array('label'=>'Calendar', 'url'=>array('/site/page', 'view'=>'calendar')),
                                        array('label'=>'Buttons & Icons', 'url'=>array('/site/page', 'view'=>'buttons_and_icons')),
                                ),
                         ),*/
                 ),
	)); } ?>

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