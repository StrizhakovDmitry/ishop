<?php
/* @var $this ItemsController */
/* @var $model IshopItem */

$this->breadcrumbs = array(
    'Ishop Items' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List IshopItem', 'url' => array('index')),
    array('label' => 'Create IshopItem', 'url' => array('create')),
    array('label' => 'Update IshopItem', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete IshopItem', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage IshopItem', 'url' => array('admin')),
);
?>

<h1>View IshopItem #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'category_id',
        'title',
        'parametrs',
        'description',
        'tags',
        'price',
        array('label' => $model->getAttributeLabels('mainimage'), 'value' => '', 'template' => "<tr class=\"{class}\"><th>{label}</th><td>$model->MainImageHTML</td></tr>\n",),
        array('label' => $model->getAttributeLabels('images'), 'value' => '', 'template' => "<tr class=\"{class}\"><th>{label}</th><td>$model->ImagesHTML</td></tr>\n",),

    ),
)); ?>
<?php
//echo $model->images.'<br><pre>';
//echo '<pre>';
//var_dump($model->advertImages[0]->image);
//echo $model->imagesHTML;
//	echo $model->mainimage;

?>
 