<?php
/* @var $this ItemsController */
/* @var $model IshopItem */

$this->breadcrumbs = array(
    'Ishop Items' => array('index'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List IshopItem', 'url' => array('index')),
    array('label' => 'Create IshopItem', 'url' => array('create')),
    array('label' => 'View IshopItem', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage IshopItem', 'url' => array('admin')),
);
?>

    <h1>Update IshopItem <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_updateForm', array('model' => $model)); ?>