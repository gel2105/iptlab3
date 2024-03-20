<?php  
require('db_conn.php');

// Check if email and verification code are provided in the GET request
if(isset($_GET['email']) && isset($_GET['v_code'])){
    $email = $_GET['email'];
    $v_code = $_GET['v_code'];

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM `user` WHERE `Email` = ? AND `verification_code`= ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $v_code);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check for query execution errors
    if ($stmt->error) {
        // Handle query execution error
        header("Location: loginform.php?error=" . $stmt->error);
        exit();
    }

    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        if($row['Active'] == ""){
            // Update the verification status in the database
            $update = "UPDATE user SET is_verified = 1 WHERE Email = ?";
            $stmt_update = $conn->prepare($update);
            $stmt_update->bind_param("s", $email);
            if($stmt_update->execute()){
                header("Location: loginform.php?success=Email verification successful.");
                exit();
            } else{
                header("Location: loginform.php?error=Unknown error occurred.");
                exit();
            }
        } else{
            header("Location: loginform.php?error=Email Address is already verified");
            exit();
        }
    } else {
        header("Location: loginform.php?error=Invalid verification code.");
        exit();
    }
} else {
    // Handle case where email or verification code is not provided
    header("Location: loginform.php?error=Email or verification code is missing.");
    exit();
}
?>
