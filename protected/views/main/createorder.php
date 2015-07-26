        <div class="navbar noPrint">
          <div class="navbar-inner">
             <ul class="nav">
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/main/">Товары</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/main/basket">Корзина <span id="purchases"></span></a></li>
			  <li><a class="active" href="<?php echo Yii::app()->request->baseUrl; ?>/main/contacts">Контакты</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
        	<div class="span1"></div>
        	<div class="span10">
        		<div id="thanksForOrder">Спасибо за заказ, в ближайшее время наши сотрудники свяжутся с вами !</div>
        		<table id="order">
        			<thead>
	        			<tr>
	  						<th >№</th>
	  						<th>Арт.</th>
	  						<th>Наименование</th>
	  						<th>Кол-во</th>
	  						<th>Цена</th>
	        			</tr>
        			</thead>
        			<tbody>
        				<?php
        				echo $this->getOrderTableBodyHTML($model);
        				?>
        			</tbody>
        			<tfoot id="OrderTFoot">
        				<tr>
	        				<td colspan="3"><p style="margin-top:10px;text-align:left;">Заказ № <?php echo $model->id?> создан <?php echo date('G:i d.m.Y',$model->createtime)?></p></td>
	        				<td colspan="2"><p style="margin-top:10px;text-align:right;" >Сумма: <?php echo $model->totalPrice; ?> Рублей</p></td>
        				</tr>
        				<tr>
        					<td colspan="4" style="text-align:right"></td>
        					<td class="noPrint"><button onclick="print()" class="btn">Напечатать <i class="fa fa-print"></i></button></td>
        				</tr>
        			</tfoot>
        		</table>
        		
        		<div class="span1"></div>
        		
        	</div>

		</div>