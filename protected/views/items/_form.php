<div class="form">
    <?php echo CHtml::errorSummary($model) ?>
    <?php echo CHtml::beginForm('', 'post', array('enctype' => 'multipart/form-data')); ?>
    <div class="row">
        <?php echo CHtml::activeLabel($model, 'category_id') ?>
        <?php echo CHtml::dropDownList('IshopItem[category_id]', 'category_id',/*IshopCategory::getCategories()*/
            '123sd') ?>
        <?php echo CHtml::error($model, 'category_id') ?>
    </div>
    <div class="row">
        <?php echo CHtml::activeLabel($model, 'title') ?>
        <?php echo CHtml::activeTextField($model, 'title', array('size' => 60, 'maxlength' => 1024)) ?>
        <?php echo CHtml::error($model, 'title') ?>
    </div>
    <div class="row">
        <?php echo CHtml::activeLabel($model, 'description') ?>
        <?php echo CHtml::activeTextArea($model, 'description', array('size' => 60, 'maxlength' => 1024)) ?>
        <?php echo CHtml::error($model, 'description') ?>
    </div>
    <div class="row">
        <?php echo CHtml::activeLabel($model, 'parametrs') ?>
        <?php echo CHtml::activeTextArea($model, 'parametrs', array('size' => 60, 'maxlength' => 1024)) ?><img
            style="position:relative;top:2px;left:7px" title=Пример:"Ширина:30см,Цвет:синий,Вес:10кг"
            src="/ishop/images/question.png">
        <?php echo CHtml::error($model, 'parametrs') ?>
    </div>
    <div class="row">
        <?php echo CHtml::activeLabel($model, 'tags') ?>
        <?php echo CHtml::activeTextField($model, 'tags', array('size' => 60, 'maxlength' => 1024)) ?><img
            style="position:relative;top:2px;left:7px" title=Пример:"Смартфоны,Galaxy,S4,Белый"
            src="/ishop/images/question.png">
        <?php echo CHtml::error($model, 'tags') ?>
    </div>
    <div class="row">
        <?php echo CHtml::activeLabel($model, 'price') ?>
        <?php echo CHtml::activeTextField($model, 'price', array('size' => 60, 'maxlength' => 1024)) ?>
        <?php echo CHtml::error($model, 'price') ?>
    </div>
    <div class="row">
        <?php echo CHtml::activeLabel($model, 'Загрузка главного изображения') ?>
        <?php echo CHtml::activeFileField($model, 'mainimage'); ?>
        <?php echo CHtml::error($model, 'mainimage') ?>
    </div>
    <div class="row">
        <?php echo CHtml::activeLabel($model, 'Загрузка дополнительных изображений') ?>
        <?php echo CHtml::activeFileField($model, 'images', array('multiple' => 'true', 'min' => '1', 'max' => '1000', 'name' => 'images[]')); ?>
        <?php echo CHtml::error($model, 'images') ?>
    </div>
    <div class="row">
        <?php echo CHtml::submitButton('Сохранить'); ?>
    </div>
    <?php echo CHtml::endForm(); ?>
</div>
<? ?>