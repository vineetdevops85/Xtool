<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGS Scripting Tool</title>
    <style>
      body {
        background-color: #f4f4f4;
      }

      .container {
        max-width: 600px;
        margin: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #fff;
      }

      label {
        margin-bottom: 5px;
        display: block;
      }

      input[type="text"],
      select {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
      }

      .dropdown-container {
        display: flex;
        gap: 10px;
      }

      .dropdown-container select {
        flex: 1;
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
      <li class="nav-item active">
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
        <h2 style="color: #ff5e00; text-align: center;">NGS Scripting Tool</h2>
      <label for="name1">BBU ID/Site ID</label>
      <input type="text" id="name1" placeholder="Enter Site ID" />

      <label for="providerReceiver1">Select Radio Port</label>
      <div class="dropdown-container">
        <select id="providerReceiver1" style="width: fit-content; color: #ff0077; font: icon;">
          <option value="1">Provider</option>
          <option value="2">Receiver</option>
        </select>

        <select id="port1">
          <option value="A">Port A</option>
          <option value="B">Port B</option>
          <option value="C">Port C</option>
          <option value="D">Port D</option>
          <option value="E">Port E</option>
          <option value="F">Port F</option>
        </select>

        <select id="port2">
          <option value="A">Port A</option>
          <option value="B">Port B</option>
          <option value="C">Port C</option>
          <option value="D">Port D</option>
          <option value="E">Port E</option>
          <option value="F">Port F</option>
        </select>
        <select id="port3">
          <option value="A">Port A</option>
          <option value="B">Port B</option>
          <option value="C">Port C</option>
          <option value="D">Port D</option>
          <option value="E">Port E</option>
          <option value="F">Port F</option>
        </select>
      </div>

      <br />

      <label for="name2">BBU ID/Site ID</label>
      <input type="text" id="name2" placeholder="Enter Site ID" />

      <label for="providerReceiver2">Select Radio Port</label>
      <div class="dropdown-container">
        <select id="providerReceiver2" style="width: fit-content; color: #00c3ff; font: icon;">
          <option value="2">Receiver</option>
          <option value="1">Provider</option>
        </select>

        <select id="port4">
          <option value="A">Port A</option>
          <option value="B">Port B</option>
          <option value="C">Port C</option>
          <option value="D">Port D</option>
          <option value="E">Port E</option>
          <option value="F">Port F</option>
        </select>

        <select id="port5">
          <option value="A">Port A</option>
          <option value="B">Port B</option>
          <option value="C">Port C</option>
          <option value="D">Port D</option>
          <option value="E">Port E</option>
          <option value="F">Port F</option>
        </select>
        <select id="port6">
          <option value="A">Port A</option>
          <option value="B">Port B</option>
          <option value="C">Port C</option>
          <option value="D">Port D</option>
          <option value="E">Port E</option>
          <option value="F">Port F</option>
        </select>
      </div>

      <br />

      <button id="downloadBtn" class="btn btn-info">Download Scripts <i class="fa-solid fa-download"></i></button>
    </div>

    <script>
      document.getElementById("downloadBtn").addEventListener("click", () => {
        let name1 = document.getElementById("name1").value;
        let providerReceiver1 =
          document.getElementById("providerReceiver1").value;
        let port1 = document.getElementById("port1").value;
        let port2 = document.getElementById("port2").value;
        let port3 = document.getElementById("port3").value;

        let name2 = document.getElementById("name2").value;
        let providerReceiver2 =
          document.getElementById("providerReceiver2").value;
        let port4 = document.getElementById("port4").value;
        let port5 = document.getElementById("port5").value;
        let port6 = document.getElementById("port6").value;

        let currentDate = new Date().toLocaleDateString().replace(/\//g, '');
        let currentTime = new Date().toLocaleTimeString().replace(/:/g, '').replace(/\s/g, '');

        let script1 = `CREATE
FDN : "SubNetwork=ONRM_ROOT_MO,MeContext=${name1},ManagedElement=${name1},Transport=1,Synchronization=1,RadioEquipmentClock=1,NodeSynchMember=1"
administrativeState : "UNLOCKED"
nodeGroupSynchMemberId : "1"
selectionMode : REFERENCE_AND_NODE_PRIORITY
synchNodePriority : ${providerReceiver1}
synchRiPortCandidate : ["SubNetwork=ONRM_ROOT_MO,MeContext=${name1},ManagedElement=${name1},Equipment=1,FieldReplaceableUnit=1,RiPort=${port1}", "SubNetwork=ONRM_ROOT_MO,MeContext=${name1},ManagedElement=${name1},Equipment=1,FieldReplaceableUnit=1,RiPort=${port2}", "SubNetwork=ONRM_ROOT_MO,MeContext=${name1},ManagedElement=${name1},Equipment=1,FieldReplaceableUnit=1,RiPort=${port3}"]

SET
FDN : SubNetwork=ONRM_ROOT_MO,MeContext=${name1},ManagedElement=${name1},SystemFuction=1,Lm=1,FeatureState=CXC4012015
featureState : ACTIVATED

SET
FDN : SubNetwork=ONRM_ROOT_MO,MeContext=${name1},ManagedElement=${name1},SystemFuction=1,Lm=1,FeatureState=CXC4012018
featureState : ACTIVATED

SET
FDN : SubNetwork=ONRM_ROOT_MO,MeContext=${name1},ManagedElement=${name1},Transport=1,Synchronization=1,RadioEquipmentClock=1
freqDeviationThreshold : 600

SET
FDN : SubNetwork=ONRM_ROOT_MO,MeContext=${name1},ManagedElement=${name1},Equipment=1,FieldReplaceableUnit=1,RiPort=RRU-1
isShareWithExternalMw : true

SET
FDN : SubNetwork=ONRM_ROOT_MO,MeContext=${name1},ManagedElement=${name1},Equipment=1,FieldReplaceableUnit=1,RiPort=RRU-2
isShareWithExternalMw : true

SET
FDN : SubNetwork=ONRM_ROOT_MO,MeContext=${name1},ManagedElement=${name1},Equipment=1,FieldReplaceableUnit=1,RiPort=RRU-3
isShareWithExternalMw : true`;

        let script2 = `CREATE
FDN : "SubNetwork=ONRM_ROOT_MO,MeContext=${name2},ManagedElement=${name2},Transport=1,Synchronization=1,RadioEquipmentClock=1,NodeSynchMember=1"
administrativeState : "UNLOCKED"
nodeGroupSynchMemberId : "1"
selectionMode : REFERENCE_AND_NODE_PRIORITY
synchNodePriority : ${providerReceiver2}
synchRiPortCandidate : ["SubNetwork=ONRM_ROOT_MO,MeContext=${name2},ManagedElement=${name2},Equipment=1,FieldReplaceableUnit=1,RiPort=${port4}", "SubNetwork=ONRM_ROOT_MO,MeContext=${name2},ManagedElement=${name2},Equipment=1,FieldReplaceableUnit=1,RiPort=${port5}", "SubNetwork=ONRM_ROOT_MO,MeContext=${name2},ManagedElement=${name2},Equipment=1,FieldReplaceableUnit=1,RiPort=${port6}"]

SET
FDN : SubNetwork=ONRM_ROOT_MO,MeContext=${name2},ManagedElement=${name2},SystemFuction=1,Lm=1,FeatureState=CXC4012015
featureState : ACTIVATED

SET
FDN : SubNetwork=ONRM_ROOT_MO,MeContext=${name2},ManagedElement=${name2},SystemFuction=1,Lm=1,FeatureState=CXC4012018
featureState : ACTIVATED

SET
FDN : SubNetwork=ONRM_ROOT_MO,MeContext=${name2},ManagedElement=${name2},Transport=1,Synchronization=1,RadioEquipmentClock=1
freqDeviationThreshold : 600

SET
FDN : SubNetwork=ONRM_ROOT_MO,MeContext=${name2},ManagedElement=${name2},Equipment=1,FieldReplaceableUnit=1,RiPort=RRU-N005A
isShareWithExternalMw : true

SET
FDN : SubNetwork=ONRM_ROOT_MO,MeContext=${name2},ManagedElement=${name2},Equipment=1,FieldReplaceableUnit=1,RiPort=RRU-N005B
isShareWithExternalMw : true

SET
FDN : SubNetwork=ONRM_ROOT_MO,MeContext=${name2},ManagedElement=${name2},Equipment=1,FieldReplaceableUnit=1,RiPort=RRU-N005C
isShareWithExternalMw : true`;

        createTextFile(`${name1}_${currentDate}_${currentTime}.txt`, script1);
        createTextFile(`${name2}_${currentDate}_${currentTime}.txt`, script2);
      });

      function createTextFile(filename, content) {
        var blob = new Blob([content], { type: "text/plain" });
        var link = document.createElement("a");
        link.download = filename;
        link.href = window.URL.createObjectURL(blob);
        link.click();
      }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
