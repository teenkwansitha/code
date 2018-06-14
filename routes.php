<?php
function call($controller,$action)
{
	require_once("controllers/".$controller."_controller.php");
	$param = array();
	switch($controller)
	{
		case "page":	$controller = new PageController();
						
						break;
		case "member":  $controller = new MemberController();
						
						break;
		case "myWork":  $controller = new MyWorkController();
						break;
		case "userMm":  $controller = new UserMmController();
						$param['id_member'] = $_POST['id_member']??NULL;
						$param['id_code'] = $_POST['id_code']??NULL;
						$param['fname'] = $_POST['fname']??NULL;
						$param['lname'] = $_POST['lname']??NULL;
						$param['username'] = $_POST['username']??NULL;
						$param['passwd'] = $_POST['passwd']??NULL;
						$param['type'] = $_POST['type']??NULL;
						break;
		
	}
	$controller->{$action}($param);
}

if( ($controller =='page'&& ($action =='login' || $action=='check_login')) 
|| ($controller == 'member' && ($action == 'index_pro' || $action == 'addMemberSys' )))
{	
	call($controller,$action);	
}
else
{	
	call('page','error'); 
}
?>