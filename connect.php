<?php

/*$sql = mysqli_connect("localhost","root","","db_member");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }*/


$sql = new mysqli(null,
'root', // username
'1234',
'dbtest55',
null,
'/cloudsql/salebigdata:asia-south1:saledata'
);
if ($sql->connect_errno) {
echo 'no'."<br/>";
die('Connect Error (' . $sql->connect_errno . ') '. $sql->connect_error);
} else {
echo 'yes'."<br/>";
}
/*$que= "SELECT fname FROM member";
$result = mysqli_query($sql, $que);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "fname: ". $row["fname"]."<br/>";
    }
} else {
    echo "0 results";
}
 echo "tttt"."<br/>";*/
 ?>