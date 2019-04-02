<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/viewSchoolView.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <title>Student Applications</title>
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


   <div class="container-fluid">
    <table class="table table-md table-sm table-lg table-hover">
       
       <thead>
                <tr>
                    <th scope="col">Student Name</th>
                    <th scope="col">School</th>
                    <th scope="col">Status</th>
                    <th scope="col">Update</th>
                    
                </tr>
            </thead>
        
        <tbody>
         
         
             <?php 
        
        

                $numberForClasses = 0;
                foreach($data as $student){
                
                
                    
                    $numberForClasses = $numberForClasses +1;
                    echo  " 
                        <tr>
                        <th scope='row'>".$student['fname']." ".$student['lname']."</th>
                        <td>".$student['schoolName']."</td>
                        <td>".$student['status']."</td>
                        <td>
                    
                        <form method='POST' action='index.php?url=OesController&action=goToUpdatePage'>
                            <span class='formHide'>
                    
                            <input type='text' name='sid' value=".$student['schoolID'].">
                            <input type='text' name='aid' value=".$student['applicantId'].">
                            
                        </span> 
                        
                        <button type='submit' class='btn btnColorApply ".$numberForClasses."'>Update</button>";
                            
                      echo "</form> </td>
            
            
                </tr> ";
                    
                
                  
                
            }
        
        
        ?>
          
        
        </tbody>
    </table>
    
    </div>
    

</body>

</html>