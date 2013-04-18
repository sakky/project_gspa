<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web/960.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web/font.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web/carousel/skin.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web/custom.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web/apprise.css">

	<script type="text/javascript" src="js/less-1.3.3.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/selectivizr-min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ellipsis.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/apprise-1.5.full.js"></script>

	<script type="text/javascript">
	function OpenLink(url) {
		document.location.href = url;
	};
         function ChangeRadioLabel(textValue,id){
            document.getElementById('append_'+id).innerHTML = textValue.value;
        }
	</script>


</head>

<body>
	<div class="container_12">
        <?php if(Yii::app()->user->isGuest){ ?>
		<div id="header" class="grid_12">

			<h1 class="logo"><a href="index.php">eStudio</a></h1>

			<div class="home_menu">

				<div class="aboutus">

					<ul class="aboutus_nav">
					    <li><a href="javascript:void(0);">About Us</a>

					    	<ul>
					    		<li><a href="<?php echo Yii::app()->createUrl('site/page', array('view'=>'about')); ?>">เราคือ?</a></li>
					    		<li><a href="<?php echo Yii::app()->createUrl('site/page', array('view'=>'teacher')); ?>">อาจารย์ออกข้อสอบ</a></li>
					    		<li><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>">ติดต่อเรา</a></li>
					    	</ul>

					    </li>
					</ul>

				</div>

				<form name="frmLoginUser" id="frmLoginUser" method="post" action="?r=site/checklogin">
					<div class="form">

						<div class="name_box">
							<p>Username:</p>
							<!-- text field -->
							<input type="text" name="LoginForm[username]" id="username" size="50" />

						</div>

						<div class="password_box">
							<p>Password:</p>
							<!-- password field -->
							<input type="password" name="LoginForm[password]" id="password" /><br />

							<!-- hidden field -->
							<input type="hidden" name="LoginForm[hddnValue]" id="hddnValue" value="login" />
						</div>

						<div class="clear"></div>

						<p>
							<input type="checkbox" name="chkRemember" id="chkRemember" />
							<label for="chkRemember">จำรหัสผ่าน</label>
							<a href="#">ลืมรหัสผ่าน</a>
						</p>

					</div>

					<div class="button">

                                            <input type="submit" value="Login" name="btn_login" id="login" onclick="OpenLink('?r=site/checklogin')" />
                                            <input type="button" value="Sign Up" name="btn_signup" id="signup" onclick="OpenLink('?r=student/create')" />

					</div>
				</form>
                        </div>
                        </div>
                        <?php }else{
                            $student = Student::model()->findByPk(Yii::app()->user->id);
                        ?>

                        <div id="header" class="grid_12">

                                <h1 class="logo"><a href="index.php">eStudio</a></h1>

                                <div class="time_countdown">
                                    <?php
                                        $exam_id = $_GET['id'];

                                        $exam = Exam::model()->findByPk($exam_id);

                                        $student_id = $student->student_id;

                                        $testRecoed = new TestRecord;

                                        $row = $testRecoed->getTestRecordDetailByStudentIdExamId($student_id,$exam_id);
                                        
                                        //if($exam->score_total)


                                       
                                    ?>
                                    <div class="time_text"><?php echo intval($row['score'])." / ".intval($exam->score_total);?></div>
                                </div>

                        </div>

                        <div id="header_title" class="grid_12">

                                <div class="time_title">คะแนนที่ได้</div>

                        </div>
                        <div class="login_menu" style="float:left;margin-left:20px;"><a href="?r=student/view">ดูข้อมูลส่วนตัว &raquo;</a></div>
                        <div class="login_menu" style="float:left;margin-left:20px;"><a href="?r=transfer">แบบฟอร์มแจ้งการชำระเงิน &raquo;</a></div>
                        <div class="login_menu" style="float:left;margin-left:20px;"><a href="?r=site/logout">ออกจากระบบ [ <?php echo $student->username?> ]</a></div>
                        <?php }?>




		<div class="clear"></div>

		<div id="content"><?php echo $content; ?></div>

		<div class="clear"></div>

	</div>

	<div id="footer">

		<div class="container_12">

			<div class="grid_3 logo_footer">
				<h1>eStudio</h1>
			</div>
			<div class="grid_3 contact">
				<h2>ติดต่อเรา</h2>
				<p>
					บริษัท เอ็ดดูเคชั่น สตูดิโอ จำกัด<br/>
                                        ชั้น 29 อาคารดิออฟฟิศแอทเซ็นทรัลเวิล์ด<br/>
                                        999/9 ถนนพระราม 1 ปทุมวัน กรุงเทพฯ 10330


				</p>
			</div>

			<div class="grid_3 sitemap">
				<h2>แผนผังเว็บไซต์</h2>
				<ul>
					<li><a href="<?php echo Yii::app()->createUrl('site/page', array('view'=>'about')); ?>">เราคือ?</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('site/page', array('view'=>'teacher')); ?>">อาจารย์ออกข้อสอบ</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('payment'); ?>">เติมเครดิต</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>">ติดต่อเรา</a></li>
				</ul>
			</div>
			<div class="grid_3 social">
				<h2>ติดตามเรา</h2>
				<a href="#" class="facebook">Facebook</a>
				<a href="#" class="twitter">Twitter</a>
			</div>

		</div>

	</div>

	<script>

	(function() {
		function stuffForRezieAndReady(){

			$(".question_content").height( Math.floor( $(window).height() * 92 / 100 - 200 ));

			$(".answer_content").height( Math.floor( $(window).height() * 92 / 100 - 79 - 200));

			$(function(){
				var minHeight = Math.floor( $(window).height() - 370 );
				$('#content').css({'min-height' : minHeight});
			});
   		}

   		$(window).on("resize", stuffForRezieAndReady);
		$(document).on("ready", stuffForRezieAndReady);

	})();

	$(".answer_content > ul").children("li:odd").css("background", "#e8e8e8");

	$(function(){
		$("h2.profile_name").each(function(i){
			len=$(this).text().length;
			if(len>18)
			{
				$(this).text($(this).text().substr(0,18)+'...');
			}
		});
	});

	$(".menu_test ul.menu_list li ul li a").click(function(){
		$(".list_test > .list_test_unselect").hide();
		$(".list_test > .list_test_box").css({ visibility: "visible" });
                $(".menu_test ul.menu_list li ul li a").removeAttr( 'style' );
                $(this).css("background", "#ff9c00");

	});


	$(".about_dialog .close").click(function(){
		$(".about_dialog").slideUp(500);
		$(".about_dialog .pic").fadeOut(100);
	});


	$(".menu_tab_home a:nth-child(1), .menu_tab a:nth-child(1)").click(function(){
		$(this).addClass("selected");
		$(this).siblings("a:nth-child(2)").removeClass("selected");
		$(this).parent().siblings(".menu_tab1").show();
		$(this).parent().siblings(".menu_tab2").hide();
	});

	$(".menu_tab_home a:nth-child(2), .menu_tab a:nth-child(2)").click(function(){
		$(this).addClass("selected");
		$(this).siblings("a:nth-child(1)").removeClass("selected");
		$(this).parent().siblings(".menu_tab1").hide();
		$(this).parent().siblings(".menu_tab2").show();
	});

	$(".credit_box .credit_select ul li input:radio").bind("click", function() {
		$(this).parents().eq(8).find('.credit_option').slideDown("slow");
		$(this).parents().eq(8).find('.credit_box').animate({'top': '-=25px'},'slow');
		$(this).parents().eq(8).find('.goback a').animate({'top': '-=15px'},'slow');
		$(".credit_box .credit_select ul li input:radio").unbind();
	});

	</script>

	<script>

	$(function(){
		var $post = $(".blink");
		setInterval(function(){
			$post.toggleClass("blink");
		}, 500);
	});

	</script>

	<script type="text/javascript" src="js/jquery.dataTables.myconfig.js"></script>

	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

</body>

</html>