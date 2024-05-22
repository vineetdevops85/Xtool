<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "external_alarm_master";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Upload file handling
if ($_FILES['file']['name']) {
    $filename = $_FILES['file']['tmp_name'];

    // Load the Excel file
    $spreadsheet = IOFactory::load($filename);

    // Get worksheet dimensions
    $sheet = $spreadsheet->getActiveSheet();
    $highestRow = $sheet->getHighestRow();

    // Get the value from cell A4
    $A4value = $sheet->getCell('A4')->getValue();

    // Create a temporary file to store the output
    $output_file_name = $A4value . '_External_Alarm.txt';
    $output_file_path = tempnam(sys_get_temp_dir(), 'output') . '.txt';
    $output_file = fopen($output_file_path, "w");

    // Loop through each row of the Excel file
    for ($row = 1; $row <= $highestRow; $row++) {
        // Get the port from column C (index 3)
        $port = $sheet->getCellByColumnAndRow(3, $row)->getValue();

        // Query the database
        $sql = "SELECT * FROM master_alarm WHERE port = '$port'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch data from the database
            $row_data = $result->fetch_assoc();

            // Write the header for the list
            fwrite($output_file, "CREATE\n");

            // Generate the string based on the specified format
            $generated_string = 'FDN : "SubNetwork=ONRM_ROOT_MO,MeContext=' . $A4value . ',ManagedElement=' . $A4value . ',Equipment=1,FieldReplaceableUnit=SAU-1,AlarmPort='. $row_data['port'] . "\"\n";
            $generated_string .= 'alarmPortId : "' . $row_data['port'] . "\"\n";
            $generated_string .= "administrativeState : UNLOCKED\n";
            $generated_string .= 'alarmSlogan : "' . $row_data['slogan'] . "\"\n";
            $generated_string .= "perceivedSeverity : " . $row_data['severity'] . "\n";
            $generated_string .= "normallyOpen : " . $row_data['normallyopen'] . "\n\n";

            // Write the string to the output.txt file
            fwrite($output_file, $generated_string);
        }
    }

    // Close the output.txt file
    fclose($output_file);

    // Force download the file
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $output_file_name . '"');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($output_file_path));
    ob_clean();
    flush();
    readfile($output_file_path);

    // Delete the temporary file
    unlink($output_file_path);
}

$conn->close();
?>