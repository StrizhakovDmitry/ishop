<?php
/* @var $this IshopPurchasesController */
/* @var $model IshopPurchases */

$this->breadcrumbs=array(
	'Ishop Purchases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List IshopPurchases', 'url'=>array('index')),
	array('label'=>'Manage IshopPurchases', 'url'=>array('admin')),
);
?>

<h1>Create IshopPurchases</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>