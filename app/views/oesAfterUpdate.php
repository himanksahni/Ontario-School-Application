<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./public/css/studentUpdateInfo.css">
    <link rel="stylesheet" href="./public/css/oesUpdateInfo.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <title>Update Information</title>
</head>

<body>

    <div class="alert alert-success text-center" role="alert">
        Information Updated
    </div>


    <nav class="navbar navbar-expand-lg navbar-dark navbaground">
        <a class="navbar-brand" href="#"><span class="display-4">OAS</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto moveLeftNav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?url=OesController&action=goToDashboard"><span class="textSize">Dashboard</span><span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="textSize">

                            <?php 
                                
                                echo $oesData['fName']." ".$oesData['lName'];
                            
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


    <div class="container pt-4">
        <div class="row">
            <div class="col-md col-md-offset-3">
                <form role="Form" method="POST" action="index.php?url=OesController&action=updateInfo">

                    <div class="form-group">

                        <label for="Sname">Student Name:</label>

                        <span> <?php echo " ".$studentData['fname'];  ?></span>

                        <?php echo " ".$studentData['lname'];  ?>
                    </div>

                    <div class="form-group">

                        <label for="schoolName">School Name:</label>
                        <span> <?php echo " ".$studentData['schoolName']; ?> </span>

                    </div>


                    <div class="form-group">

                        <label for="schoolName">School Seats Remaining:</label>
                        <span> <?php echo " ".$studentData['seats']; ?> </span>

                    </div>



                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" id="status" class="form-control" name="status" value="<?php echo$studentData['status']; ?>">
                    </div>
                    
                    
                     <?php
                        
                            if($studentData['type']=="S"){
                                
                               echo  "<div class='form-group'>
                                         <label for='testScore'>Test Score</label>
							             <input type='text' id='status' class='form-control' name='testScore' 
                                        value=".$studentData['testScore']."
                                        </div>";
                                
                            }
                        
                            else{
                                
                                echo  "<div class='form-group formHide'>
                                         <label for='testScore'>Test Score</label>
							             <input type='text' id='status' class='form-control formHide' name='testScore' 
                                        value=".$studentData['testScore']."
                                        </div>";
                                
                            }
                        
                        ?>

                    <div class="form-group formHide">

                        <input type="text" id="status" class="form-control formHide" name="status" value="<?php echo $studentData['applicantId']; ?>">
                    </div>

                    <div class="form-group formHide">
                        <input type="text" id="status" class="form-control formHide" name="status" value="<?php echo $studentData['schoolId']; ?>">
                    </div>


                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" id="description" class="form-control" name="description"><?php echo " ".$studentData['description']; ?> </textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btncolor btn-lg" id="submitbtn" name="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
