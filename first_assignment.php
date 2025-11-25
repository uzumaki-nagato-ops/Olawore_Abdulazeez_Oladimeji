<?php
// --- DATABASE CONNECTION FOR LARAGON ---
$servername = "localhost";
$username = "root";       // Default Laragon MySQL username
$password = "";           // Default Laragon MySQL password is usually empty
$dbname = "tau_sen_305";

// Create connection
$conn = mysqli_connect ($servername, $username, $password, $dbname);

// Check connection
// if ($conn) {
//     echo "Connection succesful";
// }
// else{
//     echo "connection fail";
// }

// --- HANDLE FORM SUBMISSION ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs to prevent errors
    $matric_no = $conn->real_escape_string($_POST['matric_no']);
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $middle_name = $conn->real_escape_string($_POST['middle_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $gender = $conn->real_escape_string($_POST['gender']);

    // SQL Insert Query
    $sql = "INSERT INTO tau_sen_305 (matric_no, first_name, middle_name, last_name, gender)
            VALUES ('$matric_no', '$first_name', '$middle_name', '$last_name', '$gender')";

    if ($conn->query($sql) === TRUE) {
        $message = "<div class='success-msg'>Response recorded successfully!</div>";
    } else {
        $message = "<div class='error-msg'>Error: " . $conn->error . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info Form</title>
    <style>
        /* --- GOOGLE FORM STYLING --- */
        body {
            background-color: #f0ebf8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px 0;
        }
        .container {
            max-width: 640px;
            margin: 0 auto;
        }
        /* Header styling */
        .header-card {
            background-color: white;
            border-radius: 8px;
            border-top: 10px solid rgb(103, 58, 183);
            padding: 25px;
            margin-bottom: 15px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.2);
        }
        h1 { margin: 0 0 10px 0; font-weight: 400; font-size: 32px; }
        p { font-size: 14px; color: #5f6368; }
        
        /* Input fields styling */
        .input-card {
            background-color: white;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 15px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
            border: 1px solid #dadce0;
        }
        label {
            display: block;
            font-size: 15px;
            margin-bottom: 15px;
            font-weight: 500;
        }
        input[type="text"] {
            width: 100%;
            border: none;
            border-bottom: 1px dotted #9aa0a6;
            padding: 5px 0;
            font-size: 14px;
            outline: none;
        }
        input[type="text"]:focus {
            border-bottom: 2px solid rgb(103, 58, 183);
        }
        
        /* Radio buttons */
        .radio-option {
            margin-bottom: 10px;
            font-size: 14px;
            display: flex;
            align-items: center;
        }
        input[type="radio"] {
            margin-right: 10px;
            accent-color: rgb(103, 58, 183);
        }

        /* Save button */
        .btn-submit {
            background-color: rgb(103, 58, 183);
            color: white;
            border: none;
            padding: 10px 24px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: rgb(90, 45, 165);
        }
        .success-msg {
            color: green;
            background: #e6f4ea;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .error-msg {
            color: red;
            padding: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <form method="POST" action="">
        
        <!-- Header -->
        <div class="header-card">
            <h2> THOMAS ADEWUMI UNIVERSITY STUDENT INFORMATION</h2>
            <p>Enter your details below to register.</p>
            <p style="color: red; font-size: 12px;">* Required</p>
            <?php echo $message; ?>
        </div>

        <!-- Matric No -->
        <div class="input-card">
            <label>Matric No <span style="color:red">*</span></label>
            <input type="text" name="matric_no" placeholder="Your answer" required>
        </div>

        <!-- First Name -->
        <div class="input-card">
            <label>First Name <span style="color:red">*</span></label>
            <input type="text" name="first_name" placeholder="Your answer" required>
        </div>

        <!-- Last Name -->
        <div class="input-card">
            <label>Last Name <span style="color:red">*</span></label>
            <input type="text" name="last_name" placeholder="Your answer" required>
        </div>

        <!-- Middle Name -->
        <div class="input-card">
            <label>Middle Name</label>
            <input type="text" name="middle_name" placeholder="Your answer">
        </div>

        <!-- Gender -->
        <div class="input-card">
            <label>Gender <span style="color:red">*</span></label>
            <div class="radio-option">
                <input type="radio" name="gender" value="Male" required> Male
            </div>
            <div class="radio-option">
                <input type="radio" name="gender" value="Female"> Female
            </div>
        </div>

        <!-- Save -->
        <button type="submit" class="btn-submit">Save</button>
        <div style="height: 50px;"></div>

    </form>
</div>

</body>
</html>

?>