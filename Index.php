<?php
session_start();
include "db_conn.php";

// Function to validate user input
function validate($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the username and password are provided
if (isset($_POST['uname']) && isset($_POST['password'])) {
    // Validate the provided username and password
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    // Check if the username or password is empty
    if (empty($uname) || empty($pass)) {
        header("Location: loginform.php?error=User Name and Password are required");
        exit();
    } else {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM user WHERE username=?");
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $result = $stmt->get_result();

        // Handle query execution error
        if (!$result) {
            header("Location: loginform.php?error=Error retrieving user data");
            exit();
        }

        // Check if the query returned exactly one row (user found)
        if ($result->num_rows === 1) {
            // Get the user data as an associative array
            $row = $result->fetch_assoc();

            // Check if the user's email is verified
            if ($row['is_verified'] == 1) {
                // Check if the password matches
                if ($pass === $row['password']) { // No need for password_verify
                    // Store user data in the session
                    $_SESSION["username"] = $row['username'];
                    $_SESSION["name"] = $row['name'];
                    $_SESSION["id"] = $row['id'];
                    // Redirect to the home page
                    header("Location: home.php");
                    exit();
                } else {
                    // Redirect with an error message if the password is incorrect
                    header("Location: loginform.php?error=Incorrect User Name or password");
                    exit();
                }
            } else {
                // Redirect with an error message if the email is not verified
                header("Location: loginform.php?error=Check your Email to verify");
                exit();
            }
        } else {
            // Redirect with an error message if the user is not found
            header("Location: loginform.php?error=Incorrect User Name or password");
            exit();
        }
    }
} else {
    // Redirect if the username or password is not provided
    header("Location: loginform.php");
    exit();
}
?>
