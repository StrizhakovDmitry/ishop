<?php
/* @var $this ItemsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Ishop Items',
);

$this->menu = array(
    array('label' => 'Create IshopItem', 'url' => array('create')),
    array('label' => 'Manage IshopItem', 'url' => array('admin')),
);
?>
<?

?>

<h1>Товары</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
