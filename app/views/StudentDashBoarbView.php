<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="././public/css/studentDashboard.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbaground">
        <a class="navbar-brand" href="#"><span class="display-4">OAS</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto moveLeftNav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?url=StudentController&action=goToDashboard"><span class="textSize">Dashboard</span><span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="textSize">
                        
                            <?php 
                                
                                echo $data['fname']." ".$data['lname'];
                            
                            ?>
                        
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="index.php?url=LoginController&action=logOut">Log Out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container cards">


        <div class="row pt-4">
            <div class="col pt-4" align="center">
               <a href="index.php?url=StudentController&action=getApplication"> <div class="card " style="width: 18rem;">
                    <img class="card-img-top" src="public/img/appStatus.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">View your Application Status</h5>
                    </div>
                   </div> </a>
            </div>
            <div class="col pt-4" align="center">

                <a href="index.php?url=StudentController&action=getSchool"><div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="public/img/viewSchools.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">View Schools</h5>
                    </div>
                    </div></a>

            </div>
            
            <div class="col pt-4 pb-4" align="center">

                <a href="index.php?url=StudentController&action=getStudentInfo"><div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="public/img/updateInfo.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Update your information</h5>
                    </div>

                    </div></a>

            </div>
        </div>
<!--
        <div class="row pt-md-4 pb-md-4" align="center">
            <div class="col">

                <a href="index.php?url=StudentController&action=getStudentInfo"><div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="public/img/updateInfo.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Update your information</h5>
                    </div>

                    </div></a>

            </div>
            <div class="col" align="center">

                <a href=""><div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="public/img/testScores.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">View your Tests Scores</h5>
                    </div>
                    </div></a>

            </div>
        </div>
-->


    </div>




</body>

</html>
