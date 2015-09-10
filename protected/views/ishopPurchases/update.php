<?php
/* @var $this IshopPurchasesController */
/* @var $model IshopPurchases */

$this->breadcrumbs = array(
    'Ishop Purchases' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List IshopPurchases', 'url' => array('index')),
    array('label' => 'Create IshopPurchases', 'url' => array('create')),
    array('label' => 'View IshopPurchases', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage IshopPurchases', 'url' => array('admin')),
);
?>

    <h1>Update IshopPurchases <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>