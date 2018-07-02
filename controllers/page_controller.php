<?php
class PageController
{
	public function login()
	{
		
		require_once('view/page/login.php');
	}
	public function register()
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$username=$_POST['username'];
		$password=$_POST['passwd'];
		$email=$_POST['mail'];
		$id_employee=$_POST['id_employee'];	
		$checkdel = member::register($fname,$lname,$username,$password,$email,$id_employee);
	?>
	<script type="text/javascript">
		swal("Register success!","", "success");
	</script>
	<?php
		//swal("Deleted!", "Your imaginary file has been deleted.", "success");
		
		
		call('page','login'); 


	}
	public function index_admin()
	{
		$memberlist = member::getall();
		require_once("view/admin/index_admin.php");

	}
	public function index_employee()
	{
		require_once("view/employee/index_employee.php");
	}

	public function check_login()
	{
		
		$username = $_POST['username'];
		$password = $_POST['passwd'];
		//echo "dddd";
		$loginlist = page::check_login($username,$password);
		//echo "member";
		$memberlist = member::getall();
		//print_r($memberlist);
		//echo $username ;
		$_SESSION['user'] = $loginlist;
		print_r($loginlist);
		
		//echo $_SESSION['user']['status'] ;
		if(!empty($loginlist) && $_SESSION['user']['status']=='admin')
		{
			//echo "if admin";
			call('page','index_admin'); 
		}
        else if(!empty($loginlist) && $_SESSION['user']['status']=='employee')
        { 
			//echo "if employ";
			//require_once("view/employee/index_employee.php");
			call('page','index_employee');
        }
        else {
			call('page','login');
		}
	}
	/* public function error()
	{
		require_once("view/page/error.php");
	} */
}
?>