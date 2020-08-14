<?php
   session_start();
   include('includes/config.php');
   error_reporting(0);
   if(strlen($_SESSION['login'])==0)
     { 
   header('location:index.php');
   }
   else{
   
   if(isset($_POST['submit']))
   {
   $category=$_POST['category'];
   $description=$_POST['description'];
   $status=1;
   $query=mysqli_query($con,"insert into tblcategory(CategoryName,Description,Is_Active) values('$category','$description','$status')");
   if($query)
   {
   $msg="Category created ";
   }
   else{
   $error="Something went wrong . Please try again.";    
   } 
   }
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <?php include('includes/header.php');?>
   <body class="fixed-left">
      <!-- Begin page -->
      <div id="wrapper">
         <!-- Top Bar Start -->
         <?php include('includes/topheader.php');?>
         <!-- Top Bar End -->
         <!-- ========== Left Sidebar Start ========== -->
         <?php include('includes/leftsidebar.php');?>
         <!-- Left Sidebar End -->
         <div class="content-page">
            <!-- Start content -->
            <div class="content" style="background-color: whitesmoke;">
               <div class="container" style="width: 100%">
                  <!-- <div class="row" sytyle="background-color: #444;">
                     <div class="col-xs-12">
                         <div class="page-title-box">
                             <h4 class="page-title">Add Category</h4>
                             <ol class="breadcrumb p-0 m-0">
                                 <li>
                                     <a href="#">Admin</a>
                                 </li>
                                 <li>
                                     <a href="#">Category </a>
                                 </li>
                                 <li class="active">
                                     Add Category
                                 </li>
                             </ol>
                             <div class="clearfix"></div>
                         </div>
                     </div>
                     </div> -->
                  <div class="row page-titles">
                     <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Add Category</h4>
                     </div>
                     <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                           <ol class="breadcrumb" style="margin-bottom:0px;">
                              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                              <li class="breadcrumb-item active">Dashboard 1</li>
                           </ol>
                           <button type="button" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                        </div>
                     </div>
                  </div>
                  <!-- end row ---------------------------------------------------------------->
                  <div class="row" style="width: 80%;margin: 0 auto;position: absolute; margin-top: 50px;">
                     <div class="card-group">
                        <div class="col-sm-12" style="background-color: #ffffff; box-shadow: 2px 0 10px rgba(0,0,0,.2);">
                           <div class="card-box">
                              <h4 class="m-t-0 header-title"><b>Add Category </b></h4>
                              <hr />
                              <div class="row">
                                 <div class="col-sm-6">
                                    <!---Success Message--->
                                    <?php if($msg){ ?>
                                    <div class="alert alert-success" role="alert">
                                       <strong>Well done!</strong>
                                       <?php echo htmlentities($msg);?>
                                    </div>
                                    <?php } ?>
                                    <!---Error Message--->
                                    <?php if($error){ ?>
                                    <div class="alert alert-danger" role="alert">
                                       <strong>Oh snap!</strong>
                                       <?php echo htmlentities($error);?>
                                    </div>
                                    <?php } ?>
                                 </div>
                              </div>
                              <div class="container-fluid">
                                 <div class="row">
                                    <form class="form-horizontal" name="category" method="post" style="width: 100%;">
                                       <div class="form-group">
                                          <label class="col-sm-4 control-label">Category</label>
                                          <div class="col-sm-8">
                                             <input type="text" class="form-control" value="" name="category" required />
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-4 control-label">Category Description</label>
                                          <div class="col-sm-8">
                                             <textarea class="form-control" rows="5" name="description" required></textarea>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-md-2 control-label">&nbsp;</label>
                                          <div class="col-md-10" style="padding-left: 150px;">
                                             <button type="submit" class="btn btn-success waves-effect waves-light btn-md" name="submit"">
                                             Submit
                                             </button>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end row -->
               </div>
               <!-- container -->
            </div>
            <!-- content -->
            <?php include('includes/footer.php');?>
         </div>
      </div>
   </body>
</html>
<?php } ?>