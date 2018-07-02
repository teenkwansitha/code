

<?php
    require_once("view/header/header.php");
    if(empty($_SESSION['user'])){
        call('page','login');
    }
?>
<style>
.profile{
    
   padding-top:10%;
   width:400px;
   margin:auto;
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
        <a href="#" data-toggle="modal"  data-target="#myModal3" class="btn-success btn">แก้ไขรูปภาพ</a>
        <p style="padding-top:10px;">ชื่อ :
            <?php 
              echo $_SESSION['user']['fname']." ".$_SESSION['user']['lname'] ;
            ?> 
        </p>
        <p>Email : <?php  echo $_SESSION['user']['mail'] ; ?></p>
        <p>Username : <?php  echo $_SESSION['user']['user'] ;     ?></p>
        <a href="#" data-toggle="modal"  data-target="#edit-pass" style="color:blue;">เปลี่ยนรหัสผ่าน</a>
        <span>/</span>
        <a href="" data-toggle="modal"  data-target="#myModal2" style="color:blue;">แก้ไขประวัติส่วนตัว</a>
        </center>
    </div>
</div>

<!--- edit pass -->
<div class="modal fade" id="edit-pass">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header ">
        
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="font-weight: bold;"><center>แก้ไขรหัสผ่าน</center></h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            
            <form method="POST" >
            <!-- <label>รหัสผ่านเก่า:</label><br/>
            <center><input type="password" class="form-control " id="myInput"><br/></center> -->

            <label>รหัสผ่านใหม่:</label><br/>
            <center><input type="password" name="new_pass1" class="form-control " id="myInput1"><br/></center>

            <label>ยืนยันรหัสผ่านใหม่:</label><br/>
            <center><input type="password" name="new_pass2" class="form-control" id="myInput2"><br/></center>
            <input type="checkbox" onclick="myFunction()">Show Password
            <input type="hidden" name="controller" value="member">
            
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
                <div class="row">
                <center><button type="submit" class="btn btn-primary btn-block custom" name="action" value="edit_passwd">ยืนยันการเปลี่ยนรหัสผ่าน</button></center>    
                </div>
        </div>
            </form>

        </div>
    </div>
</div>
<!--  edit- -->
<div class="modal fade" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header ">
        
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="font-weight: bold;"><center>Edit Profile</center></h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
               <div class="">
            <form method="POST">
            <label>fristname :</label><br/>
            <center><input type="text" class="form-control " name="fname" id="fname" value=<?php  echo $_SESSION['user']['fname']; ?>><br/></center>

            <label>Lastname :</label><br/>
            <center><input type="text" class="form-control " name="lname" id="lname" value=<?php  echo $_SESSION['user']['lname']; ?> ><br/></center>

            <label>E-mail :</label><br/>
            <center><input type="text" class="form-control" name="mail" id="mail" value=<?php  echo $_SESSION['user']['mail']; ?> ><br/></center>
            
            <?php if($_SESSION['user']['status'] == "employee") { ?>

            <label>id_employee :</label><br/>
            <center><input type="text" class="form-control" name="id_employee" id="id_employee" value=<?php  echo $_SESSION['user']['id_employee']; ?> ><br/></center>
            <input type="hidden" name="controller" value="member">

            <?php } ?>

            
               </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
                <div class="row">
                <center><button type="submit" class="btn btn-primary btn-block custom" name="action" value="edit_pro">ยืนยันการแก้ไขข้อมูลส่วนตัว</button></center>    
                </div>   
        </div>
        </form>
        </div>
    </div>
    </div>

<div class="modal fade" id="myModal3">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header ">
        
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="font-weight: bold;"><center>แก้ไขรูปภาพ</center></h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
               <div class="">
               <center>
                <img id="blah" class="img-circle header-pro" width="180px" height="180px" src="http://placehold.it/180" alt="your image" />
                <input type='file' onchange="readURL(this);" /></center>
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
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>






<script>
    //confirm_password("#passwdinput","#passwdConfirm","#btn-submit");    
    function confirm_password(passwd, passwdConfirm, btn) {
        $(document).ready(function() {
            $(".alert-user").remove();
            $(passwdConfirm).keyup(function() {
                $(".alert-user").remove();
                //$(btn).prop('disabled', false);
                if ($(this).val() != $(passwd).val()) {
                    //$(btn).prop('disabled', true);
                    $(passwdConfirm).after("<span  class='red alert-user alert'>ยืนยันรหัสผ่านไม่ถูกต้อง</span>")
                    return false;
                } else {
                    // $(btn).prop('disabled', false);
                    $(".alert-user").remove();
                    return true;
                }
            });
            $(passwd).keyup(function() {
                $(".alert-user").remove();
                // $(btn).prop('disabled', false);
                if ($(this).val() != $(passwdConfirm).val() && $(passwdConfirm).val() != '') {
                    // $(btn).prop('disabled', true);
                    $(passwdConfirm).after("<span  class='red alert-user alert'> ยืนยันรหัสผ่านไม่ถูกต้อง</span>")
                    return false;
                } else {
                    if (!$(btn).is(":disabled")) {
                        //$(btn).prop('disabled', false);
                    }
                    $(".alert-user").remove();
                    return true;
                }
            });
        });
    }
</script>



