<style>
 .btn-round
 {
  border-radius: 20px;
 }
 .imgprofile #img
 {
  padding-left:10px; 
  padding-top:5px;
 }
 #name
 { 
   padding-top:10px;
   font-weight: bold; 
   text-align:center; 
 }
.hea-nav{
  background: #fb4f14;
}
.slide-b{
  padding-top:16px;
}
.logo{
  padding-top:0px;
}
h1,h7{
  color:white;
  }
.header-pro
{
  border: 2px solid #FFFFFF;
}
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
  
    
    text-decoration: none;
    font-size: 18px;
    transition: 0.3s;
}




 
</style>
<header>
<nav class="navbar navbar-default w3-top hea-nav">
  <div class="container-fluid">
      <a class="navbar-brand slide-b" href="#" onclick="w3_open()">
      <big><h1>☰</h1></big>
			</a>
      <a class="navbar-brand" href="#">
						<div class="logo">
							<img src="picture/logo/logo.png" alt="" style="width:120px;" />
						</div>
			</a>
   
    <ul class="nav navbar-nav navbar-right">
     
      <li class="dropdown profile-nav" >
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <img src="picture/user/nut.jpg" alt="user-img" width="38" class="img-circle header-pro">
            <h7 class="">
            <?php 
              echo $_SESSION['user']['fname']." ".$_SESSION['user']['lname'] ;
            ?>
            </h7>
            <h7><span class="caret"></span> </h7>
          </a>
          <ul class="dropdown-menu">
            <li>
              <div class = "" style="width:300px">
                <div class="row">
                    <div class="col-sm-4 imgprofile">
                      <img src="picture/user/nut.jpg" id="img" alt="user-img" width="110">
                    </div>
                    <div class="col-sm-8">
                      <h6 id="name">
                      <?php 
                          echo $_SESSION['user']['fname']." ".$_SESSION['user']['lname'] ;
                      ?>
                      </h6>
                      <center><a href="#" data-toggle="modal"  data-target="#myModal" class="btn-danger btn btn-round btn-sm">ดูโปรไฟล์</a><center>
                    </div>
                </div>
              </div>
            </li>
              <li><a href="?controller=member&action=index_pro">Account setting</a></li>
              <li><a href="index.php">Logout</a></li>
          </ul>
        </li>

     
    </ul>
  </div>
</nav>

<!-- Sidebar -->
<?php if($_SESSION['user']['status']=="admin") {?>
<div>
  <div class="w3-sidebar w3-bar-block w3-animate-left sidenav" style="display:none;z-index:5;width:250px;" id="mySidebar">
    <!-- <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button> -->
    <a href="?controller=page&action=index_admin" class="w3-bar-item w3-button">Home</a>
    <a href="#" class="w3-bar-item w3-button">ยอดขายแยกตามประเทศ</a>
    <a href="#" class="w3-bar-item w3-button">ประเทศไหนขายอะไรดีสุด</a>
    <a href="#" class="w3-bar-item w3-button">เมืองไหนขายอะไรดีสุด</a>
    <a href="#" class="w3-bar-item w3-button">ลูกค้า VIP </a>
  </div>
</div>
<?php } ?>

<?php if($_SESSION['user']['status']=="employee") {?>
<div class="w3-sidebar w3-bar-block w3-animate-left sidenav" style="display:none;z-index:5;width:250px;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
  <a href="?controller=page&action=index_employee" class="w3-bar-item w3-button">Home</a>
  <a href="#" class="w3-bar-item w3-button">ยอดขายเเย่งตามหมวดหมู่</a>
  <a href="?controller=sale&action=index" class="w3-bar-item w3-button">ยอดขายของสินค้าที่ขายดีที่สุดรายเดือน</a>
  <a href="#" class="w3-bar-item w3-button">ยอดขายที่ดีที่สุดรายปี</a>
  <a href="#" class="w3-bar-item w3-button">ยอดขายของเเต่ละหมวดหมู่สินค้าต่อเดือน</a>
  
  
</div>
<?php } ?>

<!-- Page Content -->
<div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>
</header>

<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header ">
        
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><center>Profile</center></h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
               <div class="">
                  <center><img src="picture/user/nut.jpg" id="img" alt="user-img" width="250px"></center>
               </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
                <div class="row">
                  <h4 style="font-weight: bold;">
                  <center>  
                  <?php 
                    echo $_SESSION['user']['fname']." ".$_SESSION['user']['lname'] ;
                  ?>
                  </center>
                  </h4>
                  <p><center>Email : <?php   echo $_SESSION['user']['mail'] ;  ?></center></p>
                  <p><center>Username : <?php echo  $_SESSION['user']['user'] ;  ?></center></p>     
                </div>
        </div>

        </div>
    </div>
    </div>




<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>
          
<script>
  $(document).ready(function() { 
    $(".profile-nav").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
        
    );

  });

</script>