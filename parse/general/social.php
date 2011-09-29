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
		
		$language='en_EN';
		$package = Package::getByHandle('multilingual');
		if($package){
			$lh = Loader::helper('section', 'multilingual');
			$language=$lh->getLanguage().'_'.strtoupper($lh->getLanguage());
		}else if(defined('LOCALE')){
			$language=LOCALE;
		}		
		return '
		<div id="fb-root"></div><script src="http://connect.facebook.net/'.$language.'/all.js#appId=210373152351781&amp;xfbml=1"></script><fb:like href="'.$cpl.'" send="true" width="450" show_faces="false" action="like" font=""></fb:like>
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
		
		$language='en_EN';
		$package = Package::getByHandle('multilingual');
		if($package){
			$lh = Loader::helper('section', 'multilingual');
			$language=$lh->getLanguage().'_'.strtoupper($lh->getLanguage());
		}else if(defined('LOCALE')){
			$language=LOCALE;
		}
		return '
		<div id="fb-root"></div><script src="http://connect.facebook.net/'.$language.'/all.js#appId=210373152351781&amp;xfbml=1"></script><fb:like href="'.$cpl.'" send="true" width="450" show_faces="false" action="like" font=""></fb:like>
		';		
	}	
	function getGoogleLikeThisPageButton(){
		//Reference: http://www.google.com/webmasters/+1/button/#utm_source=adsense&utm_medium=blog&utm_campaign=async
		if(func_num_args()==0) return array(
			'description'=>t('Get google +1 button for current page'),
		);
		global $c;
   		$nh = Loader::helper('navigation');
   		$cpl = $nh->getCollectionURL($c);
		
		$language='en';
		$package = Package::getByHandle('multilingual');
		if($package){
			$lh = Loader::helper('section', 'multilingual');
			$language=$lh->getLanguage();
		}else if(defined('LOCALE')){
			$language=substr(LOCALE,0,strpos(LOCALE,'_'));
		}		
		return '
		<g:plusone size="medium" annotation="inline"></g:plusone>

		<script type="text/javascript">
		  window.___gcfg = {lang: \''.$language.'\'};

		  (function() {
			var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
			po.src = \'https://apis.google.com/js/plusone.js\';
			var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
		  })();
		</script>
		';	
	}
	function getGoogleLikeCustomPageButton(){
		if(func_num_args()==0) return array(
			'description'=>t('Get google +1 button for custom page'),
			'customonclick'=>ExtendedContentParseInput::getPageInput(),
		);
		global $c;
		$page=Page::getByID(func_get_arg(0));
   		$nh = Loader::helper('navigation');
   		$cpl = $nh->getCollectionURL($page);
		
		$language='en';
		$package = Package::getByHandle('multilingual');
		if($package){
			$lh = Loader::helper('section', 'multilingual');
			$language=$lh->getLanguage();
		}else if(defined('LOCALE')){
			$language=substr(LOCALE,0,strpos(LOCALE,'_'));
		}		
		return '
		<g:plusone size="medium" annotation="inline" href="'.$cpl.'"></g:plusone>

		<script type="text/javascript">
		  window.___gcfg = {lang: \''.$language.'\'};

		  (function() {
			var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
			po.src = \'https://apis.google.com/js/plusone.js\';
			var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
		  })();
		</script>
		';	
	}	
}