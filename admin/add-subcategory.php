<?php
   session_start();
   include('includes/config.php');
   error_reporting(0);
   if(strlen($_SESSION['login'])==0)
     { 
   header('location:index.php');
   }
   else{
   if(isset($_POST['submitsubcat']))
   {
   $categoryid=$_POST['category'];
   $subcatname=$_POST['subcategory'];
   $subcatdescription=$_POST['sucatdescription'];
   $status=1;
   $query=mysqli_query($con,"insert into tblsubcategory(CategoryId,Subcategory,SubCatDescription,Is_Active) values('$categoryid','$subcatname','$subcatdescription','$status')");
   if($query)
   {
   $msg="Sub-Category created ";
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
               <div class="container" style="width: 100%;">
                  <div class="row">
                     <div class="col-xs-12">
                        <div class="page-title-box">
                           <h4 class="page-title">Add Sub-Category</h4>
                           <ol class="breadcrumb p-0 m-0">
                              <li>
                                 <a href="#">Admin</a>
                              </li>
                              <li>
                                 <a href="#">Category </a>
                              </li>
                              <li class="active">
                                 Add Sub-Category
                              </li>
                           </ol>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <!-- end row -->
                  <div class="row" style="width: 80%; margin: 0 auto; box-shadow: 2px 0 10px rgba(0,0,0,.2); background-color: #ffffff;">
                     <div class="col-sm-12">
                        <div class="card-box">
                           <h4 class="m-t-0 header-title"><b>Add Sub-Category </b></h4>
                           <hr />
                           <div class="row">
                              <div class="col-sm-6">
                                 <!---Success Message--->  
                                 <?php if($msg){ ?>
                                 <div class="alert alert-success" role="alert">
                                    <strong>Well done!</strong> <?php echo htmlentities($msg);?>
                                 </div>
                                 <?php } ?>
                                 <!---Error Message--->
                                 <?php if($error){ ?>
                                 <div class="alert alert-danger" role="alert">
                                    <strong>Oh !</strong> <?php echo htmlentities($error);?>
                                 </div>
                                 <?php } ?>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal" name="category" method="post" style="width: 100%;">
                                    <div class="form-group">
                                       <label class="col-sm-4 control-label">Category</label>
                                       <div class="col-sm-8">
                                          <select class="form-control" name="category" required>
                                             <option value="">Select Category </option>
                                             <?php
                                                // Feching active categories
                                                $ret=mysqli_query($con,"select id,CategoryName from  tblcategory where Is_Active=1");
                                                while($result=mysqli_fetch_array($ret))
                                                {    
                                                ?>
                                             <option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['CategoryName']);?></option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-sm-4 control-label">Sub-Category</label>
                                       <div class="col-sm-8">
                                          <input type="text" class="form-control" value="" name="subcategory" required>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-sm-4 control-label">Sub-Category Description</label>
                                       <div class="col-sm-8">
                                          <textarea class="form-control" rows="5" name="sucatdescription" required></textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-2 control-label">&nbsp;</label>
                                       <div class="col-md-10" style="padding-left: 150px;">
                                          <button type="submit" class="btn btn-success waves-effect waves-light btn-md" name="submitsubcat">
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
                  <!-- end row -->
               </div>
               <!-- container -->
            </div>
            <!-- content -->
            <?php include('includes/footer.php');?>
         </div>
      </div>
      <!-- END wrapper -->
   </body>
</html>
<?php } ?>