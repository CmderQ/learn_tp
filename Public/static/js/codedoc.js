
$(function(){
	var $menu = $('#side_menu');
	$menu.affix({
		offset: {
			top: function() {
				var top = $menu.offset().top,
					childTop = parseInt($menu.children(0).css('margin-top'), 10),
					height = $('.bs-docs-nav').height();
				return this.top = top - height - childTop;
			},
			bottom: function() {
				return this.bottom = 0;
			}
		}
	});

	$.scrollUp({
		scrollName: "scrollUp",
		topDistance: "300",
		topSpeed: 300,
		animation: "fade",
		animationInSpeed: 200,
		animationOutSpeed: 200,
		scrollText: '<i class="fa fa-angle-up"></i>',
		activeOverlay: !1
	});

	prettyPrint();
});