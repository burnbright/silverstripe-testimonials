<?php

class TestimonialsHolderPage extends Page{

	static $db = array();

	function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab("Root.Testimonials",
			//new ComplexTableField($this, "Testimonials", "Testimonial",null,null)
			GridField::create("Testimonials","Testimonials", Testimonial::get(),
				GridFieldConfig_RecordEditor::create()
			)
		);
		return $fields;
	}

}

class TestimonialsHolderPage_Controller extends Page_Controller{

	function Testimonials(){
		return DataObject::get('Testimonial',"\"Show\" = 1");
	}

}
