<?php
    require_once("view/header/header.php");
    if(empty($_SESSION['user'])){
        call('page','login');
    }

?>
<style>
th,td{
    text-align: center;
}


</style>
<div>
<br>
<br>
<br>
<?php  
//print_r($memberlist);
//echo "test index admin";



?>
</div>
<div class="container">
<h2>Manage Users</h2>
<br><br>
    <table  id="memberTable" class="table table-bordered Tabledata"> 
            <thead>
                <tr align="center" class="table-light">
                    <th>#</th>
                    <th>firstname</th>
                    <th>lastname</th>
                    <th>Username</th>
                    <th>Pass</th>
                    <th>E-mail</th>
                    <th>Status</th>
                    <th>id_employee</th>
                    <th>Edit</th>
                    <th>Delect</th>

                </tr>
            </thead>
            <tbody>
            
            <?php
            $i=1;
            foreach($memberlist as $member)
            {
                //echo $member->fname ;             
                echo "<tr>
            
                <td>$i</td>
                <td>".$member->fname."</td>
                <td>".$member->lname."</td>
                <td>".$member->username."</td>
                <td>".$member->password."</td>
                <td>".$member->email."</td>
                <td>".$member->status."</td>
                <td>".$member->id_employee."</td>
               
                ";
            ?>
                <td>
                
                    <a href='#' 
                    data-idmem =  "<?php echo $member->id_member ?>"
                    data-fn =  "<?php echo $member->fname ?>"
                    data-ln = "<?php echo $member->lname ?>"
                    data-user = "<?php echo $member->username ?>"
                    data-passwd = "<?php echo $member->password ?>"
                    data-mail  = "<?php echo $member->email ?>"
                    data-status  = "<?php echo $member->status ?>"
                    data-idem  = "<?php echo $member->id_employee ?>"
                    class='btn btn-success btn-sm btn-edit-info'>แก้ไข</a>      
                      
                
                </td>
                <td> 
                    <?php 
                    echo "<a href=?controller=member&action=delect_member&id_mem=$member->id class='btn btn-danger btn-sm btn-delete-year'>ลบ</a>";
                    ?>
                    
                </td>
                
                
                </tr>
                <?php $i++;
              
                       
         }
            ?>
            </tbody>
    </table>
</div>

<!-- แก้ไขประวัติส่วนตัว -->
<div class="modal fade" id="edit-info">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header ">
        
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="font-weight: bold;"><center>Edit Profile member</center></h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
               <div class="">
            <form method="POST">
            <label>fristname :</label>
            <center><input type="text" class="form-control " name="fname" id="fname"  ></center>

            <label>Lastname :</label>
            <center><input type="text" class="form-control " name="lname" id="lname"  ></center>
            <label>Username :</label>
            <center><input type="text" class="form-control " name="user" id="user"  ></center>
            <label>Password:</label>
            <center><input type="text" class="form-control " name="passwd" id="passwd"  ></center>

            <label>E-mail :</label>
            <center><input type="text" class="form-control" name="mail" id="mail"></center>
            <label>Status :</label>
            <center><input type="text" class="form-control " name="status" id="status"  ></center>
            <label>id_employee :</label>
            <center><input type="text" class="form-control " name="idem" id="idem"  ></center>
            <input type="hidden" name="idmem" id="idmem"  >
            <input type="hidden" name="controller" value="member">

            

            
               </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
                <div class="row">
                <center><button type="submit" style="width:400px;" class="btn btn-primary btn-block custom" name="action" value="edit_member">ยืนยันการแก้ไขข้อมูลส่วนตัว</button></center>    
                </div>   
        </div>
        </form>
        </div>
    </div>
    </div>


<script>
 $(document).ready(function(){
     
    $('.btn-edit-info').click(function(){
    //$('.alert').remove();
    var id =$(this).attr('data-idmem')
    var fn = $(this).attr('data-fn');
    var ln = $(this).attr('data-ln');
    var user = $(this).attr('data-user');
    var passwd = $(this).attr('data-passwd');
    var mail = $(this).attr('data-mail');
    var status = $(this).attr('data-status');
    var idem = $(this).attr('data-idem');
    // set modal 
    $("#fname").val(fn);
    $("#lname").val(ln);
    $("#user").val(user);
    $("#passwd").val(passwd);
    $("#mail").val(mail);
    $("#status").val(status);
    $("#idem").val(idem);

    $("#edit-info").modal('show');
    });
});

</script>
<script>
$(document).ready(function() 
{
    //ต้องวางหลังset data
    $('#memberTable').DataTable();
} );
</script>