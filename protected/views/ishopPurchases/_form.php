<?php
/* @var $this IshopPurchasesController */
/* @var $model IshopPurchases */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ishop-purchases-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'telnum'); ?>
        <?php echo $form->textField($model, 'telnum', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'telnum'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'comment'); ?>
        <?php echo $form->textField($model, 'comment', array('size' => 60, 'maxlength' => 1024)); ?>
        <?php echo $form->error($model, 'comment'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'parametrs'); ?>
        <?php echo $form->textField($model, 'parametrs', array('size' => 60, 'maxlength' => 1024)); ?>
        <?php echo $form->error($model, 'parametrs'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'createtime'); ?>
        <?php echo $form->textField($model, 'createtime'); ?>
        <?php echo $form->error($model, 'createtime'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'totalPrice'); ?>
        <?php echo $form->textField($model, 'totalPrice'); ?>
        <?php echo $form->error($model, 'totalPrice'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->