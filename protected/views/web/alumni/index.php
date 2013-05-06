<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Alumni';
    $this->breadcrumbs=array(
        'About Us'=>array('index', 'id'=>'1'),
        'Alumni'

    );
    $header = "GSPA Alumni";
    $position_text = "Position";
    $major_text = "Major";
    $campus_text ="Campus";
    $info_text = "More Detail";
 
}else{
    $this->pageTitle=Yii::app()->name . ' - ทำเนียบศิษย์เก่า';
    $this->breadcrumbs=array(
        'เกี่ยวกับเรา'=>array('index', 'id'=>'1'),
        'ทำเนียบศิษย์เก่า'

    );
    $header = "ทำเนียบศิษย์เก่า";
    $position_text = "ตำแหน่ง";
    $major_text = "สาขาวิชา";
    $campus_text = "ศูนย์การศึกษา";
    $info_text = "ข้อมูลเพิ่มเติม";
}

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
          <div style="margin-bottom: 10px;">
            <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links'=>$this->breadcrumbs,
                    )); ?><!-- breadcrumbs -->
            <?php endif?>
          </div>
          <h3><?php echo $header;?></h3>
          <?php foreach ($model as $value){
               if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                    $name = $value->name_en;
                    $major = $value->major_en;
                    $campus = $value->campus_en;
                    $position = $value->position_en;
                    
                }else{
                    $name = $value->name_th;  
                    $major = $value->major_th;
                    $campus = $value->campus_th;
                    $position = $value->position_th;
                }
          ?>
          <div class="wrapper indent-bot">
            <figure class="img-indent"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/alumni/<?php echo $value->image;?>" width="100px"/></figure>
            <div class="extra-wrap">
              <h6><?php echo $name;?></h6>
              <p><?php echo $major_text;?> : <?php echo $major;?><br/>
              <?php echo $campus_text;?> : <?php echo $campus;?><br/>
              <?php echo $position_text;?> : <?php echo $position;?><br/>
              <span class="small"><a href="<?php echo Yii::app()->createUrl('alumni', array('id'=>$value->alumni_id)); ?>"><?php echo $info_text;?></a></span></p>
             </div>
          </div>
          <?php }?>
        </article>
      
    </div>
  </div>
</div>