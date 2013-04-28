<?php
if((isset($_GET['lang']))&&($_GET['lang'] =='en')){
    $this->pageTitle=Yii::app()->name . ' - Executive';
 
}else{
    $this->pageTitle=Yii::app()->name . ' - ผู้บริหารวิทยาลัยการบริหารรัฐกิจ';
    
}
$this->breadcrumbs=array(
        'เกี่ยวกับเรา'=>array('&id=1'),
	'ผู้บริหารวิทยาลัยการบริหารรัฐกิจ'=>array('executive'),
        $model->name_th
);


?>
<div id="page6">
  <div class="main">
    <div class="wrapper">
      <article class="col-1">
        <div class="indent-left">            
           <?php $this->renderPartial('/about/about_menu');?>
        </div>
      </article>
      <article class="col-2">
          <h3>ผู้บริหารวิทยาลัยการบริหารรัฐกิจ</h3>
          <div class="wrapper indent-bot">
            <figure class="img-indent"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/executives/<?php echo $model->image;?>" width="100px"/></figure>
            <div class="extra-wrap">
              <h6><?php echo $model->name_th;?></h6>
              <p>ตำแหน่ง : <?php echo $model->position_th;?>
              <br/>ข้อมูลเพิ่มเติม : <br/><?php echo $model->detail_th;?></p>
            </div>
          </div>
        </article>
      
    </div>
  </div>
</div>