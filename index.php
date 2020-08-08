<?php 
   session_start();
   include('includes/config.php');
   
       ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>News | Home Page</title>
      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <!-- <link href="css/modern-business.css" rel="stylesheet"> -->
   </head>
   <body>
      <!-- Navigation -->
      <?php include('includes/header.php');?>
      <!-- Page Content -->
      <div class="container">
         <div class="row" style="margin-top: 14%">
            <!-- Blog Entries Column -->
            <div class="col-md-8 col-xs-12">
               <!-- Blog Post -->
               <div class="row">
                <?php 
                    if (isset($_GET['pageno'])) {
                          $pageno = $_GET['pageno'];
                      } else {
                          $pageno = 1;
                      }
                      $no_of_records_per_page = 8;
                      $offset = ($pageno-1) * $no_of_records_per_page;
                    
                    
                      $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                      $result = mysqli_query($con,$total_pages_sql);
                      $total_rows = mysqli_fetch_array($result)[0];
                      $total_pages = ceil($total_rows / $no_of_records_per_page);
                    
                    
                    $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                    while ($row=mysqli_fetch_array($query)) {
                    ?>
                <div class="col-md-6 col-xs-12">
                  <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>">
                    <div class="card mb-4">
                        <img class="card-img-top" style="height: 200px;" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                        <div class="card-body">
                          <h4 class="card-title"><?php echo htmlentities($row['posttitle']);?></h4>
                          <p><b>Category : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> </p>
                        </div>
                        <div class="card-footer text-muted">
                          Posted on <?php echo htmlentities($row['postingdate']);?>
                        </div>
                    </div>
                  </a>
                </div>
                <?php } ?>
               </div>
               <!-- Pagination -->
               <ul class="pagination justify-content-center mb-4">
                  <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
                  <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
                     <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
                  </li>
                  <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
                     <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
                  </li>
                  <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
               </ul>
            </div>
            <!-- Sidebar Widgets Column -->
            <?php include('includes/sidebar.php');?>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container -->
      <!-- Footer -->
      <?php include('includes/footer.php');?>
      <!-- Bootstrap core JavaScript -->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      </head>
   </body>
</html>