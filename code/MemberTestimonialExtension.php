<?php

/**
* MemberTestimonialExtension
*/
class MemberTestimonialExtension extends DataExtension
{
    
    private static $belongs_to = array(
        'Testimonial' => 'Testimonial'
    );
}
