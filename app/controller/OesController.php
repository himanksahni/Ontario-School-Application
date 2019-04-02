<?php 

    session_start();

    class OesController{
        
        
        public $oesModel;
        
        public function __construct(){
            
            
            require_once 'app/model/OesModel.php';
            
            $this->oesModel = new OesModel();
        }
        
        public function checkIfSessionIsSet(){
            
            if(!isset($_SESSION['un'])){
            
                header("Location:index.php?url=LoginController&action=checkifLoggedOut");
            
        }
            
            else{
                
                return "go";
            }
            
        }
        
        public function goToDashboard(){
            
            if($this->checkIfSessionIsSet()=="go"){
                    $studentInfo = $this->oesModel->getAnOes($_SESSION['un']);
                    $data = [
                                
                                "fname" => $studentInfo['fName'],
                                "lname" => $studentInfo['lName']
                            ];
                    
                    require_once "app/views/oesDashboardView.php";
                }
            
        }
        
        public function noResubmitionOfForm(){
            
            if($this->checkIfSessionIsSet()=="go"){
//                $studentData = $_SESSION['sd'];
//                $oesData = $_SESSION['od'];
                
                
                $studentData = $this->oesModel->getStudentAndSchoolInfo($_SESSION['appId'],$_SESSION['schoolId'] );
                $oesData = $this->oesModel->getAnOes($_SESSION['un']);
                
                if($_SESSION['updated']=="updated"){
                    
                    unset($_SESSION['updated']);
                    require_once 'app/views/oesAfterUpdate.php';
                    
                }
                
                else{
            
                    require_once 'app/views/oesUpdateInfoView.php';
                    
                }
                    
                }
                
            }
        
        
        
        
        public function getStudentApplicationInfo(){
            
            if($this->checkIfSessionIsSet()=="go"){
                $data = $this->oesModel->getAllStudentApplications();

                $oesData = $this->oesModel->getAnOes($_SESSION['un']);

                require_once 'app/views/oesStudentApplicationView.php';
            
            }
            
        }
        
         public function goToUpdatePage(){
            
            if($this->checkIfSessionIsSet()=="go"){
                $applicantId = $_POST['aid'];
                $studentId = $_POST['sid'];
                
                $_SESSION['appId']= $applicantId;
                $_SESSION['schoolId']= $studentId;
                
                
                
               $studentData = $this->oesModel->getStudentAndSchoolInfo($applicantId, $studentId);
               $oesData = $this->oesModel->getAnOes($_SESSION['un']);
                
//                $_SESSION['sd'] = $studentData;
//                
//                $_SESSION['od'] = $oesData;
                
                $_SESSION['updated'] = "not updated";
                
                
               header("Location:index.php?url=OesController&action=noResubmitionOfForm");
                
                
            }
         
         }
        
        public function updateInfo(){
            
            $status = $_POST['status'];
            $description = $_POST['description'];
            $applicantId = $_POST['applicantId'];
            $schoolId = $_POST['schoolId'];
            $score = $_POST['testScore'];
            
            $this->oesModel->updateStudentApplication($status, $description,$schoolId,$applicantId, $score);
            
            $_SESSION['updated'] = "updated";
            
             header("Location:index.php?url=OesController&action=noResubmitionOfForm");
            
            
        }
        
    }


?>