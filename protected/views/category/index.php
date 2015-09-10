<?php
/* @var $this CategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Ishop Categories',
);

$this->menu = array(
    array('label' => 'Create IshopCategory', 'url' => array('create')),
    array('label' => 'Manage IshopCategory', 'url' => array('admin')),
);
?>

<h1>Ishop Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
