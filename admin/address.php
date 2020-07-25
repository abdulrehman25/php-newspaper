<?php
    $path = ucwords(str_replace('_',' ',basename($_SERVER['PHP_SELF'],'.php')));
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $path;?></li>
    </ol>
</nav>