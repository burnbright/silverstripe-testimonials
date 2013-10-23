<?php

class Testimonial extends DataObject{

	private static $singular_name = "Testimonial";
	private static $plural_name = "Testimonials";

	private static $db = array(
		'Content' => 'Text',
		'Name' => 'Varchar',
		'Business' => 'Varchar',
		'Date' => 'Date'
	);

	private static $has_one = array(
		'Image' => 'Image'
	);

	private static $summary_fields = array(
		'Business',
		'Name',
		'Date'
	);

	private static $default_sort = "Date DESC";

	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldsToTab("Root.Main", array(
			UploadField::create("Image")
		));
		return $fields;
	}

	public function Link(){
		if($page = DataObject::get_one('TestimonialsHolderPage'))
			return $page->Link().'#Testimonial'.$this->ID;
		return null;
	}

	static function get_random($limit = 3){
		return Testimonial::get()->sort("RAND()")->limit($limit);
	}
	
}
