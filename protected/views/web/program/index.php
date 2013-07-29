<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Programs';
    $this->breadcrumbs=array(
        'About Us'=>array('about/index', 'id'=>'1'),
        'Academic Cooperation'=>array('/cooperation'),

    );
    $header = "Programs";



 
}else{
    $this->pageTitle=Yii::app()->name . ' - หลักสูตรที่เปิดสอน';
    $this->breadcrumbs=array(
        'เกี่ยวกับเรา'=>array('about/index', 'id'=>'1'),
        'ความร่วมมือทางวิชาการ'=>array('/cooperation'),
    );
    $header = "หลักสูตรที่เปิดสอน";



}

?>
<div id="page6">
  <div class="main">
    <div class="wrapper">
      <article class="col-1">
        <div class="indent-left">
          <?php $this->renderPartial('leftmenu');?>
        </div>
      </article>
      <article class="col-2">
          <h3>หลักสูตรที่เปิดสอน</h3>
          <h4>หลักสูตรปริญญาโท</h4>
            <ul class="list-4">
                <?php foreach ($master as $value){?>
                    <li><a href="<?php echo Yii::app()->createUrl('program', array('id'=>$value->program_id)); ?>"><?php echo $value->name_th;?></a></li>
                <?php }?>
            </ul>
          
          <h4>หลักสูตรปริญญาเอก</h4>
             <ul class="list-4">
                <?php foreach ($doctor as $value2){?>
                    <li><a href="<?php echo Yii::app()->createUrl('program', array('id'=>$value->program_id)); ?>"><?php echo $value2->name_th;?></a></li>
                <?php }?>
             </ul>
        </article>
      
    </div>
  </div>
</div>