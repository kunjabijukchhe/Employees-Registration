<?php
$i = 0;
require_once '../php/DBConnect.php';
$db = new DBConnect();
$db->auth1();

$title = "Home";
$setHomeActive = "active";
include '../layout/header.php';
?>
<div class="container">
    <div class="jumbotron" style="margin-top:10%;">

      <h1 style="text-align:center;">Welcome Employee!</h1>
    </div>
    <button type="button" name="button" style="margin-left:45%;"><a class="nav-link" href="logout.php">Logout</a></button>
</div>
<?php include '../layout/footer.php'; ?>
