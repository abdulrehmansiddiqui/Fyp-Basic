jQuery(document).ready(function($) {
	
	/*define easing you can omit this if 
	you don't want to use the easing plugin*/
jQuery.easing.def = "easeInOutBack";	

	/* create the span tht will be animated across the menu*/
	/* declare our many variables for easy ref*/
		var $span = $('<span class="colourful"></span>');
		$span.insertBefore($("#menu ul"));
		
		var $menu_link = $('#menu li a'),
		$hovered =  $('#menu a.hovered'),/**/
		$hovered_pos = $hovered.position('#menu');/*position of hovered menu item*/
		
		/* declare our many colors that can confuse a chameleon*/
		var $colour_arr = ['#3a97fa', '#3a97fa', '#3a97fa', '#3a97fa', '#3a97fa', '#3a97fa', '#3a97fa', '#3a97fa', '#3a97fa'];
		
		/*iterate through all menu links and apply colors to border top */
		$menu_link.each(function(index){
			
					$menu_link.eq(index).css('border-color',$colour_arr[index]);
				
			});	
			
	/* all the magic happens here*/
	function init () {
		
		if($hovered_pos) {
				$span.css('left',$hovered_pos);
				var index = 0;
				/* search for the selected menu item*/
				for(i=0; i<$menu_link.length; i++) {
					if($($menu_link[i]).hasClass('hovered')) {
						index = i;
					}
				}
				$span.css('background',$colour_arr[index]);
				
		}
		
		/*mouseenter funtion*/
		$menu_link.each(
			function( intIndex ){
				$(this).on (
					"mouseenter",
						function(event){
							
							var x = $(this).position('#menu');
							x = x.left;
							
								$span.css('background',$colour_arr[intIndex]);
							
							$span.stop();
							$span.animate({
								
								left: x
							  },600);
						}
					);
		 
				}
		 );
		 
		/* mouseout function*/
		$menu_link.each(
			function( intIndex ){
				$(this).on (
					"mouseleave",
						function(event){
							$span.stop();
						var x = -100;
						if($hovered_pos) {
							x = $hovered_pos;
							var index = 0;
							for(i=0; i<$menu_link.length; i++) {
								if($($menu_link[i]).hasClass('hovered')) {
									index = i;
								}
							}
								$span.css('background',colour_arr[index]);
							
						} 
						
		  				$span.animate({
								
								left: x
							  },600);
						}
					);
				}
		 );
	}
	/* call init our function*/
	init();
});
