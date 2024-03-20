<?php 
session_start();

// Check if there are any previous form inputs stored in session
$uname = isset($_SESSION['uname']) ? $_SESSION['uname'] : '';
$fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : '';
$mname = isset($_SESSION['mname']) ? $_SESSION['mname'] : '';
$lname = isset($_SESSION['lname']) ? $_SESSION['lname'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

// Clear previous form inputs stored in session
unset($_SESSION['uname']);
unset($_SESSION['fname']);
unset($_SESSION['mname']);
unset($_SESSION['lname']);
unset($_SESSION['email']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('http://localhost/ipt_lab/unyielding-itachis-sharingan.jpg');
            background-size: cover;
            font-family: Arial, sans-serif; /* Font family */
            padding: 20px;}
        .card {
            background-color: rgba(255, 255, 255, 0.5); /* Card background color with transparency */
            border: none; /* No border */
            border-radius: 25px; /* Rounded corners */ }
        .card-header {
            background-color: rgba(0, 123, 255, 0.8); /* Header background color with transparency */
            color: rgba(255, 255, 255, 0.8); /* Header text color with transparency */
            border-top-left-radius: 25px; /* Rounded corners */
            border-top-right-radius: 25px; /* Rounded corners */ }
        .btn-register {
            background-color: #007bff; /* Button background color */
            border: none;}
        .btn-register:hover {
            background-color: #0056b3; /* Button hover background color */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="display-4 text-center" style="color: rgba(255, 255, 255, 0.8);">REGISTER</h1> <!-- Transparent text color -->
                    </div>
                    <div class="card-body">
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?= $_GET['error'] ?></p>
                        <?php } ?>
                        <form action="register.php" method="post">
                            <div class="form-group">
                                <label for="uname">User Name</label>
                                <input type="text" class="form-control" name="uname" id="uname" placeholder="Enter your username" value="<?= $uname ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter your first name" value="<?= $fname ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="lname">Middle Name</label>
                                <input type="text" class="form-control" name="mname" id="mname" placeholder="Enter your middle name" value="<?= $mname ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter your last name" value="<?= $lname ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="termsCheck" required>
                                <label class="form-check-label" for="termsCheck">I agree to the <a href="#">terms and conditions</a></label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-register">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Already have an account? <a href="loginform.php">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
