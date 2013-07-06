<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $col3_header = "Media";
    $col3_2_header = "Admission";
    $col3_3_header = "Job News";
    $col3_4_header = "Link";

}else{
    $col3_header = "วีดีโอแนะนำวิทยาลัย";
    $col3_2_header = "ประกาศสมัครเรียน";
    $col3_3_header = "ประกาศรับสมัครงาน";
    $col3_4_header = "ลิงค์ที่เกี่ยวข้อง";
}
?>
<div class="indent-top">
<h3><?php echo $col3_header;?></h3>
<iframe width="320" height="215" src="<?php echo $vdo->title_th;?>?version=3&hl=th_TH" frameborder="0" allowfullscreen></iframe>

<div class="clear"></div>
<br/>
<!-- ข่าวรับสมัครเรียน -->
<h3><?php echo $col3_2_header;?></h3>
  <ul class="list-2">
    <?php 
        foreach ($student_news as $key_new => $new_pr){?>
        <li><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new_pr->news_id)); ?>"><?php echo $new_pr->name_th;?></a> </li>
    <?php }?>
  </ul>

<!-- ข่าวรับสมัครงาน -->
<h3><?php echo $col3_3_header;?></h3>
  <ul class="list-2">
    <?php 
        foreach ($job as $key_new => $new){?>
        <li><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><?php echo $new->name_th;?></a> </li>
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