<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> OES Login</title>
    <link rel="stylesheet" type="text/css" href="././public/css/registerationView.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

</head>

<body>

    <div class="sidenav">
        <div class="login-main-text">
            <h2>OAS Application<br> Registeration Page</h2>
        </div>
    </div>
    
    
    <div class="main">
       
        <div class="col-sm-12 col-md-12">
            
            <div class="alert alert-success text-center" role="alert">
                Registeration Completed  <a href="index.php"class="btn btnColorRegister">Login</a>
            </div>
            
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form method="POST" action="index.php?url=StudentController&action=addStudent">
                   
                    <div class="form-group">
                        <label>Fisrt Name</label>
                        <input type="text" class="form-control" name="fname" placeholder="First Name" value=<?php echo $data['fname']; ?>> <span class="errorRed">
                        
                        <?php echo $data['NO_FNAME_ERROR'];
                        
                        ?> </span>
                        
                    </div>
                    
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lname" placeholder="Last Name" value=<?php echo $data['lname']; ?>>
                        
                       <span class="errorRed"> <?php echo $data['NO_LNAME_ERROR'];
                        
                           ?> </span>
                        
                        
                        
                    </div>
                    
                    <div class="form-group">
                                  
                                  <select id="inputState" class="form-control" name="sex">
                                    <option value="" selected>Sex</option>
                                    <option value="Male" <?php if($data["sex"]=="Male") echo "selected"  ?> > Male</option>
                                    <option value="Female" <?php if($data["sex"]=="Female") echo "selected"  ?>> Female</option>
                                    <option value="Other" <?php if($data["sex"]=="Other") echo "selected"  ?>>Other</option>
                                  </select>
                                  
                                <span class="errorRed"> <?php echo $data['NO_SEX_ERROR'];
                        
                                    ?> </span>
                        </div>
                        
                        
                        <div class="form-group">
                                  
                                  <select id="inputState" class="form-control" name="division">
                                   
                                    <option value="" selected>Division</option>
                                    
                                    <option value="Toronto" <?php if($data["division"]=="Toronto") echo "selected"  ?> > Toronto</option>
                                    
                                    <option value="Scarborough" <?php if($data["division"]=="Scarborough") echo "selected"  ?> > Scarborough</option>
                                    
                                    
                                    <option value="Etobicoke" <?php if($data["division"]=="Etobicoke") echo "selected"  ?> > Etobicoke</option>
                                    
                                    <option value="Brampton" <?php if($data["division"]=="Brampton") echo "selected"  ?> > Brampton </option>
                                    
                                    <option value="Oakville" <?php if($data["division"]=="Oakville") echo "selected"  ?> > Oakville</option>
                                    
                                    <option value="Burlington" <?php if($data["division"]=="Burlington") echo "selected"  ?> > Burlington </option>
                                    
                                    <option value="North York" <?php if($data["division"]=="North York") echo "selected"  ?> > North York</option>
                                    
                                    <option value="Port Credit" <?php if($data["divisoin"]=="Port Credit") echo "selected"  ?> > Port Credit </option>
                                    
                                    <option value="Richmond Hill" <?php if($data["division"]=="Richmond Hill") echo "selected"  ?> > Richmond Hill</option>
                                    
                                    <option value="Streetsville" <?php if($data["division"]=="Streetsville") echo "selected"  ?> > Streetsville</option>
                                    
                                   <?php echo $data['NO_DIVISION_ERROR']; ?>
                                  </select>
                                  
                            <span class="errorRed">  <?php echo $data["NO_DIVISION_ERROR"]; ?> </span>
                        </div>
                        
                     <div class="form-group">

                        <input type="date" name="dob" value=<?php echo $data['dob']; ?>> <br>
                        
                       <span class="errorRed"> <?php echo $data['NO_DOB_ERROR'];
                        
                           ?> </span>
                                                               
                           
                            </div>
                    
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="User Name" value=<?php echo $data['username'];?>>
                        
                      <span class="errorRed">  <?php echo $data['NO_USERNAME_ERROR'];
                        
                          ?> </span>
                        
                        
                        
                    </div>
                    
                    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        
                    <span class="errorRed">    <?php echo $data['NO_PASSWORD_ERROR'];
                        
                        ?> </span>
                        
                        
                    </div>
                    
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
                        
                       <span class="errorRed"> <?php echo $data['NO_CPASSWORD_ERROR'];
                        
                           ?> </span>
                        
                        
                    </div>
                    
                    
                    <button type="submit" class="btn btncolor">Register</button>
                    <button type="reset" class="btn btnColorRegister">Reset</button>
                    <a href="index.php"class="btn btnColorRegister">Login</a> <br>
                    <?php echo $data['register']; ?>
                    
                    <?php echo $data['division']; ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>