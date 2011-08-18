<?php 

defined('C5_EXECUTE') or die(_("Access Denied."));

class ExtendedContentParseGeneralFunctions{
	function getEvalPhpCode(){
		if(func_num_args()==0) return array(
			'description'=>t('Insert php code'),
			'customonclick'=>ExtendedContentParseInput::getTextInput(t('Insert php code below (without starting and ending tags, even if you can use them to put plain text)')),
		);
		return eval(func_get_arg(0));
	}
}