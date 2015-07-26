        <div class="navbar">
          <div class="navbar-inner">
             <ul class="nav">
              <li class="active"><a href="<?php echo Yii::app()->request->baseUrl; ?>/main/">Товары</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/main/basket">Корзина <span id="purchases"></span></a></li>
			  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/main/contacts">Контакты</a></li>
            </ul>
          </div>
        </div>
<div class="row">
  <div class="span2"><?php echo $this->CategoriesMenu;?></div>
  <div class="span8"><?php// echo $this->ItemsBlock;?>
  	<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'application.views.main._item',

)); ?>
  	
  	
  </div>


</div>