<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Page Missing';
$this->breadcrumbs=array(
	'Page Missing',
);
?>
<div id="content">
    <div id="page3">
      <div class="main" style="height:auto;padding: 100px;text-align: center;">       
            <h2>Error <?php echo $code; ?></h2>

            <div class="error">
            <?php echo CHtml::encode($message); ?>
            </div>

        </div>
    </div>
</div>

