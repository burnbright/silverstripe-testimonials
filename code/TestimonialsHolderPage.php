<?php
class TestimonialsHolderPage extends Page{

	static $db = array();

	function getCMSFields(){
		$fields = parent::getCMSFields();
		return $fields;
	}

}

class TestimonialsPage_Controller extends Page_Controller{

	function Testimonials(){
		return DataObject::get('TestimonialPage');
	}

}
?>
