$(function(){
	purchasesIconRenew();
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
	function purchasesIconRenew()
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

	
		


	
	
	
})

	function clearBasket(){
		$.removeCookie('purchases', { path: '/ishop/' });
		window.location.href="/ishop/main/basket/";
		}

