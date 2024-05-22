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
        <h5 style="color: #ff5e00; text-align: center;" class="text-uppercase">Nokia to Ericsson External Alarm Scripting Tool</h5>
        <form action="external_alarm_process.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Upload Excel:</label>
    <input type="file" name="file" accept=".xls, .xlsx" class="form-control-file">
    <small id="emailHelp" class="form-text text-muted">Generate Excel File using NokiaToEricsson Macro</small>
  </div>
  <button type="submit" class="btn btn-info">Upload & Generate Script <i class="fa-solid fa-upload"></i></button>
</form>
    </div>
        <!-- <form action="external_alarm_process.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="file" name="file" accept=".xls, .xlsx" class="form-control-file">
            <button type="submit" class="btn btn-info btn-sm">upload and Generate Script</button>
        </div>
        </form> -->
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
