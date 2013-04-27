<?php
if((isset($_GET['lang']))&&($_GET['lang'] =='en')){
    $this->pageTitle=Yii::app()->name . ' - Alumni';
 
}else{
    $this->pageTitle=Yii::app()->name . ' - ศิษย์เก่าดีเด่น';
    
}
$this->breadcrumbs=array(
        'รวมพลคนเก่ง GSPA'
);

?>
<div id="page6">
<section id="content" style="margin-top: -20px">
  <div class="main">
    <div class="wrapper">
      <article class="col-1">
        <div class="indent-left">            
            <?php $this->renderPartial('/site/leftmenu');?>
        </div>
      </article>
      <article class="col-2">
          <h3>รวมพลคนเก่ง GSPA</h3>
          <?php foreach ($model as $value){?>
          <div class="wrapper indent-bot">
            <figure class="img-indent"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/alumni/<?php echo $value->image;?>"/></figure>
            <div class="extra-wrap">
              <h6><?php echo $value->name_th;?></h6>
              <p>สาขาวิชา : <?php echo $value->major_th;?><br/>
              ศูนย์การศึกษา : <?php echo $value->campus_th;?><br/>
              ตำแหน่ง : <?php echo $value->position_th;?><br/>
              <span class="small"><a href="<?php echo Yii::app()->createUrl('alumni', array('id'=>$value->alumni_id)); ?>">ดูข้อมูลเพิ่มเติม</a></span></p>
             </div>
          </div>
          <?php }?>
        </article>
      
    </div>
  </div>
</section>
</div>