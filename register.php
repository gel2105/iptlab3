<?php 
session_start();

// Include the database connection file
include "db_conn.php";

// Include the PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Function to send email verification
function sendMailWithOTP($email, $v_code) 
{
    // Include PHPMailer classes
    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'gelbertmission05@gmail.com';
        $mail->Password   = 'mcwj hwak vqpf nphm';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
    
        // Recipients
        $mail->setFrom('gelbertmission05@gmail.com', 'Gel');
        $mail->addAddress($email);     
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body    = "Thanks for registration! 
            Click the link below to verify the email address
            <a href='http://localhost/ipt_lab/verify.php?email=$email&v_code=$v_code'>Verify</a>";

    
        // Send the email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Function to sanitize and validate user input
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted using POST method and all required parameters are present
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['uname']) && isset($_POST['fname']) && isset($_POST['mname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password'])) {
    // Validate and store user input in variables
    $uname = validate($_POST['uname']);
    $fname = validate($_POST['fname']);
    $mname = validate($_POST['mname']);
    $lname = validate($_POST['lname']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
 
    // Generate a verification code
    $v_code = bin2hex(random_bytes(16));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: registerform.php?error=Invalid email format");
        exit();
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any rows returned from the database query
    if ($result->num_rows > 0) {
        // If the email already exists, redirect with an error message
        header("Location: registerform.php?error=Email already exists. Please choose another email.");
        exit();
    }

    // SQL query to insert user data into the database
    $stmt = $conn->prepare("INSERT INTO user (username, first_name, middle_name, lastname, email, password, verification_code, is_verified, Active) 
            VALUES (?, ?, ?, ?, ?, ?, ?, '0', '')");
    $stmt->bind_param("sssssss", $uname, $fname, $mname, $lname, $email, $password, $v_code);

    // Execute the SQL query
    if ($stmt->execute() && sendMailWithOTP($email, $v_code)) {
        // If registration is successful, set the username in the session and redirect to success page
        $_SESSION["username"] = $uname;  
        header("Location: success.php"); 
        exit();
    } else {
        // If registration fails, redirect to the registration form with an error message
        header("Location: registerform.php?error=Registration failed. Please try again.");
        exit();
    }
} else {
    // If the form is not submitted using POST method or required parameters are missing, redirect to the registration form
    header("Location: registerform.php?error=Email or verification code is missing.");
    exit();
}
?>

