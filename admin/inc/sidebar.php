<?php
if(isset($_SESSION['username']) && $_SESSION['role'] == 'admin'){
?>
<ul class="list-group list-group-flush">
    <li class="list-group-item list-group-item-primary"><a href="all_posts" class="text-white font-weight-bold"><i class="fa fa-file"></i> All Posts</a></li>
    <li class="list-group-item list-group-item-primary"><a href="category" class="text-white font-weight-bold"><i class="fa fa-list-alt"></i> Category</a></li>
    <li class="list-group-item list-group-item-primary"><a href="comments" class="text-white font-weight-bold"><i class="fa fa-comments"></i> Comments</a></li>
    <li class="list-group-item list-group-item-primary"><a href="users" class="text-white font-weight-bold"><i class="fa fa-users"></i> Users</a></li>
</ul>
<?php }
if(isset($_SESSION['username']) && $_SESSION['role'] == 'author'){
?>
    <ul class="list-group list-group-flush">
        <li class="list-group-item list-group-item-primary"><a href="all_posts" class="text-white font-weight-bold"><i class="fa fa-file"></i> All Posts</a></li>
        <li class="list-group-item list-group-item-primary"><a href="comments" class="text-white font-weight-bold"><i class="fa fa-comments"></i> Comments</a></li>
    </ul>
<?php }?>
