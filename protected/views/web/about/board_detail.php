<?php
if((isset($_GET['lang']))&&($_GET['lang'] =='en')){
    $this->pageTitle=Yii::app()->name . ' - Board';
 
}else{
    $this->pageTitle=Yii::app()->name . ' - คณะกรรมการประจำวิทยาลัย';
    
}
$this->breadcrumbs=array(
        'เกี่ยวกับเรา'=>array('&id=1'),
	'คณะกรรมการประจำวิทยาลัย'=>array('board'),
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
          <h3>คณะกรรมการประจำวิทยาลัยการบริหารรัฐกิจ</h3>
         
          <div class="wrapper indent-bot">
            <figure class="img-indent"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/boards/<?php echo $model->image;?>" width="100px"/></figure>
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