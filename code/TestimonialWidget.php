<?php

class TestimonialWidget extends Widget {

	private static $title = "Testimonial";
	private static $cmsTitle = "Testimonial";
	private static $description = "Displays a random testimonial from the database";

	private static $has_one = array(
		'Page' => 'TestimonialsHolderPage'
	);

	protected $testimonial;

	function getTestimonial(){
		if(!$this->testimonial){
			$this->testimonial = Testimonial::get()->sort("RAND()")->first();
		}
		return $this->testimonial;
	}

	function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->push(
			DropdownField::create("PageID","Testimonials Holder Page",
				TestimonialsHolderPage::get()->map()->toArray()
			)->setHasEmptyDefault(true)
		);
		return $fields;
	}

}