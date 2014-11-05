<?php

/*
	This is index page class. This page will load when user is not requesting specific page to view.
*/

/*
	#Include view file for header, head and footer. This file will need to be included in every controller
*/
include (CONFIG.'views.php');

/*
	@ Include index model file to display content of this page.
	
	# Each controller and its methods has their own models. So change models and classes from library
	  first to edit application site.
*/
include (MODELS.'defaultModel.php');


//include meta tags class to generate meta tags, Open Graph tags and twitter card meta tags
include (LIBRARY.'metaTags.php');


class DefaultPage extends Exception{
	
	/*
		@public header variable for header contents.
	*/
	public $header;

	/*
		@open graph tags in array
	*/
	public $ogp = array();
	
	/*
		@twitter card tags in array
	*/
	public $twitterCard = array();
	
	/*
		@meta tags in array
	*/
	public $meta = array();
	
	
	//construct default page
	function __construct(){
		
		
		$this->meta = array(
				'description' => 'A new PHP Script like MVC Framework.',
				'author' => 'Viral Joshi'
				);
				
		$this->ogp = array(
				'title' => 'viralphp',
				'type' => 'html',
				'url' => SITE,
				'description' => 'A new PHP Script like MVC Framework.',
				'locale' => 'en'
				);
		
		$this->twitterCard = array(
					'title' => 'viralphp',
					'description' => 'A new PHP Script like MVC Framework.',
					'url' => SITE
					);

		$this->header  = '<title>Welcome to your custom PHP script like MVC.</title>';
		$this->header .= metaTags::meta($this->meta);
		$this->header .= metaTags::ogp($this->ogp);
		$this->header .= metaTags::twitterCard($this->twitterCard);
		
		//view header, head and footer to load
		echo Views::header($this->header);
		echo Views::head();
		
		DefaultModel::body();
		
		echo Views::footer();
	
	}
}

?>
