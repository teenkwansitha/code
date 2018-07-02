<?php
    require_once("view/header/header.php");
   //print_r(	$_SESSION['user']);
   if(empty($_SESSION['user'])){
    call('page','login');
}
?>
<br><br><br>
<div class="container">
    <h3>Name : <?php echo $_SESSION['user']['fname']." ".$_SESSION['user']['lname'] ;  ?></h4>
    <h4>Employee ID : <?php echo $_SESSION['user']['id_employee'] ;  ?></h4>
    <h4>City : <?php echo $_SESSION['user']['cityname']." , Country : ".$_SESSION['user']['countryname'] ;  ?></h4>
</div>

