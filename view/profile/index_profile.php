<html>
<body>
<?php
    require_once("view/header/header.php");
?>
<style>
.profile{
    
   padding-top:10%;
   width:400px;
   margin:auto;
}
h1{
  color:black;
  }
.container
  {
      padding-top:100px;
  }
  .custom {
    width: 550px;
}

</style>

<div class="container">
    <h2>ตั้งค่าโปรไฟล์</h2><br/>
    <div class="col-sm-4">
        <center><img class="img-circle header-pro" src="picture/user/nut.jpg" id="img" alt="user-img" width="250px"></center>
    </div>
    <div class="col-sm-8">
        <center>
        <br/><br/></br>
        <a href="#" class="btn-success btn">แก้ไขรูปภาพ</a>
        <p style="padding-top:10px;">ชื่อ :</p>
        <p>Email :</p>
        <p>Username :</p>
        <a href="#" data-toggle="modal"  data-target="#myModal1" style="color:blue;">เปลี่ยนรหัสผ่าน</a>
        <span>/</span>
        <a href="" data-toggle="modal"  data-target="#myModal2" style="color:blue;">แก้ไขประวัติส่วนตัว</a>
        </center>
    </div>
</div>

<div class="modal fade" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header ">
        
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="font-weight: bold;"><center>แก้ไขรหัสผ่าน</center></h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            
            <form>
            <label>รหัสผ่านเก่า:</label><br/>
            <center><input type="password" class="form-control " id="myInput"><br/></center>

            <label>รหัสผ่านใหม่:</label><br/>
            <center><input type="password" class="form-control " id="myInput1"><br/></center>

            <label>ยืนยันรหัสผ่านใหม่:</label><br/>
            <center><input type="password" class="form-control" id="myInput2"><br/></center>
            <input type="checkbox" onclick="myFunction()">Show Password
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
                <div class="row">
                <center><button type="submit" class="btn btn-primary btn-block custom" name="action" value="confirmpwd">ยืนยันการเปลี่ยนรหัสผ่าน</button></center>    
                </div>
        </div>

        </div>
    </div>
    </div>

<div class="modal fade" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header ">
        
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="font-weight: bold;"><center>แก้ไขประวัติส่วนตัว</center></h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
               <div class="">
               <form>
            <label>ชื่อ:</label><br/>
            <center><input type="password" class="form-control " id="fname"><br/></center>

            <label>นามสกุล:</label><br/>
            <center><input type="password" class="form-control " id="sname"><br/></center>

            <label>E-mail:</label><br/>
            <center><input type="password" class="form-control" id="mail"><br/></center>


            </form>
               </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
                <div class="row">
                <center><button type="submit" class="btn btn-primary btn-block custom" name="action" value="confirmpwd">ยืนยันการแก้ไขข้อมูลส่วนตัว</button></center>    
                </div>   
        </div>

        </div>
    </div>
    </div>


<script>
function myFunction() {
    var x = document.getElementById("myInput");
    var y = document.getElementById("myInput1");
    var z = document.getElementById("myInput2");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }
    if (z.type === "password") {
        z.type = "text";
    } else {
        z.type = "password";
    }
}
</script>


</body>
</html>

