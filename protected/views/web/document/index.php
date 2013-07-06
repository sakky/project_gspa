<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Download';
    if($type->doc_type_id){
        $this->breadcrumbs=array(
                'Download'=>array('index'),
                $type->name_en
        );
    }else{
        $this->breadcrumbs=array(
                'Download',
        );
    }
    $header = "Download :: ".$type->name_en;
    $td1_header = "No.";
    $td2_header = "Topic";
    $td3_header = "Last Updated";
    $td4_header = "Visitors";
}else{
    $this->pageTitle=Yii::app()->name. ' - สื่อเผยแพร่/ดาวน์โหลด';
    if($type->doc_type_id){
        $this->breadcrumbs=array(
                'สื่อเผยแพร่/ดาวน์โหลด'=>array('index'),
                $type->name_th
        );
    }else{
        $this->breadcrumbs=array(
                'สื่อเผยแพร่/ดาวน์โหลด',
        );
    }    
    $header = "สื่อเผยแพร่/ดาวน์โหลด :: ".$type->name_th;
    $td1_header = "ลำดับ";
    $td2_header = "สื่อเผยแพร่/ดาวน์โหลด";
    $td3_header = "วันที่ปรับปรุง";
    $td4_header = "ผู้เข้าชม";
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
           <div style="margin-bottom: 10px;">
            <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links'=>$this->breadcrumbs,
                    )); ?><!-- breadcrumbs -->
            <?php endif?>
          </div>
          <h3><?php echo $header;?></h3>
          <div class="TableBlue" >
          <table>
              <tr>
                  <td width="5%"><?php echo $td1_header;?></td>
                  <td><?php echo $td2_header;?></td>
                  <td width="15%"><?php echo $td3_header;?></td>
<!--                  <td width="12%"><?php echo $td4_header;?></td>-->
              </tr>
               <?php $count=1; ?>
               <?php foreach ($model as $value){
                   if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                       $name = $value->name_en;
                       $pdf = $value->pdf_en;
                       $updated = date('d M Y',strtotime($value->last_update));
                   }else{
                       $name = $value->name_th;
                       $pdf = $value->pdf_th;
                       $updated = $this->thai_date(strtotime($value->last_update));
                   }
               ?>
              <tr>
                  <td align="center"><?php echo $count;?></td>
                  <td><a href="<?php echo Yii::app()->createUrl('document', array('id'=>$value->doc_id)); ?>"><?php echo $name;?></a></td>
                  <td align="center"><?php echo $updated;?></td>
<!--                  <td align="center"><?php echo $value->counter;?></td>-->
              </tr>
              <?php $count++; }?>
          </table>
          </div>
        </article>
      
    </div>
  </div>
</div>