<?php
if(isset($_GET['id'])){
    $id = $_GET['id']; // get the employee id
}

require_once 'php/DBConnect.php';
$db = new DBConnect();
$db->auth();

$success = NULL;
$message = NULL;
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $doj = $_POST['doj'];
    $salary = $_POST['salary'];
    $landline = $_POST['landline'];
    $mobile = $_POST['mobile'];

    $flag = $db->updateEmployee($id, $username, $password, $firstName, $middleName, $lastName, $salary, $landline, $mobile, $doj);

    if ($flag) {

        header("Location: http://localhost/user/employee.php");
        $success = "User has been updated successfully!";

    } else {
        $message = "Error updating the employee to the database!";
    }
}

$employee = $db->getEmployeeById($id);

$employees = $db->getEmployees();

$title = "Employee";
$setEmployeeActive = "active";
include 'layout/header.php';
include 'layout/navbar.php';
?>

<div class="container" style="padding-top:15px; padding-bottom:15px;">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

                    <form class="form-horizontal" role="form" method="post" action="edit.php">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                                <h2>Update Employee</h2>
                              </div>
                        <div class="panel-body">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <div class="form-group">
                            <label class="col-md-3">Name:</label>
                            <div class="form-group col-sm-9"> <input type="text" value="<?= $employee[0]['f_name']; ?>" name="firstName" class="form-control" placeholder="First Name" required="true"> </div>
                            <div class="form-group col-sm-9"><input type="text" value="<?= $employee[0]['m_name']; ?>" name="middleName" class="form-control" placeholder="Middle Name"></div>
                            <div class="form-group col-sm-9"><input type="text" value="<?= $employee[0]['l_name']; ?>" name="lastName" class="form-control" placeholder="Last Name" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Username:</label>
                            <div class="col-sm-9"><input type="text" value="<?= $employee[0]['username']; ?>" name="username" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Password:</label>
                            <div class="col-sm-9"><input type="password" value="<?= $employee[0]['password']; ?>" name="password" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">Date of Join:</label>
                            <div class="col-sm-9"><input type="date" value="<?= $employee[0]['doj']; ?>" name="doj" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Salary:</label>
                            <div class="col-sm-9"><input type="text" value="<?= $employee[0]['salary']; ?>" name="salary" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Landline:</label>
                            <div class="col-sm-9"><input type="number" value="<?= $employee[0]['landline']; ?>" min="0" max="10000000000" name="landline" class="form-control"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Mobile:</label>
                            <div class="col-sm-9"><input type="number" value="<?= $employee[0]['mobile_nr']; ?>" min="0" max="10000000000" name="mobile" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"></label>
                            <button type="submit" class="btn btn-success btn-md" name="submit">Update Info</button>
                        </div>
                        <?php if (isset($success)): ?>
                            <div class="alert-success"><?= $success; ?></div>
                        <?php endif ?>
                        <?php if (isset($message)): ?>
                            <div class="alert-success"><?= $message; ?></div>
                        <?php endif ?>
                    </form>



                </div>
            </div>





        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
