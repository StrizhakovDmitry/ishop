<?php
/* @var $this CategoryController */
/* @var $model IshopCategory */

$this->breadcrumbs = array(
    'Ishop Categories' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List IshopCategory', 'url' => array('index')),
    array('label' => 'Create IshopCategory', 'url' => array('create')),
    array('label' => 'Update IshopCategory', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete IshopCategory', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage IshopCategory', 'url' => array('admin')),
);
?>

<h1>View IshopCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'transcript',
    ),
)); ?>
