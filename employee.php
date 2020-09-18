<?php
require_once 'php/DBConnect.php';
$db = new DBConnect();
$db->auth();

$employees = $db->getEmployees();


$title="Employee"; $setEmployeeActive="active";
include 'layout/header.php';
include 'layout/navbar.php';

?>

<div class="container"style="margin-top:5%;">
    <div class="jumbotron">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 style="padding-top:15px;">Employees List</h3>
            </div>
            <div class="panel-body">
                <?php if(isset($employees)): ?>
                <table style="background-color: #f2f2f2;"class="table table-striped">
                    <thead>
                    <th>Name</th>
                    <th>Username</th>

                    <th>Employee ID</th>
                    <th>Salary</th>
                    <th>Mobile</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </thead>

                    <tbody>
                        <?php foreach($employees as $e): ?>
                        <tr>
                            <td><?= $e['f_name']." ".$e['m_name']." ".$e['l_name']; ?></td>
                            <td><?= $e['username']; ?></td>

                            <td><?= $e['prc_nr']; ?></td>
                            <td><?= $e['salary']; ?></td>
                            <td><?= $e['mobile_nr']; ?></td>

                            <td><a href="edit.php?id=<?= $e['id']; ?>"><button type="submit" name="button" class="btn btn-warning">Edit</button></a></td>

                            <td><a href="delete.php?id=<?= $e['id']; ?>"><button type="submit" name="button" class="btn btn-danger">Delete</button></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<?php include 'layout/footer.php'; ?>
