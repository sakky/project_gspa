<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    if($model->alumni_group == 'Master'){
        $group = "Master Degree";
        $url = "master";
    }else{
        $group = "Doctorate Degree";
        $url = "doctor";
    }
    $this->pageTitle='Graduate School of Public Administration - Alumni';
    $this->breadcrumbs=array(
        'Alumni'=>array('index'),
        $group=>array($url),        
        $model->alumniType->name_en=>array('index','type_id'=>$model->alumni_no_id),
        $model->name_en

    );
    $header = "GSPA Alumni";
    $position_text = "Position";
    $major_text = "Major";
    $campus_text ="Campus";
    $info_text = "More Detail";
    $name = $model->name_en;
    $major = $model->major_en;
    $campus = $model->campus_en;
    $position = $model->position_en;
    $desc = $model->desc_en;
 
}else{
    $this->pageTitle=Yii::app()->name . ' - ทำเนียบนิสิต';
    if($model->alumni_group == 'Master'){
        $group = "ปริญญาโท";
        $url = "master";
    }else{
        $group = "ปริญญาเอก";
        $url = "doctor";
    }    
    $this->breadcrumbs=array(
        'ทำเนียบนิสิต'=>array('index'),
         $group=>array($url),
         $model->alumniType->name_th=>array('index','type_id'=>$model->alumni_no_id),        
         $model->name_th

    );
    $header = "ทำเนียบนิสิต";
    $position_text = "ตำแหน่ง";
    $major_text = "สาขาวิชา";
    $campus_text = "ศูนย์การศึกษา";
    $info_text = "ข้อมูลเพิ่มเติม";
    $name = $model->name_th;
    $major = $model->major_th;
    $campus = $model->campus_th;
    $position = $model->position_th;
    $desc = $model->desc_th;
}

?>
<div id="page6">
  <div class="main">
    <div class="wrapper">
      <article class="col-1">
        <div class="indent-left">
          <?php $this->renderPartial('/alumni/leftmenu');?>
        </div>
      </article>
      <article class="col-2">
          <div style="margin-bottom: 10px;">
            <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links'=>$this->breadcrumbs,
                    )); ?><!-- breadcrumbs -->
            <?php endif?>
          </div>
          <h3><?php echo $header;?></h3>
          <div class="wrapper indent-bot">
            <figure class="img-indent"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/alumni/<?php echo $model->image;?>" width="100px"/></figure>
            <div class="extra-wrap">
              <h6><?php echo $name;?></h6>
              <p><?php echo $major_text;?> : <?php echo $major;?><br/>
              <?php echo $campus_text;?> : <?php echo $campus;?><br/>
              <?php echo $position_text;?> : <?php echo $position;?><br/>
              <?php echo $info_text;?> : <br/><?php echo $desc;?></p>
            </div>
          </div>          
      </article>      
    </div>
  </div>
</div>