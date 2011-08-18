<?php 

defined('C5_EXECUTE') or die(_("Access Denied."));

class ExtendedContentParseSiteInfo{
	function getSiteName(){
		if(func_num_args()==0) return array(
			'description'=>t('Name of the site'),
		);				
	
		return SITE;
	}
}