<?php
/* @var $this IshopPurchasesController */
/* @var $model IshopPurchases */

$this->breadcrumbs=array(
	'Ishop Purchases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List IshopPurchases', 'url'=>array('index')),
	array('label'=>'Create IshopPurchases', 'url'=>array('create')),
	array('label'=>'Update IshopPurchases', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete IshopPurchases', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage IshopPurchases', 'url'=>array('admin')),
);
?>

<h1>View IshopPurchases #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'telnum',
		'comment',
		'parametrs',
		'createtime'=>array(
		'label'=>'создан',
		'value'=>date('G:i d.m.Y',$model->createtime),
		),
		'totalPrice',
	),
)); ?>
