<?php
$servername = "sql310.infinityfree.com";
$username = "if0_37343425";
$password = "jdW95e0qNbAwR3k";
$dbname = "if0_37343425_ocscl";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form type
$formType = $_POST['formType'] ?? '';

// Set headers for Excel file download
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=" . ($formType == "gate_in" ? "gatein_data.xls" : "gateout_data.xls"));

// Set Saudi time
date_default_timezone_set('Asia/Riyadh');
$date = date('Y-m-d');
$time = date('H:i:s');

// Create a professional header with enhanced styling
echo "<table style='width:100%; border-collapse: collapse; border: 1px solid black; font-family: Arial, sans-serif;'>";
echo "<tr><td colspan='4' style='text-align: center; font-weight: bold; font-size: 24px; border: 1px solid black;'>ORIENTAL COMMERCIAL AND SHIPPING CO., LTD.</td></tr>";
echo "<tr><td colspan='4' style='text-align: center; font-weight: bold; font-size: 24px; border: 1px solid black;'>DEPOT NO.6</td></tr>";
echo "<tr><td colspan='4' style='text-align: center; border: 1px solid black; font-size: 16px;'>Established in 1956, Comm. Reg. 4030000006</td></tr>";
echo "<tr><td colspan='4' style='text-align: center; border: 1px solid black; font-size: 16px;'>TEL: 6481584 | FAX: +966126475775</td></tr>";
echo "<tr><td colspan='4' style='text-align: center; border: 1px solid black; font-size: 16px;'>P.O.BOX 160 Jeddah 21411 | E.MAIL: sultan.aw@ocscl.com</td></tr>";
echo "<tr><td colspan='4' style='border: 1px solid black;'><br></td></tr>"; // Spacing

if ($formType == "gate_in") {
    // Sanitize inputs to prevent SQL injection
    $line = $conn->real_escape_string($_POST['line']);
    $cntrNo = $conn->real_escape_string($_POST['cntrNo']);
    $truckNo = $conn->real_escape_string($_POST['truckNo']);
    $type = $conn->real_escape_string($_POST['type']);
    $remark = $conn->real_escape_string($_POST['remark']);

    // Insert Gate In data
    $sql = "INSERT INTO gate_in (line, cntr_no, truck_no, type, remark) 
            VALUES ('$line', '$cntrNo', '$truckNo', '$type', '$remark')";
    
    if (!$conn->query($sql)) {
        die("Error inserting Gate In data: " . $conn->error);
    }

    // Prepare to download Gate In data as Excel
    echo "<tr><td colspan='4' style='text-align: center; font-weight: bold; font-size: 20px; border: 1px solid black;'>GATE IN REPORT</td></tr>";
    echo "<tr><td colspan='2' style='border: 1px solid black; font-weight: bold;'>DATE:</td><td colspan='2' style='border: 1px solid black;'>$date</td></tr>";
    echo "<tr><td colspan='2' style='border: 1px solid black; font-weight: bold;'>TIME:</td><td colspan='2' style='border: 1px solid black;'>$time</td></tr>";
    echo "<tr><td colspan='2' style='border: 1px solid black; font-weight: bold;'>TRUCK NO:</td><td colspan='2' style='border: 1px solid black;'>$truckNo</td></tr>";
    echo "<tr><td colspan='4' style='border: 1px solid black; font-weight: bold;'>Damage Report:</td></tr>";
    echo "<tr><td colspan='4'>";
    echo "<table style='width:100%; border-collapse: collapse; border: 1px solid black;'>";
    echo "<tr><th style='border: 1px solid black; background-color: #f2f2f2;'>DMG</th><th style='border: 1px solid black; background-color: #f2f2f2;'>DESCRIPTION</th></tr>";
    for ($i = 1; $i <= 10; $i++) {
        echo "<tr><td style='border: 1px solid black;'>$i</td><td style='border: 1px solid black;'>*</td></tr>";
    }
    echo "</table>";
    echo "</td></tr>";
    echo "<tr><td colspan='4' style='border: 1px solid black;'>REMARKS: $remark</td></tr>";
    echo "<tr><td style='border: 1px solid black;'>DRIVER SIGNATURE:</td><td style='border: 1px solid black;'></td><td style='border: 1px solid black;'>INSPECTOR SIGNATURE:</td><td style='border: 1px solid black;'></td></tr>";
    echo "<tr><td colspan='4' style='border: 1px solid black;'>PLEASE MARK CLEARLY ALL DAMAGES AND DEFICIENCIES.</td></tr>";
    echo "<tr><td colspan='4' style='border: 1px solid black;'>SYMBOLS: BR-BROKEN; S-SCRAPE; C-CUT; B-BRUISE; H-HOLE; M-MISSING; D-DENT; T-TEAR</td></tr>";

} elseif ($formType == "gate_out") {
    // Sanitize inputs to prevent SQL injection
    $bookingNo = $conn->real_escape_string($_POST['bookingNo']);
    $iqamaNo = $conn->real_escape_string($_POST['iqamaNo']);
    $truckNo = $conn->real_escape_string($_POST['truckNoOut']);
    $driverName = $conn->real_escape_string($_POST['driverName']);

    // Insert Gate Out data
    $sql = "INSERT INTO gate_out (booking_no, iqama_no, truck_no, driver_name) 
            VALUES ('$bookingNo', '$iqamaNo', '$truckNo', '$driverName')";
    
    if (!$conn->query($sql)) {
        die("Error inserting Gate Out data: " . $conn->error);
    }

    // Prepare to download Gate Out data as Excel
    echo "<tr><td colspan='4' style='text-align: center; font-weight: bold; font-size: 20px; border: 1px solid black;'>GATE OUT REPORT</td></tr>";
    echo "<tr><td style='border: 1px solid black; font-weight: bold;'>BOOKING NUMBER:</td><td style='border: 1px solid black;'>$bookingNo</td><td style='border: 1px solid black; font-weight: bold;'>IQAMA NO:</td><td style='border: 1px solid black;'>$iqamaNo</td></tr>";
    echo "<tr><td style='border: 1px solid black; font-weight: bold;'>TRUCK NO:</td><td style='border: 1px solid black;'>$truckNo</td><td style='border: 1px solid black; font-weight: bold;'>DRIVER NAME:</td><td style='border: 1px solid black;'>$driverName</td></tr>";
    echo "<tr><td style='border: 1px solid black; font-weight: bold;'>DATE:</td><td style='border: 1px solid black;'>$date</td><td style='border: 1px solid black; font-weight: bold;'>TIME:</td><td style='border: 1px solid black;'>$time</td></tr>";
    echo "<tr><td style='border: 1px solid black; font-weight: bold;'>DRIVER SIGNATURE:</td><td style='border: 1px solid black;'></td><td style='border: 1px solid black;'>INSPECTOR SIGNATURE:</td><td style='border: 1px solid black;'></td></tr>";
}

// Close the database connection
$conn->close();

// End of the table
echo "</table>";
?>
