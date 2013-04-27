<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name. ' - เอกสารประกอบการเรียน';
?>
<?php
/* @var $this ProgramController */

$this->breadcrumbs=array(
	'เอกสารประกอบการเรียน',
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
          <h3>เอกสารประกอบการเรียน</h3>
          <div class="TableBlue" >
          <table>
              <tr>
                  <td width="5%">ลำดับ</td>
                  <td>ชื่อเอกสาร</td>
                  <td width="15%">วันที่ปรับปรุง</td>
                  <td width="12%">ผู้เข้าชม</td>
              </tr>
               <?php $count=1; ?>
               <?php foreach ($model as $value){?>
              <tr>
                  <td align="center"><?php echo $count;?></td>
                  <td><a href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/documents/<?php echo $value->pdf_th; ?>"><?php echo $value->name_th;?></a></td>
                  <td align="center"><?php echo $value->last_update;?></td>
                  <td align="center"><?php echo $value->counter;?></td>
              </tr>
              <?php $count++; }?>
          </table>
          </div>
        </article>
      
    </div>
  </div>
</section>
</div>