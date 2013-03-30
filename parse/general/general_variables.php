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
	function getSessionValue(){
		if(func_num_args()==0) return array(
			'description'=>t('Get session value'),
			'customonclick'=>ExtendedContentParseInput::getTextInput(t('Insert variable name below')),
		);			
		return (isset($_SESSION[func_get_arg(0)])?$_SESSION[func_get_arg(0)]:'');
	}		
	function getGetValue(){
		if(func_num_args()==0) return array(
			'description'=>t('Get GET (url address ?key=value) value'),
			'customonclick'=>ExtendedContentParseInput::getTextInput(t('Insert get key name below')),
		);			
		return (isset($_GET[func_get_arg(0)])?htmlentities($_GET[func_get_arg(0)],ENT_QUOTES):'');
	}			
	function getPostValue(){
		if(func_num_args()==0) return array(
			'description'=>t('Get POST value'),
			'customonclick'=>ExtendedContentParseInput::getTextInput(t('Insert post key name below')),
		);			
		return (isset($_POST[func_get_arg(0)])?htmlentities($_POST[func_get_arg(0)],ENT_QUOTES):'');
	}				
}