<?php 

defined('C5_EXECUTE') or die(_("Access Denied."));

class ExtendedContentParseCurrentPage{
	function getPageHandle(){
		if(func_num_args()==0) return array(
			'description'=>t('Handle of the page'),
		);		
	
		global $c;
		return $c->vObj->cvHandle;
	}
	function getPageName(){
		if(func_num_args()==0) return array(
			'description'=>t('Name of the page'),
		);			
	
		global $c;
		return $c->vObj->cvName;
	}	
	function getPageDescription(){
		if(func_num_args()==0) return array(
			'description'=>t('Page description'),
		);			
		
		$page = Page::getCurrentPage();
		return $page->getCollectionDescription();
	}	
	function getParentPageName(){
		if(func_num_args()==0) return array(
			'description'=>t('Name of the parent page'),
		);			
		
		$page = Page::getCurrentPage();
		$parentPage = Page::getByID($page->getCollectionParentID());
		return $parentPage->getCollectionName();
	}	
	function getParentPageHandle(){
		if(func_num_args()==0) return array(
			'description'=>t('Handle of the parent page'),
		);			
		
		$page = Page::getCurrentPage();
		$parentPage = Page::getByID($page->getCollectionParentID());
		return $parentPage->getCollectionHandle();
	}		
	function getPageCreationDate(){
		if(func_num_args()==0) return array(
			'description'=>t('Page creation date'),
			'customonclick'=>ExtendedContentParseInput::getDateInput(),
		);			
		$page = Page::getCurrentPage();
		
		$time=strtotime($page->getCollectionDateAdded());
		return strftime(func_get_arg(0),$time);
	}	
	function getPageModificationDate(){
		if(func_num_args()==0) return array(
			'description'=>t('Page modification date'),
			'customonclick'=>ExtendedContentParseInput::getDateInput(),
		);		
		$page = Page::getCurrentPage();
		
		$time=strtotime($page->getCollectionDateLastModified());
		return strftime(func_get_arg(0),$time);
	}	
	function getPagePublicDate(){
		if(func_num_args()==0) return array(
			'description'=>t('Page public date'),
			'customonclick'=>ExtendedContentParseInput::getDateInput(),
		);		
		$page = Page::getCurrentPage();
		
		$time=strtotime($page->getCollectionDatePublic());
		return strftime(func_get_arg(0),$time);
	}	
	function getPageCustomAttribute(){
		if(func_num_args()==0) return array(
			'description'=>t('Page custom text attribute'),
			'customonclick'=>ExtendedContentParseInput::getTextInput(t('Insert attribute handle below')),
		);		
		$page = Page::getCurrentPage();	
		return $page->getCollectionAttributeValue(func_get_arg(0));
	}
	function getLinkToParentPage(){
		if(func_num_args()==0) return array(
			'description'=>t('Generates link to parent page'),
			'customonclick'=>'ccm_selectExtendedContentFunction(\''.t('Parent Page').'\',t)',
		);			
		$page = Page::getCurrentPage();
   		$nh = Loader::helper('navigation');
   		$parentPage = Page::getByID($page->getCollectionParentID());
   		$cpl = $nh->getCollectionURL($parentPage);
   		return $cpl;
	}	
}