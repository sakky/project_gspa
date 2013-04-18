<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Sign Up';
?>
<?php echo $this->renderPartial('_form', array('model'=>$model,'password_not_match'=>$password_not_match,'password_confirm'=>$password_confirm)); ?>

