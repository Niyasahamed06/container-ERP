<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gate In / Gate Out Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f5;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-width: 120px;
            margin-bottom: 10px;
        }
        .header h1 {
            font-size: 28px;
            color: #333;
            margin: 0;
        }
        h2 {
            text-align: center;
            color: #1a1a2e;
        }
        h3 {
            color: darkblue;
            text-align: left;
            margin-bottom: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .buttons {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        button {
            padding: 10px 20px;
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .section {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="./ocscl.png" alt="Company Logo">
            <h1>OCSCL DEPOT</h1>
        </div>
        
        <!-- Gate In Section -->
        <h2>Gate In</h2>
        <h3>Enter the details for Gate In</h3>
        <div class="section">
            <form id="gateInForm" action="submit_and_download.php" method="POST">
                <input type="hidden" name="formType" value="gate_in">
                <div class="form-group">
                    <label for="line">Line:</label>
                    <input type="text" id="line" name="line" placeholder="Enter Line" required>
                </div>
                <div class="form-group">
                    <label for="cntrNo">CNTR No:</label>
                    <input type="text" id="cntrNo" name="cntrNo" placeholder="Enter Container Number" required>
                </div>
                <div class="form-group">
                    <label for="truckNo">Truck No:</label>
                    <input type="text" id="truckNo" name="truckNo" placeholder="Enter Truck Number" required>
                </div>
                <div class="form-group">
                    <label for="type">Type:</label>
                    <input type="text" id="type" name="type" placeholder="Enter Type" required>
                </div>
                <div class="form-group">
                    <label for="remark">Remark:</label>
                    <input type="text" id="remark" name="remark" placeholder="Enter Remark">
                </div>
                <div class="buttons">
                    <button type="submit">Save and Download Gate In Data</button>
                </div>
            </form>
        </div>

        <!-- Gate Out Section -->
        <h2>Gate Out</h2>
        <h3>Enter the details for Gate Out</h3>
        <div class="section">
            <form id="gateOutForm" action="submit_and_download.php" method="POST">
                <input type="hidden" name="formType" value="gate_out">
                <div class="form-group">
                    <label for="bookingNo">Booking Number:</label>
                    <input type="text" id="bookingNo" name="bookingNo" placeholder="Enter Booking Number" required>
                </div>
                <div class="form-group">
                    <label for="iqamaNo">Iqama No:</label>
                    <input type="text" id="iqamaNo" name="iqamaNo" placeholder="Enter Iqama Number" required>
                </div>
                <div class="form-group">
                    <label for="truckNoOut">Truck No:</label>
                    <input type="text" id="truckNoOut" name="truckNoOut" placeholder="Enter Truck Number" required>
                </div>
                <div class="form-group">
                    <label for="driverName">Driver Name:</label>
                    <input type="text" id="driverName" name="driverName" placeholder="Enter Driver Name" required>
                </div>
                <div class="buttons">
                    <button type="submit">Save and Download Gate Out Data</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
