<?php 
  if(isset($_REQUEST['controller'])&&isset($_REQUEST['action']))
  {
    $controller = $_REQUEST['controller'];
    $action = $_REQUEST['action'];
    //echo "ch login";
  }
  else
  {
    //echo "ch login";
    $controller = 'page';
    $action = 'login';
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Analysis</title>
<link rel="shortcut icon" href="picture/logo/icon.png" />

<meta http-equiv="Content-Language" content="th">
<meta http-equiv="content-Type" content="text/html; charset=window-874">
<meta http-equiv="content-Type" content="text/html; charset=utf-8">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">

<!--  header
<link rel="stylesheet" href="assets/css/ready.css">
<link rel="stylesheet" href="assets/css/demo.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
 --> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"> 
<style>  
  body,h1,h2,h3{
		margin:0;
		font-family:Kanit;
		
	}
</style>
</head>
<body>
  <?php 
    require_once("routes.php"); 
  ?>
  <br>
  <br>
  <hr>
  <footer  class="footer">
      <p class="text-center ">Copyright © Tharin Tantayothin,Kwansitha Dueadkhunthod</p>
  </footer>
</body>
</html>