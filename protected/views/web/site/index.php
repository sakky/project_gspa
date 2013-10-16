<?php Yii::app()->counter->refresh();?>
<?php
/* @var $this SiteController */
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle="Graduate School of Public Administration";
    $col1_header = "News & Activities";
    $text_title = "Open Admissions Program";
    $text_button1 = "Master's degree";
    $text_button2 = "Doctorate Degree";
    $text_button3 = "Online Admission";
    $col3_2_header = "Admission";
    $col3_3_header = "Job News";
    $more="Read More";
    $announce = "Announce";
    $txt_news = "News";
}else{
    $this->pageTitle=Yii::app()->name;
    $col1_header = "ประชาสัมพันธ์ & กิจกรรม"; 
    $text_title = "เปิดรับสมัครนักศึกษา หลักสูตร";
    $text_button1 = "ปริญญาโท";
    $text_button2 = "ปริญญาเอก";
    $text_button3 = "สมัครเรียนออนไลน์";  
    $col3_2_header = "ประกาศวิชาการ";
    $col3_3_header = "ประกาศรับสมัครงาน";
    $more="ดูทั้งหมด";
    $announce = "ประกาศ";
    $txt_news = "ประชาสัมพันธ์";
}
?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/style2.css" />
<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easing.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>
<script type="text/javascript">
 $(document).ready( function(){	
		var buttons = { previous:$('#jslidernews2 .button-previous') ,
			next:$('#jslidernews2 .button-next') };			 
		$('#jslidernews2').lofJSidernews( { interval:5000,
                        easing:'easeInOutQuad',
                        duration:1200,
                        auto:true,
                        mainWidth:684,
                        mainHeight:300,
                        navigatorHeight		: 100,
                        navigatorWidth		: 310,
                        maxItemDisplay:3,
                        buttons:buttons } );						
	});

</script>
<style>
	
	ul.lof-main-wapper li {
		position:relative;	
	}
</style>
<script type="text/javascript">
	$(function(){               
                
                $("span#desc1").each(function(i){
			len=$(this).text().length;
			if(len>120)
			{
				$(this).text($(this).text().substr(0,200)+'...');
			}
		});
                $("span#desc2").each(function(i){
			len=$(this).text().length;
			if(len>120)
			{
				$(this).text($(this).text().substr(0,200)+'...');
			}
		});
                $("span#desc3").each(function(i){
			len=$(this).text().length;
			if(len>120)
			{
				$(this).text($(this).text().substr(0,200)+'...');
			}
		});
                $("span#desc4").each(function(i){
			len=$(this).text().length;
			if(len>120)
			{
				$(this).text($(this).text().substr(0,200)+'...');
			}
		});
	});

</script>


<!-- Top Banner -->
<div id="page1">
<section id="content">
  <div class="main">
    <!--- Start Slide -->
    <div id="jslidernews2" class="lof-slidecontent" style="width:980px; height:300px;">
	<div class="preload"><div></div></div>
            
            
            <div  class="button-previous">Previous</div>
                   
    		 <!-- MAIN CONTENT --> 
              <div class="main-slider-content" style="width:684px; height:300px;">
                <ul class="sliders-wrap-inner">
                    <?php foreach ($model as $k=>$value){
                    if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                        $link = $value->link_en;
                        $title = $value->title_en;
                        $desc = $value->desc_en;
                        $readmore = "Read More";
                    }else{
                        $link = $value->link_th;
                        $title = $value->title_th;
                        $desc = $value->desc_th;
                        $readmore = "อ่านต่อ...";
                    }

                    ?> 
                    <li>
                          <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/slide/<?php echo $value->image;?>"  title="<?php echo $title;?>" />           
                          <!--div class="slider-description">
                            <h4><?php echo $title;?></h4>
                            <p><span id="desc<?php echo $k+1;?>"><?php echo $desc;?></span>
                            <div class="slider-meta"><a class="readmore" href="<?php echo $link;?>"><?php echo $readmore;?></a></div>
                            </p>
                         </div-->
                    </li> 
                    <?php }?>               
                  </ul>  	
            </div>
 		   <!-- END MAIN CONTENT --> 
           <!-- NAVIGATOR -->
           	<div class="navigator-content">
                  <div class="navigator-wrapper">
                        <ul class="navigator-wrap-inner">
                   <?php 
                   foreach ($model as $k2=>$value){
                
                    if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                        $link = $value->link_en;
                        $title = $value->title_en;
                        $desc = $value->desc_en;
                        $readmore = "Read More";
                    }else{
                        $link = $value->link_th;
                        $title = $value->title_th;
                        $desc = $value->desc_th;
                        $readmore = "อ่านต่อ...";
                    }

                    ?> 
                          <li>
                                <div>
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/slide/<?php echo $value->image;?>" />
                                    <div style="padding:12px 10px 10px 0;font-size: 13px"><?php echo $title;?></div>
                                    <div><a style="color:#fff" href="<?php echo $link;?>"><?php echo $readmore;?></a></div>
                                </div>    
                            </li>
                    <?php        $k2++;}?>                                                                                                    		
                        </ul>
                  </div>
   
             </div> 
          <!----------------- END OF NAVIGATOR --------------------->
          <div class="button-next">Next</div>
 
 		 <!-- BUTTON PLAY-STOP -->
          <div class="button-control"><span></span></div>
          <!-- END OF BUTTON PLAY-STOP -->
           
 </div> 
    <!--- End Slide-->
    <div class="wrapper">
      <article class="col-2">
          <div id="highlights">
            <div class="news">
                <!-- ข่าวประชาสัมพันธ์/กิจกรรม-------------------------------------------------------------------------------------------->
                <h2><?php echo $col1_header;?></h2>
                <?php foreach ($news as $new){
                     if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                         $news_name = $new->name_en;
                         $news_title = $new->title_en;
                         $news_readmore = "News More";
                     }else{
                         $news_name = $new->name_th;
                         $news_title = $new->title_th;
                         $news_readmore = "ดูข่าวทั้งหมด";
                     }
               ?>
               <div class="p1">
<!--                <h4><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><?php echo $new->name_th;?> [<?php echo $this->getThaiDate($new->create_date,'dmY');?>]</a><?php echo $this->showIcon($new->news_icon);?></h4>-->
               
                 <figure class="img-border" style="margin-right:10px;">
                     <a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>">
                         <?php if ($new->vdo_link) { ?>
                         <iframe width="100" height="63" src="<?php echo $new->vdo_link;?>?version=3&hl=th_TH" frameborder="0" allowfullscreen></iframe>
                         <?php } else { ?>
                         <img <?php if($new->thumbnail){?> src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/news/<?php echo $new->thumbnail;?>" <?php }else{ ?> src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/no_picture.png"<?php }?> title="<?php echo $news_name;?>" alt="" border="0" width="100" height="63" />
                         <?php } ?>
                     </a>
                 </figure>
                 <p><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><?php echo $new->name_th;?><br/>[<?php echo $this->getThaiDate($new->create_date,'dmY');?>]</a><?php echo $this->showIcon($new->news_icon);?></p>
<!--                 <p class="img-indent-bot"><?php echo $news_title;?></p>-->
               </div>       
               
               <?php }?>
                <div class="clear"></div>
<!--                <div class="alignright" style="margin:0 20px 5px 0;">
                <a class="button" href="<?php echo Yii::app()->createUrl('news'); ?>"><?php echo $news_readmore;?></a>
                </div>-->
            </div>
            <p class="more">
            <a href="<?php echo Yii::app()->createUrl('announce'); ?>">
                <?php echo $announce;?>
            </a>
            <a href="<?php echo Yii::app()->createUrl('news'); ?>">
                 <?php echo $txt_news;?>
            </a>
            </p>
        </div>

        <div class="clear"></div>
        <div class="box_announce">
            <div id="secnav">
                <!-- ข่าวรับสมัครเรียน -->
                <h3><?php echo $col3_2_header;?></h3>
                  <ul>
                    <?php 
                        foreach ($student_news as $key_new => $new_pr){
                            if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                                $news_name = $new_pr->name_en;
                            }else{
                                $news_name = $new_pr->name_th;
                            }    
                        ?>
                        <li><a class="item" href="<?php echo Yii::app()->createUrl('announce/admission', array('id'=>$new_pr->news_id)); ?>"><?php echo $news_name;?></a><?php echo $this->showIcon($new_pr->news_icon);?></li>
                    <?php }?>
                  </ul>
                <p class="alignright small"><a href="<?php echo Yii::app()->createUrl('announce/admission'); ?>"><?php echo $more;?></a> 
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" />
                </p>
            </div>
        </div>
        <div class="box_announce2">
            <div id="secnav">
                <!-- ข่าวรับสมัครงาน -->
                <h3><?php echo $col3_3_header;?></h3>
                <ul>
                  <?php 
                      foreach ($job as $key_new => $new){
                          if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                              $news_name = $new->name_en;
                          }else{
                              $news_name = $new->name_th;
                          }
                          ?>
                      <li><a class="item" href="<?php echo Yii::app()->createUrl('announce/job', array('id'=>$new->news_id)); ?>"><?php echo $news_name;?></a><?php echo $this->showIcon($new->news_icon);?></li>
                  <?php }?>
                </ul>
                <p class="alignright small"><a href="<?php echo Yii::app()->createUrl('announce/job'); ?>"><?php echo $more;?></a> 
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/marker_2.gif" border="0" />
                </p>
            </div>
        </div>
      </article>
      <article class="col-3">
            <?php $this->renderPartial('rightmenu',array(
                                'newsInSide'=>$newsInSide,
                                'job'=>$job,
                                'student_news'=>$student_news,
                                'links'=>$links,
                                'vdo'=>$vdo,
                                'events'=>$events,
                        ));?>
      </article>
    </div>
  </div>
</section>
</div>