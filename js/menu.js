$(document).ready(main);
 
function main(){
	$('#pantalla').val($(window).width());
	var contador = 0;
	$('#abierto').val("");
	$(window).resize(function(){
		$('#pantalla').val($(window).width());
		if (contador === 1) {
			$('nav').animate({
				right: '-100%'
			});
			$('#icono_menu').removeClass("icon-cross");
			$('#icono_menu').addClass("icon-menu");
			contador = 0;
		}
		$('.submenu').each(function(){
			if($(this).attr('name') === $('#abierto').val()){
				if($(this).val() === 1){
					$(this).children('.sub').slideToggle();
					$(this).val(0);
					$('#abierto').val("");
				}
			}
		});
	});
	$('.menu-mobile').click(function(){
		if (contador === 0) {
			$('nav').animate({
				right: '0'
			});
			$('#icono_menu').removeClass("icon-menu");
			$('#icono_menu').addClass("icon-cross");
			contador = 1;
		} else {
			$('nav').animate({
				right: '-100%'
			});
			$('#icono_menu').removeClass("icon-cross");
			$('#icono_menu').addClass("icon-menu");
			contador = 0;
		}
		$('.submenu').each(function(){
			if($(this).attr('name') === $('#abierto').val()){
				if($(this).val() === 1){
					$(this).children('.sub').slideToggle();
					$(this).val(0);
					$('#abierto').val("");
				}
			}
		});
	});
	$('.submenu').click(function(){
			if($(this).attr('name') === $('#abierto').val()){
				$('abierto').val("");
				$(this).val(0);
			}else{
				$('#abierto').val($(this).attr('name'));
				$(this).val(1);
			}
			$(this).children('.sub').slideToggle();
			$('.submenu').each(function(){
				if($(this).attr('name') !== $('#abierto').val()){
					if($(this).val() === 1){
						$(this).children('.sub').slideToggle();
						$(this).val(0);
					}
				}
			});
	});
	$('.sub').click(function(e){
		if($('#pantalla').val() < 768){
			e.stopPropagation();
			$('.menu-mobile').trigger('click');
		}
	});
	$('.menu').click(function(){
		if($('#pantalla').val() < 768){
			$('.menu-mobile').trigger('click');
		}
	});
}