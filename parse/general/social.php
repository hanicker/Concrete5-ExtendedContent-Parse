<?php 

defined('C5_EXECUTE') or die(_("Access Denied."));

class ExtendedContentParseSocial{
	function getFacebookLikeThisPageButton(){
		if(func_num_args()==0) return array(
			'description'=>t('Get facebook button to like current page'),
		);
		global $c;
   		$nh = Loader::helper('navigation');
   		$cpl = $nh->getCollectionURL($c);
		return '
		<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=210373152351781&amp;xfbml=1"></script><fb:like href="'.$cpl.'" send="true" width="450" show_faces="false" action="like" font=""></fb:like>
		';		
	}
	function getFacebookLikeCustomPageButton(){
		if(func_num_args()==0) return array(
			'description'=>t('Get facebook button to like custom page'),
			'customonclick'=>ExtendedContentParseInput::getPageInput(),
		);
		$page=Page::getByID(func_get_arg(0));
   		$nh = Loader::helper('navigation');
   		$cpl = $nh->getCollectionURL($page);
		return '
		<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=210373152351781&amp;xfbml=1"></script><fb:like href="'.$cpl.'" send="true" width="450" show_faces="false" action="like" font=""></fb:like>
		';		
	}	
}