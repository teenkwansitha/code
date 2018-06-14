<style>
  .p_login{
        
        width:450px;
        padding:50px;
        
  }
  #login{
        padding-top:8%;
        padding-left:32.5%;
  }
  .p_login a{

        color: red;
  }
  .red{
        color: red;
  }
  
</style>

<form method="POST" id="login">
        <div class="container">
                <div class="p_login w3-card-4 w3-light-grey">
                        <h1>Login</h1>
                        <br>
                        <label>Username</label><input type="text" name="username" class="form-control"  required>
                        <label>Password</label><input type="password" name="passwd" class="form-control" required>
                        <input type="hidden" name="controller" value="page"> 
                        </br>
                        <button type="submit" name="action" value="check_login" class="btn btn-success btn-block">Login</button> 
                        </br>
                        <a href="#" data-toggle="modal"  data-target="#myModal"><center>register</center></a>
                </div>
        </div>
</form>

       <?php /*
        if(isset($_GET['msg'])) 
        {
                $tem = $_GET['msg'];
                    
                echo "<center><h6 class= w3-text-red >$tem</h6></center>"; 
        

        }*/
        ?>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header ">
        
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Register</h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form method="POST" id="add_work">
               <div>
                <label><span class='red'>* </span>Firstname</label>
                <input maxlength="70" type="text" name="title" class="form-control " placeholder="Enter firstname">
                <label><span class='red'>* </span>Lastname</label>
                <input maxlength="70" type="text" name="title" class="form-control " placeholder="Enter lastname">
                <label><span class='red'>* </span>Username</label>
                <input maxlength="70" type="text" name="title" class="form-control "placeholder="Enter username">
                <label><span class='red'>* </span>Password</label>
                <input maxlength="70" type="password" name="title" class="form-control " placeholder="Enter password">
                <label><span class='red'>* </span>E-mail</label>
                <input maxlength="70" type="text" name="title" class="form-control" placeholder="name@email.com">
               </div>
                <input type="hidden" name="controller" value="page">
                
            
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
                <div class="row">
                        <div class="col-sm-6">
                        <button type="submit" class="btn btn-danger btn-block" name="action" value="login">Back</button>
                        </div>
                        <div class="col-sm-6">
                        <button type="submit" class="btn btn-success btn-block" name="action" value="register">Register</button>
                        </div>
                        </form>
                </div>
        </div>

        </div>
    </div>
    </div>

      