<?php
/* @var $this CategoryController */
/* @var $model IshopCategory */

$this->breadcrumbs=array(
	'Ishop Categories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List IshopCategory', 'url'=>array('index')),
	array('label'=>'Create IshopCategory', 'url'=>array('create')),
	array('label'=>'View IshopCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage IshopCategory', 'url'=>array('admin')),
);
?>

<h1>Update IshopCategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>