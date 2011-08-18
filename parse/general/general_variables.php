<?php 

defined('C5_EXECUTE') or die(_("Access Denied."));

class ExtendedContentParseGeneralVariables{
	function getCurrentDate(){
		if(func_num_args()==0) return array(
			'description'=>t('Get current date/time'),
			'customonclick'=>ExtendedContentParseInput::getDateInput(),
		);
		return strftime(func_get_arg(0));
	}
}