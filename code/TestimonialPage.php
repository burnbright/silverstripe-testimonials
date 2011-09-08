<?php
class TestimonialPage extends Page{

	static $singular_name = "Testimonial";

	static $db = array(
		'Name' => 'Varchar',
		'Business' => 'Varchar',
		'Show' => 'Boolean'
	);

	static $has_one = array(
		'Image' => 'Image'
	);

	static $defaults = array(
		'Show' => false
	);

	function getCMSFields(){
		$fields = parent::getCMSFields();

		//TODO: image

		return $fields;
	}

	static function get_random($limit = 3){
		return DataObject::get('TestimonialPage',"","RAND()","",$limit); //TODO: make random
	}
}

class Testimonial_Controller extends Page_Controller{


}

?>