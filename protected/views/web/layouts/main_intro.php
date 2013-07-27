<!DOCTYPE html>
<html lang="th">
<head>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta charset="utf-8">
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/intro.css" type="text/css" media="screen">

<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front/ie.css" type="text/css" media="screen">
<![endif]-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/Scripts/AC_ActiveX.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<?php
$curpage = Yii::app()->getController()->getAction()->controller->id;
$curpage .= '/'.Yii::app()->getController()->getAction()->controller->action->id;
//echo $curpage;
if(Yii::app()->language == 'en_us'){
   Yii::app()->language = 'en' ;
}

$lang = Yii::app()->language;
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){

}else{

}
//echo Yii::app()->controller->getId();
//echo "<br/>";
//echo Yii::app()->controller->getAction()->getId();
//echo "<br/>";
//echo Yii::app()->createUrl(Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId(), $_GET);
?>
<body>
<!--==============================content================================-->
<?php echo $content;?>


</body>
</html>