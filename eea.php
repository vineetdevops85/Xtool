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
        label {
            font-weight: normal;
            margin-bottom: 8px;
            display: block;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        /* input[type="submit"] {
            background-color: #31610a;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #346e04;
        } */

        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
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
      <li class="nav-item active">
        <a class="nav-link" href="eea.php"><i class="fa-solid fa-indent"></i> Ericsson EA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="n2e.php"><i class="fa-solid fa-indent"></i> Nokia to Ericsson EA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fa-solid fa-indent"></i> IDLe</a>
      </li>
      <li class="nav-item dropdown">
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
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Handle form submission
        $alarmStrings = [];

        // Get SiteId from the text box at the top
        $siteId = isset($_POST["SiteId"]) ? $_POST["SiteId"] : '';

        // Loop through each row
        for ($i = 1; $i <= 32; $i++) {
            $port = $_POST["port{$i}"];
            $ports = $_POST["ports{$i}"];
            $radio = isset($_POST["radio{$i}"]) ? $_POST["radio{$i}"] : '';

            // Check if the radio button is ticked
            if ($radio == 'on') {
                $dropdownValue = $_POST["port{$i}"];
                $dropdownValue2 = $_POST["ports{$i}"];
                $alarmStrings[] = "cmedit set SubNetwork=ONRM_ROOT_MO,MeContext={$siteId},ManagedElement={$siteId},Equipment=1,FieldReplaceableUnit=SAU-1,AlarmPort={$i} administrativeState=UNLOCKED, alarmSlogan=\"{$dropdownValue}\", normallyOpen=false, perceivedSeverity=\"{$dropdownValue2}\"";
            }
        }

        // Generate a unique filename with SiteId, date, and time
        $filename = $siteId . '_' . date('dmYHis') . '.txt';

        // Write the strings to the file
        file_put_contents($filename, implode(PHP_EOL, $alarmStrings));
    }
    ?>

    <form method="post">
    <div class="form-group">
        <h2 align="center" class="h3">External Alarm Scripting Tool (EAST)</h2>
        <h2 align="center" class="blockquote-footer">Developed by Vineet Kumar</h2>
        <label for="exampleInputEmail1">Site ID:</label>
        <input type="text" name="SiteId" id="SiteId" required class="form-control" aria-describedby="emailHelp" placeholder="Enter Site ID">
    </div>
        <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>SAU Port</th>
                <th>Alarm Slogan</th>
                <th>Priority</th>
                <th>Select Port</th>
            </tr>

            <?php
            // Generate the form with 32 rows
            for ($i = 1; $i <= 32; $i++) {
                echo '<tr>';
                echo "<td>AlarmPort-{$i}</td>";
                echo '<td>';
                echo "<select name='port{$i}'>";
                // echo "<option value='' disabled selected>SELECT SLOGAN</option>";
                echo "<option value='RBS INTRUSION'>RBS INTRUSION</option>";
                echo "<option value='RBS CLIMATE FAIL'>RBS CLIMATE FAIL</option>";
                echo "<option value='RBS HEX FAN FAIL'>RBS HEX FAN FAIL</option>";
                echo "<option value='RBS EQPT TEMP HIGH'>RBS EQPT TEMP HIGH</option>";
                echo "<option value='RBS EQPT TEMP LOW'>RBS EQPT TEMP LOW</option>";
                echo "<option value='RBS DC CR'>RBS DC CR</option>";
                echo "<option value='RBS DC HIGH LOW VOLT'>RBS DC HIGH LOW VOLT</option>";
                echo "<option value='RBS DC MJ'>RBS DC MJ</option>";
                echo "<option value='RBS FUSE FAIL'>RBS FUSE FAIL</option>";
                echo "<option value='RBS DC RECT MJ'>RBS DC RECT MJ</option>";
                echo "<option value='RBS DC RECT CR'>RBS DC RECT CR</option>";
                echo "<option value='RBS BATT TEMP HIGH'>RBS BATT TEMP HIGH</option>";
                echo "<option value='RBS PORTABLE GEN RUNNING'>RBS PORTABLE GEN RUNNING</option>";
                echo "<option value='RBS RBS GEN TRANSFER SW OPERATED'>RBS RBS GEN TRANSFER SW OPERATED</option>";
                echo "<option value='RBS LTE RRU AT DC SYS SPD'>RBS LTE RRU AT DC SYS SPD</option>";
                echo "<option value='RBS BATT ON DISCHARGE'>RBS BATT ON DISCHARGE</option>";
                echo "<option value='RBS FIF PDU FUSE FAIL'>RBS FIF PDU FUSE FAIL</option>";
                echo "<option value='RBS BATT BKR FUSE DISCONNECT'>RBS BATT BKR FUSE DISCONNECT</option>";
                echo "<option value='RBS COMMERCIAL POWER FAIL'>RBS COMMERCIAL POWER FAIL</option>";
                echo "<option value='RBS PWR AC SPD'>RBS PWR AC SPD</option>";
                echo "<option value='RBS POWER UNCONVERTER CR'>RBS POWER UNCONVERTER CR</option>";
                echo "<option value='RBS POWER UNCONVERTER MJ'>RBS POWER UNCONVERTER MJ</option>";
                echo "<option value='RBS GENERATOR FUEL LOW'>RBS GENERATOR FUEL LOW</option>";
                echo "<option value='RBS GENERATOR SHUT DOWN'>RBS GENERATOR SHUT DOWN</option>";
                echo "<option value='RBS GENERATOR MJ'>RBS GENERATOR MJ</option>";
                echo "<option value='RBS DOOR OPEN'>RBS DOOR OPEN</option>";
                echo "<option value='RBS DOOR OPEN'>RBS DOOR OPEN</option>";
                echo "<option value='RBS GENERATOR FUEL LEAK'>RBS GENERATOR FUEL LEAK</option>";
                echo "</select>";
                echo '</td>';
                echo '<td>';
                echo "<select name='ports{$i}'>";
                echo "<option value='MAJOR' style='color: orange;'>MAJOR</option>";
                echo "<option value='MINOR' style='color: green;'>MINOR</option>";
                echo "<option value='CRITICAL' style='color: red;'>CRITICAL</option>";
                echo "</select>";
                echo '</td>';
                echo '<td>';
                echo "<input type='checkbox' name='radio{$i}'>";
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </table>

        <button type="submit" class="btn btn-info btn-sm">Download Script <i class="fa-solid fa-download"></i></button>

        <!-- Move the link to the bottom -->
        <div class="download-link">
            <?php
            if (isset($filename)) {
                // echo "<p>Download Script: <a href='{$filename}' download>{$filename}</a></p>";
                echo "<p>Download Script: <a href='{$filename}' >{$filename}</a></p>";
            }
            ?>
        </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
