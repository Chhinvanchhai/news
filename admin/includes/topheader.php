<?php  
   $uname = $_SESSION['login'];
   $sql = "SELECT *FROM users WHERE username='".$uname."'";
   $result = mysqli_query($con,$sql);
   $data = mysqli_fetch_array($result);
   $countComentquery = mysqli_query($con,"SELECT tblcomments.id,  tblcomments.name,tblcomments.email,tblcomments.postingDate,tblcomments.comment as comment,tblposts.id AS postid,tblposts.PostTitle FROM  tblcomments JOIN tblposts ON tblposts.id=tblcomments.postId WHERE tblcomments.status=0");
   $message = mysqli_query($con,"SELECT COUNT(*) as total FROM tblcomments WHERE status=0");
   $datacom=  mysqli_fetch_assoc($message);
   $total = $datacom['total'];
   
 
?>
<div class="main-wrapper">
   <div class="topbar" style="background-color: #ffffff !important; height:70px;">
      <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo"><span>NEWS<span>Top</span></span><i class="mdi mdi-layers"></i></a>
                <!-- Image logo -->
                <a href="index.html" class="logo">
                    <span>
                    <img src="assets/images/logo.png" alt="" height="30">
                    </span>
                </a>
            </div>
        
            
         <!-- top right -->
         <!-- <nav class="top-navbar navbar-expand-md navbar-dark"> -->
        <div class="topbar-right">
            <div class="navbar-header" style="line-height: 65px; min-width: 70px;border-right: 1px solid rgba(0,0,0,.1);">
               <div class="" role="navigation">
               <ul class="nav navbar-nav navbar-left">
                  <li style="height: 70px; line-height: 58px; padding: 10px;">
                     <button class="open-left waves-effect waves-ligh" style="line-height: 29px; border: none; font-size: 29px; background-color: #fff;">
                        <i class="mdi mdi-menu"></i>
                     </button>
                  </li>
               </ul>
               </div>
            </div>
         <!-- Right(Notification) -->
        <div class="navbar-collapse">
            <div class="nav nav-item hidden-sm-up" style="height:70px; float: right;">
               <ul style=" list-style: none; padding: 10px;">
                  <li class="dropdown user-box" style="line-height: 50px;">
                     <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true" style="margin-top:-10px;">
                     <?php
                        if(!empty($data['image'])){
                           echo '<img style="width:40px;height:40px;" src="uploads/'.$data["image"].'" alt="user-img" class="img-circle user-img"> ';
                        }else{
                           echo '<img src="assets/images/usericon.png" alt="user-img" class="img-circle user-img">';
                        }
                     ?>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list" style="padding: 0px 0px 0px 0px;">
                        <!-- <span class="with-arrow">
                        <span class="bg-primary"></span> -->
                        </span>
                        <div class="d-flex no-block align-items-center p-15 bg-pf text-white m-b-10" style="height: 100px;width: 248px;">
                           <li class="block-pf"> 
                              <?php
                                 if(!empty($data['image'])){
                                    echo '<img style="width:40px;height:40px;" src="uploads/'.$data["image"].'" alt="user-img" class="img-circle user-img"> ';
                                 }else{
                                    echo '<img src="assets/images/usericon.png" alt="user-img" class="img-circle user-img">';
                                 }
                              ?>

                           </li>
                           <div class="m-l-10 pf-name">
                           <h4 class="m-b-0"><?php echo $data['username']; ?></h4>
                           <!-- <p class=" m-b-0">varun@gmail.com</p> -->
                           </div>
                        </div>
                        <li><a href="users.php"><i class="ti-user icon-size"></i> My profile</a></li>
                        <li><a href="change-password.php"><i class="ti-settings icon-size"></i> Chnage Password</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="logout.php"><i class="ti-power-off icon-size"></i> Logout</a></li>
                     </ul>
                  </li>
               </ul>
               <ul class="nav" style="height:70px;">
			   		<div id="main">
						<li class="right-side-toggle">
							<!-- <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a> -->
							<a onclick="openNav()" style="margin-top: 10px; position:relative" class="nav-link waves-effect waves-light" href="javascript:void(0)"><i style="font-size: 30px;" class="ti-bell"></i><span style="font-size: 9px; position: absolute; top: 0px; left: 30px; background: red; padding: 5px; color: white; border-radius: 13px;" class="counter counter-lg"><?php echo $total; ?></span>&nbsp;&nbsp; </a>
						</li>
						
							<div id="mySidebar" class="sidebar" style="padding-top: 0px;">
								
                        <div class="rpanel-title">Notification<span><a href="javascript:void(0)" class="closebtnn" onclick="closeNav()" >×</a></span></div>
                        <p style="text-align: center;padding:10px;font-size:16px;border-bottom:1px solid black;">List Of Comments</p>
                        <?php
                          while($rowcoment=  mysqli_fetch_assoc($countComentquery)){
                        ?>
                           <!-- <a href=""></a> -->
                           <div class="card">
                              <div class="card-body">
                              <h4 class="card-title"><?php echo $rowcoment['name']; ?></h4>
                              <p class="card-text"><?php echo substr($rowcoment['comment'],0, 90). "..."; ?></p>
                              <div class="row">
            
                                 <div class="col-sm-12">
                                    <a style="font-size:12px;color:#fff;margin-bottom:5px;" href="unapprove-comment.php" class="btn btn-success">Approve</a>
                                 </div>
                                 <div class="col-sm-12">
                                   <a style="font-size:12px;color:#fff" target="_blank" href="/news/news-details.php?nid=<?php echo $rowcoment['postid']; ?>" class="btn btn-success">View Post</a>
                                 </div>
                              </div>
                             
                              </div>
                           </div>
                        <?php } ?>
							</div>
					</div>
         
               </ul>
            </div>
            
         </div>
         <!-- </nav> -->
      </div>
   </div>
</div>