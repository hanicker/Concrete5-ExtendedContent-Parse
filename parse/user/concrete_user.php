<?php 

defined('C5_EXECUTE') or die(_("Access Denied."));

class ExtendedContentParseConcreteUser{
	function getUserId(){
		if(func_num_args()==0) return array(
			'description'=>t('User ID'),
		);		
	
		Loader::model('User');
		$u=new User();
		return $u->uID;
	}
	function getUserName(){
		if(func_num_args()==0) return array(
			'description'=>t('Username of the user'),
		);		
	
		Loader::model('User');
		$u=new User();
		return $u->uName;
	}
	function getUserFirstName(){
		if(func_num_args()==0) return array(
			'description'=>t('First Name of the user (first_name attribute handle)'),
		);		
	
		Loader::model('User');
		$u=new User();
		$ui=UserInfo::getByID($u->uID);
		return $ui->getAttribute('first_name');
	}	
	function getUserLastName(){
		if(func_num_args()==0) return array(
			'description'=>t('Last Name of the user (last_name attribute handle)'),
		);		
	
		Loader::model('User');
		$u=new User();
		$ui=UserInfo::getByID($u->uID);
		return $ui->getAttribute('last_name');
	}		
	function getUserEmail(){
		if(func_num_args()==0) return array(
			'description'=>t('Email of the user'),
		);		
	
		Loader::model('User');
		$u=new User();
		return $u->uEmail;
	}	
	function getUserAvatar(){
		if(func_num_args()==0) return array(
			'description'=>t('Avatar of the user (If available)'),
		);		
	
		Loader::helper('concrete/avatar');
		Loader::model('User');
		$u=new User();
		$ui=UserInfo::getByID($u->uID);
		$av=new ConcreteAvatarHelper();
		return $av->outputUserAvatar($ui);
	}		
	function getUserCustomAttribute(){
		if(func_num_args()==0) return array(
			'description'=>t('User custom text attribute'),
			'customonclick'=>ExtendedContentParseInput::getTextInput(t('Insert attribute handle below')),
		);		
	
		Loader::model('User');
		$u=new User();
		$ui=UserInfo::getByID($u->uID);
		return $ui->getAttribute(func_get_arg(0));
	}			
	function getAllUserGroups(){
		if(func_num_args()==0) return array(
			'description'=>t('List of all user groups'),
		);		
	
		Loader::model('User');
		$u=new User();
		$groups_names=$u->getUserGroups();
		$count = count($groups_names)-1;
		$last = $groups_names[$count];
		unset($groups_names[$count]);
		$str = join(", ", $groups_names);
		if($count>0)
			$str .= ' '.t('and').' '.$last;
		return $str;
	}	
	function getUserLastLogin(){
		if(func_num_args()==0) return array(
			'description'=>t('Last user login date'),
			'customonclick'=>ExtendedContentParseInput::getDateInput(),
		);				
		Loader::model('User');
		Loader::model('UserInfo');
		$u=new User();
		$time=UserInfo::getByID($u->uID)->uLastLogin;
		return strftime(func_get_arg(0),$time);
	}
}