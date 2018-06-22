<?php
$host=null;
$user="root";
$password="";
$database="dbtest55";
$port=null;
$socket="/cloudsql/test55-207804:asia-south1:test55";
echo"55555555";
try {
    $con = new PDO("mysql:dbname=dbtest55;unix_socket=/cloudsql/test55-207804:asia-south1:test55;host=null","root","");
    } catch (PDOException $e) {
    echo "Error : " . $e->getMessage() . "<br/>";
    die();
    }
    $stmt = $con->prepare('SELECT * FROM member');
    $stmt->execute();
    $user = $stmt->fetchAll();
    print_r($user);
    
?>

?>