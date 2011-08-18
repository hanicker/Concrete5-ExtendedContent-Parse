<?php 

defined('C5_EXECUTE') or die(_("Access Denied."));

class ExtendedContentParseGeneralUserinfo{
	function getUserIp(){
		if(func_num_args()==0) return array(
			'description'=>t('IP of the user'),
		);		

		if (!empty($_SERVER['HTTP_CLIENT_IP'])){ //check ip from share internet
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ //to check ip is pass from proxy
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip=$_SERVER['REMOTE_ADDR'];
		}
		return $ip;		
	}
	//To be added: Referrer
}