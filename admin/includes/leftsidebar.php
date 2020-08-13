<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="dashboard.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                </li>
                <?php
                    if($_SESSION['type'] == "admin"){
                        echo '
                        <li>
                          <a href="users.php" class="waves-effect"><i class="fa fa-user"></i> <span> Users </span> </a>
                        </li>
                        ';
                    }
                ?>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-pie-chart"></i> <span> Category </span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="add-category.php">Add Category</a></li>
                            <li><a href="manage-categories.php">Manage Category</a></li>
                        </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-caret-square-o-down"></i> <span>Sub Category </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="add-subcategory.php">Add Sub Category</a></li>
                        <li><a href="manage-subcategories.php">Manage Sub Category</a></li>
                    </ul>
                </li>               
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-plus-circle"></i> <span> Posts </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="add-post.php">Add Posts</a></li>
                        <li><a href="manage-posts.php">Manage Posts</a></li>
                            <li><a href="trash-posts.php">Trash Posts</a></li>
                    </ul>
                </li>  
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-file"></i> <span> Pages </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="aboutus.php">About us</a></li>
                        <li><a href="contactus.php">Contact us</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-comment"></i> <span> Comments </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="unapprove-comment.php">Waiting for Approval </a></li>
                        <li><a href="manage-comments.php">Approved Comments</a></li>
                    </ul>
                </li>   
            </ul>
        </div>
    </div>
<!-- Sidebar -left -->
</div>