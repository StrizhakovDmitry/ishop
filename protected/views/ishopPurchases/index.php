<?php
/* @var $this IshopPurchasesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Ishop Purchases',
);

$this->menu = array(
    array('label' => 'Create IshopPurchases', 'url' => array('create')),
    array('label' => 'Manage IshopPurchases', 'url' => array('admin')),
);
?>

<h1>Ishop Purchases</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
