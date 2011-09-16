<?php 

defined('C5_EXECUTE') or die(_("Access Denied."));

class ExtendedContentParseConcreteGroups{
	function getAllGroups(){
		if(func_num_args()==0) return array(
			'description'=>t('List of all groups'),
		);		
	
		Loader::model('groups');
		$groupslist=new GroupList(null,false,true);
		$groups=$groupslist->getGroupList();
		$groups_names=array();
		foreach($groups as $group){
			$groups_names[]=$group->getGroupName();
		}
		$count = count($groups_names)-1;
		$last = $groups_names[$count];
		unset($groups_names[$count]);
		$str = join(", ", $groups_names);
		$str .= ' '.t('and').' '.$last;
		return $str;
	}	
}