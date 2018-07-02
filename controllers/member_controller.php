<?php
class MemberController
{
	public function index_pro()
	{		
		include('view/profile/index_profile.php');
	}
	public function delect_member()
	{
		$id = $_GET['id_mem'];
		//echo $_GET['id_mem'];
		//echo $id ;
		//echo "dcodkodk";
		$check_del=member::delect_member($id);
	?>
		<script type="text/javascript">
			swal("Deleted!", "", "success");
		</script>
	<?php		
		call('page','index_admin'); 
				 
	}
	public function edit_member()
	{
		
		$fn=$_POST['fname'];
		$ln=$_POST['lname'];
		$mail=$_POST['mail'];
		$user=$_POST['user'];
		$passwd=$_POST['passwd'];
		$status=$_POST['status'];
		$id_em=$_POST['id_employee'] ;

		$check_edit=member::edit_member($_SESSION['user']['id_member'],$fn,$ln,$user,$passwd,$status,$mail,$id_em);
	?>
		<script type="text/javascript">
			swal("Edit member success!", "", "success");
		</script>
	<?php
		call('page','index_admin');

	}
	public function edit_passwd()
	{
		$pass1=$_POST['new_pass1'];
		$pass2=$_POST['new_pass2'];
		
		if($pass1==$pass2)
		{
			$check_edit=member::edit_passwd($_SESSION['user']['id_member'],$pass1);
		?>
			<script type="text/javascript">
				swal("Edit password success!", "", "success");
			</script>
		<?php
			call('member','index_pro');
		}
		if($pass1!=$pass2)
		{
			?>
			<script type="text/javascript">
				swal("Password no match!", "", "error");
			</script>
			
		<?php
		
		call('member','index_pro');
		}
		//echo $pass ;
		//echo $_SESSION['user']['id_member'];
		
	
	
		//require_once('view/test/1.php');
		


	}
	public function edit_pro()
	{
		
		$fn=$_POST['fname'];
		$ln=$_POST['lname'];
		$mail=$_POST['mail'];
		$user=$_POST['user'];
		$passwd=$_POST['passwd'];
		$status=$_POST['status'];
		$id_em=$_POST['id_employee'] ;

		$check_edit=member::edit_member($_SESSION['user']['id_member'],$fn,$ln,$user,$passwd,$status,$mail,$id_em);
	?>
		<script type="text/javascript">
			swal("Edit member success!", "", "success");
		</script>
	<?php
		call('page','index_admin');

	}
	/* public function error()
	{
		require_once("view/page/error.php");
	} */
}
?>