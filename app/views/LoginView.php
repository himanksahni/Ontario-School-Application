
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> OES Login</title>
    <link rel="stylesheet" type="text/css" href="././public/css/loginView.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

</head>

<body>

    <div class="sidenav">
        <div class="login-main-text">
            <h2>OAS Application<br> Login Page</h2>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form method="POST" action="index.php?url=LoginController&action=check">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" name="username" placeholder="User Name"> 
                        
                        <span class="errorRed"><?php echo $data["error_username"]; ?> </span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <span class="errorRed"> <?php echo $data["error_password"]; ?> </span>
                    </div>
                    
                    <span class="errorRed"> <?php echo $data["error_invalidLogin"]; ?> </span> <br>
                    <button type="submit" class="btn btncolor">Login</button>
                    <a class="btn btnColorRegister" href="index.php?url=StudentController&action=addStudent">Register</a>
                </form>
                
            </div>
        </div>
    </div>
</body>

</html>
