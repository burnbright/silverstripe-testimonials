<?php

class TestimonialsHolderPage extends Page
{

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.Testimonials",
            GridField::create("Testimonials", "Testimonials", Testimonial::get(),
                GridFieldConfig_RecordEditor::create()
            )
        );
        return $fields;
    }
}

class TestimonialsHolderPage_Controller extends Page_Controller
{

    public function getTestimonials()
    {
        return Testimonial::get();
    }
}
