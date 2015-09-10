<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav">
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/main/">Товары</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/main/basket">Корзина <span
                        id="purchases"></span></a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/main/contacts">Контакты</a></li>
        </ul>
    </div>
</div>
<div class=row>
    <div class=span12><h3><?php echo $model->title; ?></h3></div>
    <div class=span6><img
            src="<?php echo Yii::app()->request->baseUrl . '/upload/' . $model->images . '/' . $model->mainimage; ?>">
    </div>
    <div class=span6>
        <h4><?php echo $model->price; ?> <i class="fa fa-rub"></i></h4>
        <button id="buttonInBasket" class="btn btn-success">В корзину <i class="fa fa-shopping-cart"></i></button>

        <h4>Основные характеристики</h4>

        <p><?php echo $model->ParametrsTableHTML; ?></p>
    </div>
    <div id="qwert" class="span12">

        <?php echo $this->getImagesHTML($model->id); ?>

    </div>
    <div class=span12>
        <h3>Описание</h3>

        <p><?php echo $model->description; ?></p>
    </div>


</div>