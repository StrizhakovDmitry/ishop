<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav">
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/main/">Товары</a></li>
            <li class="active"><a href="<?php echo Yii::app()->request->baseUrl; ?>/main/basket">Корзина <span
                        id="purchases"></span></a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/main/contacts">Контакты</a></li>
        </ul>
    </div>
</div>
<?php
echo $this->getPurchasesTable();
?>
<?php if ($cookie = Yii::app()->request->cookies['purchases']->value): ?>
<div class="content">
	<div class="row">
		<div class="span8"></div>
		<div class="span4">
			
			<table class="table">
				<form method="post" action="/ishop/main/createorder">
 				<tr><td><div>Телефон</td><td><input required name="purchase[telnum]" type="text"></div></td></tr>
 				<tr><td><div>Комментарий</td><td><textarea name="purchase[comment]" class="form-control" rows="3" id="comment"></textarea></div></td></tr>
				<tr><td><div></td><td><input style="width:100%" type="submit" class="btn btn-success" value="Сделать заказ"></div></td></tr>
				</form>
				<tr><td><div></td><td><button style="width:100%" onclick="clearBasket()" class="btn btn-danger">Очистить корзину</button></div></td></tr>
				
			</table>
			
			<table class="table">
			
			</table>
		</div>
	</div>
</div>
<?php endif; ?>