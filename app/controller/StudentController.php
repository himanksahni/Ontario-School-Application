<?php
    
    session_start();


    class StudentController
    
    {
        
        public $studentModel;

        
        
        public function __construct()
        {
            
            require_once 'app/model/StudentModel.php';
            
            $this->studentModel = new StudentModel();
        }
        
        
        public function checkIfSessionIsSet(){
            
            if(!isset($_SESSION['un'])){
            
                header("Location:index.php?url=LoginController&action=checkifLoggedOut");
            
        }
            
            else{
                
                return "go";
            }
            
        }
        
        
        public function apply(){
            
            if($this->checkIfSessionIsSet()=="go"){
            
                $schoolId = $_POST['sid'];

                $data = $this->studentModel->applyToSchool($schoolId, $_SESSION['un'] );
                
                
                
                
                
                
                if($data=="cant apply"){
                    
                    //echo "hello";
                    $_SESSION["apply"] = "ca";
                    header("Location: index.php?url=StudentController&action=getSchool");
                    
                }
                
                
                
                
                
                
                else{
            
                if($data=="Applied"){
                
                    $_SESSION["apply"] = "Applied";
                    //$this->getSchool();
                    header("Location: index.php?url=StudentController&action=getSchool");
                }
                else if ($data=="LastChoice"){
                
                    $_SESSION["apply"] = "noClick";
                
                   header("Location: index.php?url=StudentController&action=getSchool");

                }
            
                else{
                
                    $_SESSION["apply"] = "LastChoice";
                
                    //header("Location: index.php?url=StudentController&action=getSchool");
                
                }
            
            }
                
            }
            
        }
        
        
        
        public function goToDashboard(){
            
            if($this->checkIfSessionIsSet()=="go"){
                    $studentInfo = $this->studentModel->getAStudent($_SESSION['un']);
                    $data = [
                                
                                "fname" => $studentInfo['fName'],
                                "lname" => $studentInfo['lName']
                            ];
                    
                    require_once "app/views/StudentDashBoarbView.php";
                }
            
        }
        public function updateInfo(){
            
            
            if($this->checkIfSessionIsSet()=="go"){
                $this->studentModel->updateStudentInfo($_POST['fname'], $_POST['lname'], $_POST['division'], $_POST['gender'], $_SESSION['un'], $_POST['password'], $_POST['dob']);   

                header("Location:index.php?url=StudentController&action=getStudentInfo");
        
            }
        }
        
        
        
        
        public function getStudentInfo(){
        
            if($this->checkIfSessionIsSet()=="go"){
            
                $studentData = $this->studentModel->getAnApplicant($_SESSION['un']);
                require_once 'app/views/studentUpdateInfoView.php';
            }
            
        }
        
        
        public function getApplication(){
            
            if($this->checkIfSessionIsSet()=="go"){
                $data = $this->studentModel->getAllApplications($_SESSION['un']);

                $studentData = $this->studentModel->getAStudent($_SESSION['un']);

                require_once 'app/views/applicationStatusView.php';
            
            }
            
        }
        
        
        public function getSchool(){
            
            
            if($this->checkIfSessionIsSet()=="go"){
                $data = $this->studentModel->getAllSchools($_SESSION['un']);

                $studentData = $this->studentModel->getAStudent($_SESSION['un']);
                
                $choices=$this->studentModel->getNumberOfChoices($_SESSION['un']);
                
                
                
                if($_SESSION["apply"]=="ca"){
                    
                    require_once 'app/views/viewSchoolView2.php';
                    
                }
                
                else{
                    

                    if($choices>=3){

                        $_SESSION["apply"] = "LastChoice";
                    }

                    if($choices<3){

                        $_SESSION["apply"] = "Applied";
                    }

                    require_once 'app/views/viewSchoolView.php';

                }
                
            }
            
        }
        
        
        public function addStudent(){
            
            //this checks if the form was submitted or not
            
            if($_SERVER["REQUEST_METHOD"]=="POST")
                
            {
                
                $data = [  
                
                    "fname" => $_POST["fname"],
                    "lname" => $_POST["lname"],
                    "dob" => $_POST["dob"],
                    "username" => $_POST["username"],
                    "password" => $_POST["password"],
                    "sex" => $_POST["sex"],
                    "cpassword" => $_POST["cpassword"],
                    "division" => $_POST["division"],
                    "un" => "",
                    
                    "NO_FNAME_ERROR" => "",
                    "NO_LNAME_ERROR" => "",
                    "NO_USERNAME_ERROR" => "",
                    "NO_PASSWORD_ERROR" =>"",
                    "NO_SEX_ERROR" => "",
                    "NO_DOB_ERROR" => "",
                    "NO_CPASSWORD_ERROR" =>"",
                    "NO_DIVISION_ERROR" =>"",
                    "register" => ""
                
                
                ];
                
                if(empty($data["fname"])){
                    
                    $data["NO_FNAME_ERROR"] = "You must enter first name";
                }
                
                if(empty($data["lname"])){
                    
                    $data["NO_LNAME_ERROR"] = "You must enter last name";
                }
                
                if(empty($data["username"])){
                    
                    $data["NO_USERNAME_ERROR"] = "You must enter username";
                }
                
                if(empty($data["password"])){
                    
                    $data["NO_PASSWORD_ERROR"] = "You must enter password";
                }
                
                if(empty($data["sex"])){
                    
                    $data["NO_SEX_ERROR"] = "You must select your sex";
                }
                
                if(empty($data["dob"])){
                    
                    $data["NO_DOB_ERROR"] = "You must select your dob";
                }
                
                if(empty($data["cpassword"])){
                    
                    $data["NO_CPASSWORD_ERROR"] = "You must enter confirm password";
                }
                
                if(empty($data["division"])){
                    
                    $data["NO_DIVISION_ERROR"] = "You must select your division";
                }
                
                
                if(!empty($data["fname"]) &&
                   !empty($data["lname"]) &&
                   !empty($data["username"]) &&
                   !empty($data["password"]) &&
                   !empty($data["cpassword"]) &&
                   !empty($data["division"]) &&
                   !empty($data["dob"]) &&
                   !empty($data["sex"])
                  
                  )
                    
                {
                    
                   $studentCreated =  $this->studentModel->createNewStudent($data["fname"],$data["lname"],$data["username"],$data["password"],$data["sex"],$data["dob"],$data["division"]);
                    
                    if($studentCreated == "created"){

                        $data["fname"]="";
                        $data["lname"]="";
                        $data["dob"]="";
                        $data["sex"]="";
                        $data["username"]="";
                        $data[ "password"]="";
                        $data["cpassword" ]="";
                        $data["division" ]="";
                        
                        //echo "heloo";
                    
                    require_once 'app/views/registerationCompleteView.php';
                        
                    }
                    
                    else{
                        

                        $data["fname"]="";
                        $data["lname"]="";
                        $data["dob"]="";
                        $data["sex"]="";
                        $data["username"]="";
                        $data[ "password"]="";
                        $data["cpassword" ]="";
                        $data["division" ]="";
                        $data["un"]="Sorry, Username already exists";
                        
                        require_once 'app/views/registerationView.php';
                        
                    }
                    
                }
                
                else{
                    
                    
                    require_once 'app/views/registerationView.php';
                }
                
            }
            
            
            else{
                
                $data = [
                    
                    "fname" =>"",
                    "lname" =>"",
                    "username" =>"",
                    "password" =>"",
                    "dob" =>"",
                    "sex" =>"",
                    "cpassword" =>"",
                    "division" =>"",
                    "un" => "",
                    
                    "NO_FNAME_ERROR" => "",
                    "NO_LNAME_ERROR" => "",
                    "NO_USERNAME_ERROR" => "",
                    "NO_PASSWORD_ERROR" =>"",
                    "NO_SEX_ERROR" => "",
                    "NO_DOB_ERROR" => "",
                    "NO_CPASSWORD_ERROR" =>"",
                    "NO_DIVISION_ERROR" =>"",
                    "register" => ""
                    
                ];
                
               require_once 'app/views/registerationView.php'; 
                
            }
            
            
        }
        
        
        
        
    }


?>