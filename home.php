<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <style>
        body {
            background-color: #2c3e50; 
            font-family: Arial, sans-serif; }
        .container {
            margin-top: 100px;}
        .card {
            border: 2px solid #28a745; 
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 0.8); }
        .card-header {
            background-color: #28a745;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px; }
        .card-body, .card-footer {
            text-align: center; }
        .display-4 {
            font-size: 2.5rem; }
            .display-2 {
            font-size: 2rem; }
        .btn-outline-success { 
            color: #28a745;
            border-color: #28a745;}
        .btn-outline-success:hover {
            color: #fff;
            background-color: #28a745; 
            border-color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="display-4 text-success">Logged in!</h1>
                    </div>
                    <div class="card-body">
                        <h2 class="display-2 text-success">SANA PALARIN BIGYAN PLUS POINTS</h2>
                    </div>
                    <div class="card-footer">
                        <a href="loginform.php" class="btn btn-outline-success d-grid gap-2 col-6 mx-auto">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>
