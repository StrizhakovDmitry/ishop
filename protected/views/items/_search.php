<?php
/* @var $this ItemsController */
/* @var $model IshopItem */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php echo $form->textField($model, 'id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'category_id'); ?>
        <?php echo $form->textField($model, 'category_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 1024)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'parametrs'); ?>
        <?php echo $form->textField($model, 'parametrs', array('size' => 60, 'maxlength' => 1024)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'description'); ?>
        <?php echo $form->textField($model, 'description', array('size' => 60, 'maxlength' => 1024)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'tags'); ?>
        <?php echo $form->textField($model, 'tags', array('size' => 60, 'maxlength' => 1024)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'price'); ?>
        <?php echo $form->textField($model, 'price'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'images'); ?>
        <?php echo $form->textField($model, 'images', array('size' => 60, 'maxlength' => 1024)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->