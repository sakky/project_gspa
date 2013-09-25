<?php
$keyword = trim($_GET['q']);

$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Cooperation';
    $this->breadcrumbs=array(
            'Cooperation'=>array('index'),
    );
    $header = "Search Result ".'"'.$keyword.'"';

}else{
    $this->pageTitle=Yii::app()->name. ' - ความร่วมมือ';
    $this->breadcrumbs=array(
            'ความร่วมมือ'=>array('index'),
    );
    $header = "ผลการค้นหา ".'"'.$keyword.'"';
}
$this->widget('ext.jQueryHighlight.DJqueryHighlight', array(
        'selector' => 'article ul.list-4',
        'words' => array($keyword)
    ));
?>
<style>
.highlight{
background:#FF6F17;
}
</style>
<section id="content">
  <div class="main">
      <div class="wrapper">
        <article class="">
          <h3><?php echo $header;?></h3>
              <?php if (count($model_news)>0) { ?>
          <h3>ข่าว/กิจกรรม/ประกาศ</h3>
          <ul class="list-4">
              <?php foreach ($model_news as $value){
                   if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                       $name = $value->name_en;
                   }else{
                       $name = $value->name_th;
                   }
                    $page_name = 'news';
               ?>
              <li><a href="<?php echo Yii::app()->createUrl($page_name, array('id'=>$value->news_id)); ?>"><?php echo $name;?></a></li>
              <?php }?>
          </ul>
              <?php }?>

          
              <?php if (count($model_student)>0) { ?>
          <h3>บริการนิสิต</h3>
          <ul class="list-4">
              <?php foreach ($model_student as $value){
                   if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                       $name = $value->name_en;
                   }else{
                       $name = $value->name_th;
                   }
                    $page_name = 'student';
               ?>
              <li><a href="<?php echo Yii::app()->createUrl($page_name, array('id'=>$value->ser_id)); ?>"><?php echo $name;?></a></li>
              <?php }?>
          </ul>
              <?php }?>
          
          
              <?php if (count($model_document)>0) { ?>
          <h3>สื่อเผยแพร่/ดาวน์โหลด</h3>
          <ul class="list-4">
              <?php foreach ($model_document as $value){
                   if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                       $name = $value->name_en;
                   }else{
                       $name = $value->name_th;
                   }
                    $page_name = 'document';
               ?>
              <li><a href="<?php echo Yii::app()->createUrl($page_name, array('id'=>$value->doc_id)); ?>"><?php echo $name;?></a></li>
              <?php }?>
          </ul>
              <?php }?>

              <?php if (count($model_knowledge)>0) { ?>
          <h3>การจัดการความรู้</h3>
          <ul class="list-4">
              <?php foreach ($model_knowledge as $value){
                   if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                       $name = $value->name_en;
                   }else{
                       $name = $value->name_th;
                   }
                    $page_name = 'knowledge';
               ?>
              <li><a href="<?php echo Yii::app()->createUrl($page_name, array('id'=>$value->know_id)); ?>"><?php echo $name;?></a></li>
              <?php }?>
          </ul>
              <?php }?>
          
          </ul>
          <?php if (count($model_news)==0
                &&  count($model_student)==0
                &&  count($model_document)==0
                &&  count($model_knowledge)==0
                  ) {?>
          <h4>ไม่พบข้อมูล</h4>
          <?php }?>
        </article>          
      </div>
  </div>
</section>
