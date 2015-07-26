<?php
/* @var $this CategoryController */
/* @var $model IshopCategory */

$this->breadcrumbs=array(
	'Ishop Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List IshopCategory', 'url'=>array('index')),
	array('label'=>'Manage IshopCategory', 'url'=>array('admin')),
);
?>

<h1>Create IshopCategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>