<?php
/* @var $this ItemsController */
/* @var $model IshopItem */

$this->breadcrumbs=array(
	'Товары'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List IshopItem', 'url'=>array('index')),
	array('label'=>'Manage IshopItem', 'url'=>array('admin')),
);
?>

<h1>Create IshopItem</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
