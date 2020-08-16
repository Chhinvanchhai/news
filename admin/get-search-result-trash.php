<?php
include('includes/config.php');
$search = $_REQUEST['search'];
?>
<?php
  $query = mysqli_query($con, "select tblposts.id as postid,tblposts.PostTitle as title,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=0 AND tblposts.PostTitle LIKE '%$search%' OR  tblcategory.CategoryName LIKE '%$search%' OR tblsubcategory.Subcategory LIKE  '%$search%'");
  $rowcount = mysqli_num_rows($query);
if ($rowcount == 0) {
?>
    <tr>

        <td colspan="4" align="center">
            <h3 style="color:red">No record found</h3>
        </td>
    <tr>
        <?php
    } else {
        while ($row = mysqli_fetch_array($query)) {
        ?>
    <tr>
        <td><b><?php echo htmlentities($row['title']); ?></b></td>
        <td><?php echo htmlentities($row['category']) ?></td>
        <td><?php echo htmlentities($row['subcategory']) ?></td>

        <td>
            <a href="trash-posts.php?pid=<?php echo htmlentities($row['postid']); ?>&&action=restore" onclick="return confirm('Do you really want to restore ?')"> <i class="ion-arrow-return-right" title="Restore this Post"></i></a>
            &nbsp;
            <a href="trash-posts.php?presid=<?php echo htmlentities($row['postid']); ?>&&action=perdel" onclick="return confirm('Do you really want to delete ?')"><i class="fa fa-trash-o" style="color: #f05050" title="Permanently delete this post"></i></a>
        </td>
    </tr>
<?php }
    } ?>