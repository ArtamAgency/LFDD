$(document).ready(function(){

	$('.tlt').textillate({
		in: {
			effect: 'bounceInDown',
			callback: function(){
				$('nav').find('a').removeClass('tlt');
			}
		}
	});


	$('nav').find('a').mouseover(function(){
		$(this).css('transform', 'scale(0.95)');
	});
	$('nav').find('a').mouseout(function(){
		$(this).css('transform', 'scale(1)');
	});


	$('.valider').mouseover(function(){
		$(this).css('transform', 'scale(0.98)');
	});
	$('.valider').mouseout(function(){
		$(this).css('transform', 'scale(1)');
	});
	$('.valider').click(function(){
		$(this).css('transform', 'scale(0.95)').one('transitionend', function(){
			$(this).css('transform', 'scale(1)');
		});
	});

	
});