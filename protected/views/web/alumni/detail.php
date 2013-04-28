<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name. ' - ศิษย์เก่าดีเด่น';;
?>
<?php
/* @var $this ProgramController */

$this->breadcrumbs=array(
        'ศิษย์เก่าดีเด่น'=>array('index'),
        $model->name_th,
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
          <h3>ศิษย์เก่าดีเด่น</h3>
          <div class="wrapper indent-bot">
            <figure class="img-indent"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/alumni/<?php echo $model->image;?>" width="100px"/></figure>
            <div class="extra-wrap">
              <h6><?php echo $model->name_th;?></h6>
              <p>สาขาวิชา : <?php echo $model->major_th;?><br/>
              ศูนย์การศึกษา : <?php echo $model->campus_th;?><br/>
              ตำแหน่ง : <?php echo $model->position_th;?><br/>
              ข้อมูลเพิ่มเติม : <br/><?php echo $model->desc_th;?></p>
            </div>
          </div>          
      </article>      
    </div>
  </div>
</div>