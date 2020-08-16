<?php
include('includes/config.php');
$search = $_REQUEST['search'];
?>
<?php
    $query = mysqli_query($con, "select tblposts.id as postid,tblposts.PostTitle as title,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 AND tblposts.PostTitle LIKE '%$search%' OR  tblcategory.CategoryName LIKE '%$search%' OR tblsubcategory.Subcategory LIKE  '%$search%'");
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
            <a target="_blank" href="/news/news-details.php?nid=<?php echo htmlentities($row['postid']); ?>">view</a>
            <a href="edit-post.php?pid=<?php echo htmlentities($row['postid']); ?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>
            &nbsp;
            <a href="manage-posts.php?pid=<?php echo htmlentities($row['postid']); ?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')"><i class="fa fa-trash-o" style="color: #f05050"></i></a>
        </td>
    </tr>
<?php }
    } ?>