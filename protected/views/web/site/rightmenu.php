<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $col3_header = "Media";
    $col3_2_header = "Admission";
    $col3_3_header = "Job News";
    $col3_4_header = "Link";
    $dean = "Direct Line‎ to Dean";
    $event_text = "Calendar";
    $event_title ="Activity";
    $event_date ="Date";
    $more="Read More...";

}else{
    $col3_header = "วีดีโอแนะนำวิทยาลัย";
    $col3_2_header = "ประกาศสมัครเรียน";
    $col3_3_header = "ประกาศรับสมัครงาน";
    $col3_4_header = "ลิงค์ที่เกี่ยวข้อง";
    $dean = "สายตรงคณบดี";
    $event_text = "ปฏิทินกิจกรรม";
    $event_title ="กิจกรรม";
    $event_date ="วันที่";
    $more="ดูทั้งหมด...";
}
?>
<div class="indent-top">

<h3><?php echo $dean;?></h3>
<div align="left">
  <a href="<?php echo Yii::app()->createUrl('site/directline'); ?>" title="<?php echo $dean;?>">
  <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/dean.jpg" border="0" alt="<?php echo $dean;?>"/>  
  </a>
</div>
    
<br/>
    
    
<h3><?php echo $col3_header;?></h3>
<iframe width="320" height="215" src="<?php echo $vdo->title_th;?>?version=3&hl=th_TH" frameborder="0" allowfullscreen></iframe>

<div class="clear"></div>

<br/>
<!-- ปฏิทินกิจกรรม -->
<h3><?php echo $event_text;?></h3>
<ul>
<?php 
    foreach ($events as $value){
            if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                $event_name = $value->event_title_en;
                
            }else{
                $event_name = $value->event_title_th;
            }     
    ?>
    <li>
        <div class="date-event">
            <h5><?php echo date('j',  strtotime($value->event_start));?><br><?php echo date('M',  strtotime($value->event_start));?></h5>
        </div>
        <div class="date-detile">
            <a href="<?php echo Yii::app()->createUrl('event', array('id'=>$value->event_id)); ?>"><?php echo $event_title;?> : <?php echo $event_name;?><br/><?php echo $event_date;?> : <?php echo date('d/m/Y',  strtotime($value->event_start));?><?php if($value->event_end && $value->event_end != '0000-00-00'){ echo " - ".date('d/m/Y',  strtotime($value->event_end)); }?></a>
        </div>
        <div class="clear"></div>
    </li>
<?php }?>
</ul>
<p class="alignright small"><a href="<?php echo Yii::app()->createUrl('event'); ?>"><?php echo $more;?></a></p>
<!-- ข่าวรับสมัครเรียน -->
<h3><?php echo $col3_2_header;?></h3>
  <ul class="list-2">
    <?php 
        foreach ($student_news as $key_new => $new_pr){
            if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                $news_name = $new_pr->name_en;
            }else{
                $news_name = $new_pr->name_th;
            }    
        ?>
        <li><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new_pr->news_id)); ?>"><?php echo $news_name;?></a> </li>
    <?php }?>
  </ul>

<!-- ข่าวรับสมัครงาน -->
<h3><?php echo $col3_3_header;?></h3>
  <ul class="list-2">
    <?php 
        foreach ($job as $key_new => $new){
            if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                $news_name = $new->name_en;
            }else{
                $news_name = $new->name_th;
            }
            ?>
        <li><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><?php echo $news_name;?></a> </li>
    <?php }?>
  </ul>
<!-- ลิงค์ที่เกี่ยวข้อง -->
<h3><?php echo $col3_4_header;?></h3>
  <ul class="list-2">
    <?php 
        foreach ($links as $key=>$value){      
            if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                $url = $value->link_en;
                $link_name = $value->name_en;
            }else{
                $url = $value->link_th;
                $link_name = $value->name_th;
            }?>
        <li><a target="_blank" href="<?php echo $url;?>"><?php echo $link_name;?></a> </li>
    <?php }?>
  </ul>


<!-- User Online -->
  <div style="padding: 10px; background: #F1F1F1;width: 250px;">
<h3>User Online</h3>
    online: <?php echo Yii::app()->counter->getOnline(); ?><br />
    today: <?php echo Yii::app()->counter->getToday(); ?><br />
    yesterday: <?php echo Yii::app()->counter->getYesterday(); ?><br />
    total: <?php echo Yii::app()->counter->getTotal(); ?><br />
    maximum: <?php echo Yii::app()->counter->getMaximal(); ?><br />
    date for maximum: <?php echo $this->getThaiDate(date('Y-m-d', Yii::app()->counter->getMaximalTime()),'dmY'); ?>
  </div>

</div>