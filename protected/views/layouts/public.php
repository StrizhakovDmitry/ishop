<!DOCTYPE html>
<html>
<head>
<?php


?>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ishop.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lightbox/css/lightbox.css"> 
</head>
<body>
<div class="container">
<?echo $content;?>
</div>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/lightbox/js/lightbox.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ishop.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/js/jquery.cookie.js"></script>
</body>
</html>