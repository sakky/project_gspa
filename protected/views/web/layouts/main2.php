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
        <script>
            <?php
                    $exam = new Exam;
                    $exam_info = $exam->getExamDetailById($_GET['id']);
            ?>
            var exam_id = <?php echo $_GET['id'];?>;
            var credit_require = <?php echo $exam_info['credit_required'];?>;
            $(document).ready(function() {
                $.ajax({
                    url: '?r=exam/checktest&exam_id='+exam_id,
                    type: 'GET',
                    dataType: 'html',
                    success: function (data, textStatus, xhr) {
                        //alert(data);
                        if(data==0){                            
                            apprise('เครดิตคุณจะถูกหักไป '+credit_require+' เครดิต', {'verify':true, 'textYes':'ตกลง', 'textNo':'ยกเลิก'}, function(r){
                                    if(r) {
                                        useCredit(credit_require,exam_id);
                                    }else{
                                        OpenLink("index.php?r=student/view");
                                    }
                            });
                                           
                                    
                        }else{

                            if(typeof time_dec == 'undefined'){
                                clearInterval(cinterval);
                            }else{
                                cinterval = setInterval('time_dec()', 1000);
                            }
                           
                        }


                    },
                    error: function (request, status, error) {
                        alert ("Error: "+error+ "\nResponseText: "+request.responseText);
                    }
                });
                    
            });


            function useCredit(credit_require,exam_id){
                $.ajax({
                        url: '?r=exam/usecredit&credit='+credit_require+'&id='+exam_id,
                        type: 'GET',
                        dataType: 'html',
                        success: function (temp, textStatus, xhr) {
                            //alert(temp);
                            if(temp=='Y'){
                                 cinterval = setInterval('time_dec()', 1000);
                            }else{
                                alert('ขออภัยค่ะ ไม่สามารถตัดเครดิตได้');
                                OpenLink("index.php?r=student/view");
                            }
                        }
                 });

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
                            $exam = Exam::model()->findByPk($_GET['id']);

                            $testRecord = new TestRecord;
                            $Total = $testRecord->getTestRecordByStudentIdExamId($student->student_id,$exam->exam_id);
                            if($Total>0){
                                 $test_record_id = $testRecord->getIdByStudentIdExamId($student->student_id,$exam->exam_id);
                                 $model = $testRecord->loadTestRecord($test_record_id);
                                 $start_time = (int) $exam->time_limited - $model->elapse_time;
                               

                            }else{
                                 //$start_time = $exam->time_limited;
                                 $start_time = $exam->time_limited;
                            }
                            //$time_limit = $exam->time_limited;
                            if($start_time>0){
                                $time_limit = date("H:i:s", mktime(0, $start_time, 0, 0, 0, 0));
                            }else{
                                $time_limit = date("H:i:s", mktime(0, 0, 0, 0, 0, 0));
                            }
                            

                        ?>
                        <script language="javascript">
                        var test_rec_id = <?php echo $test_record_id ;?>;

                        var min = <?php echo $start_time;?>;

                        if(min>0){
                            
                                var time_left = min*60;

                                var cinterval;

                                var elapse_time;

                                function time_dec(){

                                time_left--;
                                //alert(time_left);

                                // 5 Min. = 300 Sec.

                                // Test 10 Sec.
                                if(time_left%300 == 0){

                                    document.forms['ExamForm'].action = "index.php?r=exam/save";
                                    //document.forms['AnswerForm'].action = "index.php?r=exam/saveanswer";

                                    document.forms['ExamForm'].submit();
                                    //document.forms['AnswerForm'].submit();


                                }
                                var hours = Math.floor(time_left / (60 * 60));

                                var divisor_for_minutes = time_left % (60 * 60);
                                var minutes = Math.floor(divisor_for_minutes / 60);

                                var divisor_for_seconds = divisor_for_minutes % 60;
                                var seconds = Math.ceil(divisor_for_seconds);


                                if (hours < 10) {hours = "0" + hours; }
                                if (minutes < 10) {minutes = "0" + minutes;}
                                if (seconds < 10) {seconds = "0" + seconds;}
                                if (!hours) {hours = "00";}


                                var obj = hours+':'+minutes+':'+seconds;

                                //return obj;


                                document.getElementById('countdown').innerHTML = obj;
                                if(time_left == 0){
                                    
                                    alert("หมดเวลาทำข้อสอบแล้วคะ");
                                    clearInterval(cinterval);

                                }
                            }
                        }else{
                            alert("หมดเวลาทำข้อสอบแล้วคะ");
                            clearInterval(cinterval);
                            document.location.href = 'index.php?r=exam/answer&id='+test_rec_id;
                            
                        }

                        //cinterval = setInterval('time_dec()', 1000);
                        </script>
                     
                         <div id="header" class="grid_12">

                                <h1 class="logo"><a href="index.php">eStudio</a></h1>
                               
                                <div class="time_countdown">
                                        <span class="time_icon"></span>
                                        <div class="time_text blink"><span id="countdown"><?php echo $time_limit;?></span></div>

                                </div>

                        </div>

                        <div id="header_title" class="grid_12">

                                <div class="time_title">เวลาที่เหลือ</div>

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
		}, 1000);
	});

	</script>

	<script type="text/javascript" src="js/jquery.dataTables.myconfig.js"></script>

	<script type="text/javascript" >document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

</body>

</html>