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
    function __construct($id,$fname,$lname,$username = "ไม่มี",$password= "ไม่มี",$email,$status) 
    {
        $this->id = $id;
        $this->fname=$fname;
        $this->lname=$lname;
        $this->username = $username;
        $this->password=$password;
        $this->type=$type;
    }
    public static function login($username = "ไม่มี" ,$password = "ไม่มี")
    {
        require("connect.php");
        $stmt = $con->prepare('SELECT * FROM member WHERE user=? AND passwd=?');
        $stmt->execute([$username, $password]);
        $ans = $stmt->fetch();
        //print_r($ans);

        if(!empty($ans))
        {
                $id = $ans['id'];
                $username = $ans['username'];
                $password = $ans['passwd'];
                $fname = $ans['name'];
                $lname = $ans['surname'];
                $type = $ans['type'];
                //$_SESSION['fname'] = $fname;
                //$_SESSION['lname'] = $lname;
                $list[] = new page($id,$username,$password,$fname,$lname,$type);
            return  $list ;
        }
        else return null ; 
    }
}
?>