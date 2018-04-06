<?php
defined('_CONTROL') or die;
//include_once "/control/exist.php";
var_dump('bloghead.php');
?>


<div class="container">
    <div class="row">
        <div id="blog">

            <?php
            include_once "/model/blog.php";
            ?>

        </div>
    </div>
</div>
<script src="assets/js/delete.js"></script>