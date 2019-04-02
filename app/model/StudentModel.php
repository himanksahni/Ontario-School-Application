<?php

        
        class StudentModel
        {
            
            public $db; 
            
            
            public function __construct()
            {
                require_once 'app/config/database.php';
                $this->db = new Database();
                
            }
            
            
            public function updateStudentInfo($fn,$ln,$div,$sex,$un,$pass,$dob){
                
                
                $sql = "SELECT divisonID FROM Division WHERE name='$div'";
                $this->db->prepareSQL($sql);
                $divRow = $this->db->getSingleRecord();
                
                 /*  The code below saves the divison id in $divID variable*/
                $divID = $divRow['divisonID'];
                
                if($pass!=""){
                
                    $password = md5($pass);

                    $sql = "UPDATE Users
                            SET  fName = '$fn', lName = '$ln', password = '$password' 
                            WHERE userName = '$un'";
                    
                }
                
                else{
                    
                    $sql = "UPDATE Users
                        SET  fName = '$fn', lName = '$ln'
                        WHERE userName = '$un'";
                }
                
                $this->db->prepareSQL($sql);
                $this->db->executeSQL();
                

//                $sql= "UPDATE Applicant 
//                       SET pfName = '$fn', plName='$ln', sex='$sex', dob = '$dob',  divisonID = '$divID' WHERE userName ='$un'";
                
                 $sql= "UPDATE Applicant 
                       SET sex='$sex', dob = '$dob',  divisonID = '$divID' WHERE userName ='$un'";
                
                $this->db->prepareSQL($sql);
                $this->db->executeSQL();
                
                
                
            }
            
            
            public function getNumberOfChoices($un){
                
                $appId = $this->getAppId($un);
                $sql = "SELECT * 
                        FROM Application 
                        WHERE applicantId = ".$appId;
                $this->db->prepareSQL($sql);
                
                $choices = $this->db->getNumberofRows();
                
                return $choices;
                
            }
            
            
            public function getAppId($un){
                
                $sql = "SELECT Applicant.applicantId 
                        FROM Applicant 
                        WHERE Applicant.userName ='$un'";
                $this->db->prepareSQL($sql);
                $appId= $this->db->getSingleRecord();
                $appId = $appId['applicantId'];
                
                return $appId;
                
            }
            
            public function applyToSchool($schoolId, $un){
                
                
                $sql = "SELECT sex 
                        FROM Applicant  
                        WHERE userName ='$un'";
                
                $this->db->prepareSQL($sql);
                $sex= $this->db->getSingleRecord();
                
                 $sql = "SELECT gender 
                        FROM School 
                        WHERE schoolID = ".$schoolId;
                
                $this->db->prepareSQL($sql);
                $gender= $this->db->getSingleRecord();
                
                if($sex['sex']=="Male" && $gender['gender']=="Female" || $sex['sex']=="Female" && $gender['gender']=="Male"){
                    
                    return "cant apply";
                    
                }
                
                
                
                else{
                    
                    $appId = $this->getAppId($un);

                    $sql = "SELECT * 
                            FROM Application 
                            WHERE applicantId = ".$appId;
                    $this->db->prepareSQL($sql);

                    $choices = $this->getNumberOfChoices($un);




                    $dateApplied = date("Y-m-d");
                    $testScore = 0;

                    $checkchoice = $choice + 1;

                    if ($choice < 3 && $checkChoices==3){

                        $sql = "INSERT INTO Application(status, schoolId, applicantId, testScore, dateApplied, choice) VALUES ('Decision Pending','$schoolId', '$appId' , '$testScore', '$dateApplied', '$choices')";

                        return "lastChoice";


                    }

                    else if($choices < 3){


                        $choices = $choices + 1;

                       $sql = "INSERT INTO Application(status, schoolId, applicantId, testScore, dateApplied, choice) VALUES ('Decision Pending','$schoolId', '$appId' , '$testScore', '$dateApplied', '$choices')";



                        $this->db->prepareSQL($sql);
                        $this->db->executeSQL();

                        return "Applied";


                    }

                    else{


                        return "app";


                    }
                    
                }
                
                
                
            }
            
            
            public function getAllApplications($un){
            
                //$sql = "SELECT *, d.name as divisionName, s.name as schoolName FROM School as s INNER JOIN Division as d  WHERE s.divisonID = d.divisonID  ";
                
                $sql = "SELECT Applicant.applicantId 
                        FROM Applicant 
                        WHERE Applicant.userName ='$un'";
                
                $this->db->prepareSQL($sql);
                $appId= $this->db->getSingleRecord();
                $appId = $appId['applicantId'];
                
                $sql = "SELECT * 
                        FROM School s INNER JOIN Application aa ON (s.schoolID = aa.schoolId) 
                        WHERE aa.applicantId=".$appId;
                $this->db->prepareSQL($sql);
                return $this->db->resultSet();
            
        }
            
            
            public function getAllSchools($un){
            
                //$sql = "SELECT *, d.name as divisionName, s.name as schoolName FROM School as s INNER JOIN Division as d  WHERE s.divisonID = d.divisonID  ";
                $sql = "SELECT Applicant.applicantId 
                        FROM Applicant 
                        WHERE Applicant.userName ='$un'";
                $this->db->prepareSQL($sql);
                $appId= $this->db->getSingleRecord();
                $appId = $appId['applicantId'];
                
                
                
                $sql = "SELECT *, d.name as divisionName, s.name as schoolName, a.status as appSID 
                        FROM School as s INNER JOIN Division as d ON(s.divisonID=d.divisonID) LEFT OUTER JOIN Application as a ON(a.schoolId = s.schoolID AND a.applicantId=".$appId.")";
                    

                $this->db->prepareSQL($sql);
                return $this->db->resultSet();
            
        }
            
            
            public function createNewStudent($fn,$ln,$un,$pass,$sex,$dob,$div)
            {
                
                
                /*  The code below inserts record into user table in student Application data base*/
                
                $password = md5($pass);
                
                $sql = "SELECT fName 
                        FROM Users 
                        WHERE userName ='$un'";
                
                $this->db->prepareSQL($sql);
                $row = $this->db->getNumberofRows();
                
                if($row == 0){
                
                    $sql = "INSERT INTO 
                            Users(userName,fName,lName,password,userType) VALUES('$un','$fn','$ln','$password','student')";

                    $this->db->prepareSQL($sql);
                    $this->db->executeSQL();


                     /*  The code below selects record from Division table in student Application data base which
                        have name same as $div.
                     */
                    $sql = "SELECT divisonID 
                            FROM Division 
                            WHERE name='$div'";

                    $this->db->prepareSQL($sql);
                    $divRow = $this->db->getSingleRecord();

                     /*  The code below saves the divison id in $divID variable*/
                    $divID = $divRow['divisonID'];


                     /*  The code below inserts record into applicant table in student Application data base*/
                    $sql = "INSERT INTO 
                            Applicant(sex,dob,divisonID,userName) 
                            VALUES('$sex','$dob','$divID','$un')";

                      $this->db->prepareSQL($sql);
                      $this->db->executeSQL();
                    
                    return "created";
                    
                }
                
                else{
                    
                    return "not created";
                }
                 
            }
            
            public function getAllStudents()
            {
                $this->db->prepareSQL("SELECT * 
                                       FROM Users");
                
                return $this->db->resultSet();
            }
            
            public function getAStudent($id)
            {
                 $this->db->prepareSQL("SELECT * 
                                        FROM Users 
                                        WHERE userName ='$id'");
                
                return $this->db->getSingleRecord();
                
            }
            
            
            
            public function getAnApplicant($id)
            {
                 $this->db->prepareSQL("SELECT * 
                                        FROM Applicant a INNER JOIN Division d INNER JOIN Users u 
                                        WHERE a.userName ='$id' AND a.divisonID = d.divisonID AND u.userName = a.userName");
                
                return $this->db->getSingleRecord();
                
            }
            
            public function getAllApplicants()
            {
                $this->db->prepareSQL("SELECT * 
                                       FROM Applicant");
                
                return $this->db->resultSet();
            }
            
            
            
            public function isLoggedIn($un,$pass)
            {
                
                $loggedIn=false;
                
                $pass=md5($pass);
                
                
                $this->db->prepareSQL("SELECT * 
                                       FROM Users 
                                       WHERE userName='$un' AND password='$pass'");
                

                //If the executed query returns more than 0 rows, then the user should be logged in
                if($this->db->getNumberofRows()>0)
                {
                    $loggedIn=true;
                }
                return $loggedIn;
                
                
            }
            
            

            
        }


?>