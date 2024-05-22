<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "external_alarm_master";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $port = $_POST['port'];
    $slogan = $_POST['slogan']; // Changed variable name to be consistent with 'name' in the POST request
    $severity = $_POST['severity'];
    $normallyopen = $_POST['normallyopen'];

    // Check if the port and name combination already exists
    $check_sql = "SELECT COUNT(*) FROM master_alarm WHERE port = ? AND slogan = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("is", $port, $slogan);
    $check_stmt->execute();
    $check_stmt->bind_result($count);
    $check_stmt->fetch();
    $check_stmt->close();

    if ($count > 0) {
      $message = "The Alarm with the specified Port-$port and $slogan already exists.";
    } else {
        $insert_sql = "INSERT INTO master_alarm (port, slogan, severity, normallyopen) VALUES (?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("isss", $port, $slogan, $severity, $normallyopen);

        if ($insert_stmt->execute()) {
          $message = "New alarm added successfully";
        } else {
            echo "Error: " . $insert_stmt->error;
        }

        $insert_stmt->close();
    }
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nokia to Ericsson EA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="main.php"><img src="logo.png" width="37" height="25"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fa-solid fa-house"></i> Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ngs.php"><i class="fa-solid fa-indent"></i> NGS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="eea.php"><i class="fa-solid fa-indent"></i> Ericsson EA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="n2e.php"><i class="fa-solid fa-indent"></i> Nokia to Ericsson EA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fa-solid fa-indent"></i> IDLe</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa-solid fa-indent"></i> N2E External Alarm
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="view_master_alarm.php">View Master Sheet</a>
          <a class="dropdown-item" href="master_alarm.php">Add External Alarm</a>
          <a class="dropdown-item" href="external_alarm.php">Generate EA</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa-solid fa-indent"></i> S-RET
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">2 RetSubUnit</a>
          <a class="dropdown-item" href="#">3 RetSubUnit</a>
          <a class="dropdown-item" href="#">6 RetSubUnit</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<body>
    <div class="container">
        <h4 style="color: #029ed6; text-align: left;" class="text-uppercase"><i class="fa-solid fa-folder-plus"></i> Add Master Alarm to Database</h4>
        <form action="master_alarm.php" method="POST">
  <div class="form-group">
  <label for="port" class="font-weight-normal">Alarm Port</label>
    <input type="number" class="form-control" id="port" name="port" placeholder="Enter SAU Port" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="slogan">Alarm Slogan</label>
    <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Enter Alarm Slogan" required>
  </div>
  <div class="form-group">
  <label for="severity" class="font-weight-normal">Perceived Severity</label>
  <select id="severity" name="severity" class="form-control" required>
                <option value="MAJOR">MAJOR</option>
                <option value="MINOR">MINOR</option>
                <option value="CRITICAL">CRITICAL</option>
            </select>
  </div>
  <div class="form-group">
  <label for="normallyopen" class="font-weight-normal">Normally Open</label>
  <select id="normallyopen" name="normallyopen" class="form-control" required>
                <option value="false">FALSE</option>
                <option value="true">TRUE</option>
            </select>
  </div>
  <?php if (!empty($message)) { ?>
            <div class="alert alert-danger" <?php echo strpos($message, 'successfully') !== false ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php } ?>
      <button type="submit" class="btn btn-info">ADD Alarm <i class="fa-solid fa-database"></i></button>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
