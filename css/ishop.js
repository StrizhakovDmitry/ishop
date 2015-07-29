$(function(){
	purchasesIconRenew();
	remoweIntemBasket();
	$('#buttonInBasket').click(function(){
		var IntemNumber = $.cookie('itemNumber');
			//----------------------------------------//добавляет покупки
			if (!$.cookie('purchases')) 
			{
				purchases = new Object;
				purchases[IntemNumber]=1;
				$.cookie('purchases', JSON.stringify(purchases),{path: '/ishop/',expires: 7});
				purchasesIconRenew();
			}
			else
			{
				purchases=JSON.parse($.cookie('purchases'));
				if (purchases[IntemNumber]){
					purchases[IntemNumber]++;
				}
				else{
					purchases[IntemNumber]=1;
				}

				$.cookie('purchases', JSON.stringify(purchases),{path: '/ishop/',expires: 7});
				purchasesIconRenew();
			}
			//----------------------------------------//
	});
	function purchasesIconRenew() //обновляет иконку количества покупок главного меню в зависимости от куки purchases
		{
			if ($.cookie('purchases')) {
				//alert("sdvdsavdsa");
				purchases=JSON.parse($.cookie('purchases'));
				var sum=0;
				for( var i in purchases)
				{
					sum+=purchases[i];
				}
					$('#purchases').html('<button id="purchasesBtn" class="button  btn-warning"><div id="purchasesBtnNumber">'+sum+'</div></button>');
			}
		}		
	function remoweIntemBasket(){ //делает активными кнопки удаления покупок из корзины
		$('.delelteIntemBasket').click(function (){
			purchases = JSON.parse($.cookie('purchases'));
			delete purchases[$(this).parent().parent().children().eq(1).html()];
			if (Object.keys(purchases).length != 0){
				$(this).parent().parent().remove();
				$.cookie('purchases', JSON.stringify(purchases),{path: '/ishop/',expires: 7});
				var i=0;
				$('.basketTable tbody tr').each(function(){i+=$(this).children().eq(3).html()*$(this).children().eq(4).html()});
				$('#TotalPrice').html('Сумма: '+i+' руб.'); 
				purchasesIconRenew();
			
			
			}
			else
			{
				$.removeCookie('purchases',{path: '/ishop/'});
				$('#TotalPrice').remove();
				$('.basketTable').remove();
				$('#purchases').remove();
				$('.content').html('<h3>Ваша корзина пуста</h3>');
			}
		})

	}
	
		


	
	
	
})

	function clearBasket(){
		$.removeCookie('purchases', { path: '/ishop/' });
		window.location.href="/ishop/main/basket/";
		}


