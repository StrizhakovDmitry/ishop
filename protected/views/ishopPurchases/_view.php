<?php
/* @var $this IshopPurchasesController */
/* @var $data IshopPurchases */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('telnum')); ?>:</b>
    <?php echo CHtml::encode($data->telnum); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
    <?php echo CHtml::encode($data->comment); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('parametrs')); ?>:</b>
    <?php echo CHtml::encode($data->parametrs); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('createtime')); ?>:</b>
    <?php echo CHtml::encode($data->createtime); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('totalPrice')); ?>:</b>
    <?php echo CHtml::encode($data->totalPrice); ?>
    <br/>


</div>