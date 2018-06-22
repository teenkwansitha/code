<?php
class PageController
{
	public function login()
	{
		
		require_once('view/page/login.php');
	}
	public function check_login()
	{
		$username = $_POST['user'];
		$password = $_POST['passwd'];
		$loginlist = page :: login($username,$password);
		session_start();
        $_SESSION['name'] = $list[0]->name;
        $_SESSION['lname'] = $list[0]->lname;
        $_SESSION['list'] = $list;
        //print_r($_SESSION['list']);
        if($list[0]->type=="USER")
        {
            require_once("view/test/1.php");
        }
        else if($list[0]->type=="ADMIN")
        {
            require_once("view/test/1.php");
        }
	}
	/* public function error()
	{
		require_once("view/page/error.php");
	} */
}
?>