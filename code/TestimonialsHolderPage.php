<?php

class TestimonialsHolderPage extends Page{

	function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab("Root.Testimonials",
			GridField::create("Testimonials","Testimonials", Testimonial::get(),
				GridFieldConfig_RecordEditor::create()
			)
		);
		return $fields;
	}

}

class TestimonialsHolderPage_Controller extends Page_Controller{

	function getTestimonials(){
		return Testimonial::get();
	}
    
    function PaginatedTestimonials($page_length = 10) {
        $list = PaginatedList::create(
            $this->getTestimonials(),
            $this->request
        );
        $list->setPageLength($page_length);
        
        return $list;
    }
}
