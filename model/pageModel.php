<?php
class page
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
    public static function check_login($username,$password)
    {
        require("connect.php");
        $que= "SELECT member.id_member,member.fname,member.lname,member.user,member.passwd,member.mail,member.status,employee.id_employee,
        employee.gender,city.cityname,countryname 
        FROM member 
        LEFT JOIN employee ON member.id_employee = employee.id_employee
        LEFT JOIN city ON city.id_city = employee.id_city
        LEFT JOIN country ON country.id_country=city.id_country WHERE member.user = '$username' AND member.passwd='$password' ";
        $result = mysqli_query($sql, $que);
        $row = mysqli_fetch_array($result);
        //print_r($row);
        return $row ;
    }
       
}
?>