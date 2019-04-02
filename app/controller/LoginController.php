<?php 

    session_start();
    class LoginController
    
    {
        public $model;
        public function __construct()
            
        {
            
            require_once 'app/model/StudentModel.php';
            
            $this->model = new StudentModel();
        }
        

        
        public function stopResubmitionOfForm(){
            
            $studentInfo = $this->model->getAStudent($_SESSION['un']);
            $type = $studentInfo['userType'];
                
            $data = [
                                
                                "fname" => $studentInfo['fName'],
                                "lname" => $studentInfo['lName']
                            ];
            
            if($type=="student"){
                require_once "app/views/StudentDashBoarbView.php";
            }
            
            else{
                
                require_once "app/views/oesDashboardView.php";
                
            }
            
        }
        
        /*
        
            This function checks if the user is logged out or not.
        
        */
        
        public function checkifLoggedOut(){
            
            if(!isset($_SESSION['un'])){
                
                header("Location:index.php?url=LoginController&action=check");
            }
            
        }
        
        /*
        
            This functio logs out a user when logout is pressed
        
        */
        
        
        public function logOut(){
            
            if(isset($_SESSION['un'])){
                
                unset($_SESSION['un']);
                header("Location:index.php?url=LoginController&action=check");
            }
        }
        
        
        
         /* 
            This function checks if the username and password
            entered by the suer is correct or not. This code also 
            checks if the the user all the information before logging 
            in or not.
        */
        
        public function check()
        
        {
            
            if (isset($_SESSION['un'])){
            
        
                    
                    $studentInfo = $this->model->getAStudent($_SESSION['un']);
                    $type = $studentInfo['userType'];
                
                    $data = [
                                
                                "fname" => $studentInfo['fName'],
                                "lname" => $studentInfo['lName']
                            ];
            
                    if($type=="student"){
                        require_once "app/views/StudentDashBoarbView.php";
                    }
            
                    else{
                   
                    require_once "app/views/oesDashboardView.php";
                
            }
        }
            
            else if($_SERVER["REQUEST_METHOD"]=="POST")
                
            {
                
                $data = 
                    
                [
                    
                    "username" => $_POST["username"],
                    "password" => $_POST["password"],
                    "error_username" => "",
                    "error_password" => "",
                    "error_invalidLogin" => ""    
                    
                ];
                
                
                if(empty($data["username"]))
                    
                {
                    
                    $data["error_username"] = NO_USERNAME_ERROR;
                }
                
                
                if (empty($data["password"]))
                {
                    $data["error_password"]=NO_PASSWORD_ERROR;
                }
                
                
                
                if(!empty($data['username'])   && !empty($data['password']))
                {
                        $loggedIn= $this->model->isLoggedIn($data['username'],$data['password']);
                        
                        //Username and password field pair matches a record in the database
                        if($loggedIn==true)
                        {
                            //TODO
                            
                            $studentInfo = $this->model->getAStudent($data['username']);
                            
                            $_SESSION['un'] = $data['username'];
                            $_SESSION["apply"] = "noClick";
                            
                            $data = [
                                
                                "fname" => $studentInfo['fName'],
                                "lname" => $studentInfo['lName']
                            ];
                            
                            
                            header("Location:index.php?url=LoginController&action=stopResubmitionOfForm");
                        }
                    
                    
                        else
                        {
                            
                            $data["error_invalidLogin"]=INVALID_LOGIN_ERROR;
                    
                    
                            require_once 'app/views/LoginView.php';
                        }
                
                
            }
                
            
            // if the above condition is not sattisfied
                
            else
                {
                    require_once 'app/views/LoginView.php';
                }
            
            
        }
            
            
        else
            
            {
            
            
                
                 $data=
                [
                        "username" =>"",
                        "password" => "",
                        "error_username"=>"",
                        "error_password" =>"",
                        "error_invalidLogin" => ""

                    ];

                    require_once 'app/views/LoginView.php';
                
                
                
            }
    
    }
        
    }


?>