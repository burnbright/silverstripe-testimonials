<?php
class TestimonialsHolderPage extends Page{

	static $db = array();

	function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab("Root.Main", new ComplexTableField($this, "Testimonials", "Testimonial",null,null));
		return $fields;
	}

}

class TestimonialsHolderPage_Controller extends Page_Controller{

	function Testimonials(){
		return DataObject::get('Testimonial');
	}

}
?>
