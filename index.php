<?php
require_once 'php/DBConnect.php';
$db = new DBConnect();
$db->checkAuth();

$invalid = NULL;
if(isset($_POST['loginBtn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "user"){
        if($password == "123"){
            session_start();
            $_SESSION['username'] = $username;
            header("Location: http://localhost:8080/user/home.php");
        } else {
            $invalid = "Invalid Password!";
        }
    }else{
        $invalid = "Invalid username or password!";
    }
}

$title="Admin Login";
include 'layout/header.php';

?>

<div class="container"style="margin-top:5%;margin-left:35%; ">

    <div class="col-md-4">

        <div class="jumbotron">
            <div class="panel-heading">

                <h3>Admin Login</h3>
            </div>
            <div class="panel-body">
                <form class="form-vertical" role="form" method="post" action="index.php">
                    <div class="form-group">
                        <input type="text" class="form-control" required="true" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" required="true" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group loginBtn">
                        <button type="submit" name="loginBtn" class="btn btn-primary btn-sm">Login</button>
                        <a href="login/index.php" class="btn btn-sm btn-warning">Employees Login</a>
                    </div>
                    <?php if(isset($invalid)): ?>
                    <div class="alert-danger" id="invalid"><?= $invalid; ?></div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include 'layout/footer.php'; ?>
