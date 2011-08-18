<?php 

defined('C5_EXECUTE') or die(_("Access Denied."));

class ExtendedContentParseSiteStats{
	function getTotalPageViews(){
		if(func_num_args()==0) return array(
			'description'=>t('Total page views'),
		);					
		
		Loader::model('page_statistics');
		return PageStatistics::getTotalPageViews();
	}
	function getLastPageEditDate(){
		if(func_num_args()==0) return array(
			'description'=>t('Last site modification date'),
			'customonclick'=>ExtendedContentParseInput::getDateInput(),
		);			
		Loader::model('page_statistics');
		$time=strtotime(PageStatistics::getSiteLastEdit());
		return strftime(func_get_arg(0),$time);
	}
}