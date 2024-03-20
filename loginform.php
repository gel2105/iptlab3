<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <style>
        body {
            background: url('http://localhost/ipt_lab/unyielding-itachis-sharingan.jpg') center/cover no-repeat fixed;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;} 
        .card {
            background: rgba(255, 255, 255, 0.5); backdrop-filter: blur(10px); border-radius: 20px;
            padding: 30px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);max-width: 500pxwidth: 100%;}
        .card-header {background: transparent; text-align: center; margin-bottom: 30px;}
        .card-header h1 { color: #333; font-weight: bold }
        .form-group, .card-footer { margin-bottom: 30px; }
        .form-control {
            border: none;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
            transition: box-shadow 0.3s ease;}
        .form-control:focus {
            outline: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);}
        .btn-login {
            background: #007bff;
            border: none;
            border-radius: 20px;
            color: #fff;
            padding: 15px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;}
        .btn-login:hover {
            background: #0056b3;}
        .btn-register {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;}
        .btn-register:hover {
            color: #0056b3;}
        .error {
            color: #dc3545;
            margin-bottom: 20px;
            font-size: 14px;}
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h1>LOGIN</h1>
        </div>
        <div class="card-body">
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?= $_GET['error'] ?></p>
            <?php } ?>
            <form action="Index.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="uname" placeholder="User Name">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button class="btn btn-login btn-block" type="submit">Login</button>
            </form>
        </div>
        <div class="card-footer">
            <p>Don't have an account? <a href="registerform.php" class="btn-register">Register here</a></p>
        </div>
    </div>
</body>
</html>
