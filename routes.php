<?php
function call($controller,$action)
{
	require_once("controllers/".$controller."_controller.php");
	
	switch($controller)
	{
		case "page":	$controller = new PageController();
						echo "r1";
						require_once("model/pageModel.php");
						echo "r2";
						require_once("model/memberModel.php");
						echo "r3";
						
						break;
		case "member":  $controller = new MemberController();
						require_once("model/memberModel.php");
						break;
		case "sale":  $controller = new SaleController();
						require_once("model/saleModel.php");
						break;
		case "userMm":  $controller = new UserMmController();
						//$param['id_member'] = $_POST['id_member']??NULL;
						
						break;
		
	}
	$controller->{$action}();
}

if( ($controller =='page'&& ($action =='month' ||$action =='login' || $action=='check_login' || $action=='register' || $action=='index_admin' || $action=='index_employee' )) 
|| ($controller == 'member' && ($action == 'index_pro' || $action == 'addMemberSys'|| $action == 'delect_member'|| $action == 'edit_member'|| $action == 'edit_passwd' ))

|| ($controller == 'sale' && ($action == 'index' || $action == 'report_3' )))

|| ($controller == 'sale' && ($action == 'index' || $action == 'year'|| $action == 'vip'|| $action == 'report_3' )))

{	
	call($controller,$action);	
}
else
{	
	call('page','error'); 
}
?>