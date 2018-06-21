$(document).ready(function(){
	$('.drop-actions .drop-down').on('click', function(e){
		e.preventDefault();
		$(this).parent().toggleClass('open');
	});
	
	// Hide menu
	$('body').on('click', ':not(.drop-actions)', function() {
		//$('.drop-actions').hide();
	});

	
	$('.control-userpanel a.lever').on('click', function(e){
		e.preventDefault();
		selfParent = $(this).parent();
		if(!selfParent.hasClass('opened')){
			$(this).parent().animate({'margin-right':0},300).addClass('opened');
		} else {
			$(this).parent().animate({'margin-right':-150},300).removeClass('opened');
		}
	});
});