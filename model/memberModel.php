<?php
class member
{
    public $id;
    public $fname;
    public $lname;
    public $username;
    public $password;
    public $email;
    public $status;
    public $id_employee;
    public $city;
    public $country;

    function __construct($id,$fname,$lname,$username = "ไม่มี",$password= "ไม่มี",$email,$status,$id_employee,$city,$country) 
    {
        $this->id = $id;
        $this->fname=$fname;
        $this->lname=$lname;
        $this->username = $username;
        $this->password=$password;
        $this->email=$email;
        $this->status=$status;
        $this->id_employee=$id_employee;
        $this->city=$city;
        $this->country=$country;

    }
    public static function getall()
    {
        require("connect.php");
        $que= "SELECT member.id_member,member.fname,member.lname,member.user,member.passwd,member.mail,member.status,employee.id_employee,
        employee.gender,city.cityname,countryname 
        FROM member 
        LEFT JOIN employee ON member.id_employee = employee.id_employee
        LEFT JOIN city ON city.id_city = employee.id_city
        LEFT JOIN country ON country.id_country=city.id_country ";
        $result = mysqli_query($sql, $que);
        
        while($row = mysqli_fetch_array($result))
        {
             $id=$row['id_member'];
             $fname=$row['fname'];
             $lname=$row['lname'];
             $username=$row['user'];
             $password=$row['passwd'];
             $email=$row['mail'];
             $status=$row['status'];
             $id_employee=$row['id_employee'];
             $city=$row['cityname'];
             $country=$row['countryname'];

             $memberList[] = new member($id,$fname,$lname,$username,$password,$email,$status,$id_employee,$city,$country);
        } 
        return $memberList;
        
    }
    
    public static function register($fname,$lname,$username,$password,$email,$id_employee)
    {
        require("connect.php");
        $que= "INSERT INTO `member` (`id_member`, `fname`, `lname`, `user`, `passwd`, `mail`, `status`, `id_employee`) VALUES (NULL, '$fname', '$lname', '$username', '$password', '$email', 'employee', '$id_employee')";
        $result=mysqli_query($sql,$que);
        return "1";
        

    }
    public static function edit_member($id,$fn,$ln,$user,$pass,$status,$mail,$id_employee)
    {
        require("connect.php");
        $que = "UPDATE member SET fname='$fn',lname='$ln',user='$user',passwd='$pass',mail='$mail',status='$status',id_employee='$id_employee' WHERE id_member = '$id' ";
        $result=mysqli_query($sql, $que);
        return "1";

    }
    public static function delect_member($id)
    {
        require("connect.php");
        echo "model";
        $que = "DELETE FROM member WHERE id_member = '$id' ";
        $result=mysqli_query($sql, $que);
        return "1";

    }
    public static function edit_passwd($id,$pass)
    {
        require("connect.php");
        $que = "UPDATE member SET passwd='$pass' WHERE id_member = '$id' ";
        $result=mysqli_query($sql, $que);
        return "1";

    }
}
?>