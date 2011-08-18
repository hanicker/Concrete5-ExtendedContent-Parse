<?php 

defined('C5_EXECUTE') or die(_("Access Denied."));

class ExtendedContentParseCustomPage{
	function getPageHandle(){
		if(func_num_args()==0) return array(
			'description'=>t('Handle of the page'),
			'customonclick'=>ExtendedContentParseInput::getPageInput(),
		);		
	
		$page=Page::getByID(func_get_arg(0));
		return $page->getCollectionHandle();
	}
	function getPageName(){
		if(func_num_args()==0) return array(
			'description'=>t('Name of the page'),
		'customonclick'=>ExtendedContentParseInput::getPageInput(),
		);			
	
		$page=Page::getByID(func_get_arg(0));
		return $page->getCollectionName();
	}	
	function getPageDescription(){
		if(func_num_args()==0) return array(
			'description'=>t('Page description'),
			'customonclick'=>ExtendedContentParseInput::getPageInput(),
		);			
		
		$page=Page::getByID(func_get_arg(0));
		return $page->getCollectionDescription();
	}	
	function getParentPageName(){
		if(func_num_args()==0) return array(
			'description'=>t('Name of the parent page'),
			'customonclick'=>ExtendedContentParseInput::getPageInput(),
		);			
		
		$page=Page::getByID(func_get_arg(0));
		$parentPage = Page::getByID($page->getCollectionParentID());
		return $parentPage->getCollectionName();
	}	
	function getParentPageHandle(){
		if(func_num_args()==0) return array(
			'description'=>t('Handle of the parent page'),
			'customonclick'=>ExtendedContentParseInput::getPageInput(),
		);			
		
		$page=Page::getByID(func_get_arg(0));
		$parentPage = Page::getByID($page->getCollectionParentID());
		return $parentPage->getCollectionHandle();
	}		
	function getPageCreationDate(){
		if(func_num_args()==0) return array(
			'description'=>t('Page creation date'),
			'customonclick'=>ExtendedContentParseInput::getDateAndPageInput(),
		);			
		$arg=func_get_arg(0);
		$split=split(",",$arg);
		$page=Page::getByID($split[1]);
		$time=strtotime($page->getCollectionDateAdded());
		return strftime($split[0],$time);
	}	
	function getPageModificationDate(){
		if(func_num_args()==0) return array(
			'description'=>t('Page modification date'),
			'customonclick'=>ExtendedContentParseInput::getDateAndPageInput(),
		);		
		$arg=func_get_arg(0);
		$split=split(",",$arg);
		$page=Page::getByID($split[1]);
		$time=strtotime($page->getCollectionDateLastModified());
		return strftime($split[0],$time);
	}	
	function getPagePublicDate(){
		if(func_num_args()==0) return array(
			'description'=>t('Page public date'),
			'customonclick'=>ExtendedContentParseInput::getDateAndPageInput(),
		);		
		$arg=func_get_arg(0);
		$split=split(",",$arg);
		$page=Page::getByID($split[1]);
		$time=strtotime($page->getCollectionDatePublic());
		return strftime($split[0],$time);
	}		
	function getPageCustomAttribute(){
		if(func_num_args()==0) return array(
			'description'=>t('Page custom text attribute'),
			'customonclick'=>ExtendedContentParseInput::getTextAndPageInput(t('Select desired page and insert attribute handle below')),
		);		
		$arg=func_get_arg(0);
		$split=split(",",$arg);
		$page=Page::getByID($split[1]);
		$page = Page::getCurrentPage();	
		return $page->getCollectionAttributeValue($split[0]);
	}	
}