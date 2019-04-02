<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./public/css/studentUpdateInfo.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    

    <title>Update Information</title>
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
                                
                                echo $studentData['fName']." ".$studentData['lName'];
                            
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
                    <form role="Form" method="POST" action="index.php?url=StudentController&action=updateInfo">
						<div class="form-group">
							<label for="fname">First Name</label>
							<input type="text" id="fname" class="form-control" name="fname"
							
							value= <?php echo $studentData['fName'];  ?>
							
							
							>
						</div>
                        <div class="form-group">
							<label for="lname">Last Name</label>
							<input type="text" id="lname" class="form-control" name="lname" value=<?php echo $studentData['lName'];  ?>>
                        </div>
                        
                        <div class="form-group">

                        <label for="dob">Your DOB</label> <br>
                        <input type="date" name="dob" value=<?php echo $studentData['dob']; ?>>
                           
                            </div>
                        
                        
						<div class="form-group">
							<label for="division">Your Divion</label>
							<select id="states" class="form-control" name="division">
								<option value="Toronto" <?php if($studentData["name"]=="Toronto") echo "selected"  ?>>Toronto</option>
								<option value="Brampton" <?php if($studentData["name"]=="Brampton") echo "selected"  ?>>Brampton</option>
								<option value="Scarborough" <?php if($studentData["name"]=="Scarborough") echo "selected"  ?>>Scarborough</option>
								<option value="North York" <?php if($studentData["name"]=="North York") echo "selected"  ?>>North York</option>
								<option value="Streetsville" <?php if($studentData["name"]=="Streetsville") echo "selected"  ?>>Streetsville</option>
								<option value="Etobicoke" <?php if($studentData["name"]=="Etobicoke") echo "selected"  ?>>Etobicoke</option>
								<option value="Oakville" <?php if($studentData["name"]=="Oakville") echo "selected"  ?>>Oakville</option>
								<option value="Burlington" <?php if($studentData["name"]=="Burlington") echo "selected"  ?>>Burlington</option>
								<option value="Richmond Hill" <?php if($studentData["name"]=="Richmond Hill") echo "selected"  ?>>Richmond Hill</option>
								<option value="Port Credit" <?php if($studentData["name"]=="Port Crdit") echo "selected"  ?>>Port Crdit</option>


							</select>
                        </div>
                        <div class="form-group">
							<label for="gender">Your Gender</label>
							<select id="gender" class="form-control" name="gender">
								<option value="Male" <?php if($studentData["sex"]=="Male") echo "selected"  ?>>Male</option>
								<option value="Female" <?php if($studentData["sex"]=="Female") echo "selected"  ?>>Female</option>
								<option value="Other" <?php if($studentData["sex"]=="Other") echo "selected"  ?>>Other</option>
							</select>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="password" class="form-control" name="password">
                        </div>
						<div class="form-group">
							<label for="verifypass">Verify Password</label>
							<input type="password" id="confirmpass" class="form-control" name="verifypass">
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
