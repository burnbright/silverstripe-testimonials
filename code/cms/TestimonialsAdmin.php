<?php

class TestimonialsAdmin extends ModelAdmin{

	private static $url_segment = 'testimonials';
	private static $menu_icon = 'testimonials/images/testimonials-icon.png';

	private static $managed_models = array(
		'Testimonial'
	);
	
}
