<?php
class Testimonial extends DataObject{

	static $singular_name = "Testimonial";
	static $plural_name = "Testimonials";

	static $db = array(
		'Content' => 'Text',
		'Name' => 'Varchar',
		'Business' => 'Varchar',
		'Show' => 'Boolean',
		'Date' => 'Date'
	);

	static $has_one = array(
		'Image' => 'Image'
	);

	static $defaults = array(
		'Show' => false
	);

	static $summary_fields = array(
		'Business',
		'Name',
		'Date',
		'Show'
	);

	function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldsToTab("Root.Main", array(
			new ImageField("Image")
		));
		return $fields;
	}

	function Link(){
		return null;
		if($page = DataObject::get_one('Testimonial'))
			return $page->Link().'#testimonial'.$this->ID;
		return null;
	}

	static function get_random($limit = 3){
		return DataObject::get('Testimonial',"","RAND()","",$limit); //TODO: make random
	}
}

?>