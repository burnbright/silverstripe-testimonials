<?php

class Testimonial extends DataObject{

	private static $singular_name = "Testimonial";
	private static $plural_name = "Testimonials";

	private static $db = array(
		'Content' => 'Text',
		'Name' => 'Varchar',
		'Business' => 'Varchar',
		'Date' => 'Date',
		'Hidden' => 'Boolean'
	);

	private static $has_one = array(
		'Image' => 'Image',
		'Member' => 'Member'
	);

	private static $summary_fields = array(
		'Business',
		'Name',
		'Date'
	);

	private static $default_sort = "Date DESC";

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab("Root.Main",
			new DropdownField("MemberID","Member",
				Member::get()->map("ID","Name")->toArray()
			)
		);
		if($this->Member()){
			$fields->removeByName("Name");
		}
		return $fields;
	}

	public function getFrontEndFields($params = null) {
		$fields = $this->scaffoldFormFields($params);
		$fields->removeByName('Date');
		$fields->removeByName('Hidden');
		if(!$this->isInDB()){
			$fields->removeByName('Image');
		}
		if(isset($params['Testimonial']) && $params['Testimonial']->MemberID){
			$fields->removeByName("Name");
		}
		$fields->removeByName("MemberID");
		$this->extend('updateFrontEndFields', $fields);

		return $fields;
	}

	public function Link() {
		if($page = TestimonialsHolderPage::get()->first()){
			return $page->Link().'#Testimonial'.$this->ID;
		}
	}

	public function Image(){
		if($member = $this->Member()){
			return $member->Image();
		}
		return $this->getCompoent("Image");
	}

	public function Name(){
		if($member = $this->Member()){
			return $member->Name;
		}
		return $this->getField("Name");
	}

	public function onBeforeWrite() {
		parent::onBeforeWrite();
		if(!$this->Date) {
			$this->Date = date('Y-m-d H:i:s');
		}
	}

	public static function get_random($limit = 3) {
		return Testimonial::get()->sort("RAND()")->limit($limit);
	}

	public function canCreate($member = null) {
		return Permission::check("CMS_ACCESS_CMSMain");
	}

	public function canEdit($member = null) {
		return Permission::check("CMS_ACCESS_CMSMain");
	}

	public function canDelete($member = null) {
		return Permission::check("CMS_ACCESS_CMSMain");
	}

	public function canView($member = null) {
		return Permission::check("CMS_ACCESS_CMSMain");
	}
	
}
