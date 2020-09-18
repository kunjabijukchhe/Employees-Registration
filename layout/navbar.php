<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Employees Registration</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav ml-auto">

      <li class=" <?php if (isset($setHomeActive)) { echo $setHomeActive; } else { echo '';}?>"><a class="nav-link" href="home.php">Home</a></li>
      <li class=" <?php if (isset($setEmployeeActive)) { echo $setEmployeeActive; } else { echo '';}?>"><a class="nav-link" href="employee.php">Employees</a></li>
      <li><a class="nav-link" href="logout.php">Logout</a></li>

    </ul>
  </div>
</nav>
