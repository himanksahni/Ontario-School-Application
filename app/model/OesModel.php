<?php 

    class OesModel{
        
        
        public $db;
        
        public function __construct()
            
        {
            
            require_once 'app/config/database.php';
            $this->db = new Database();
            
        }
        
         public function updateStudentApplication($status, $description,$schoolId,$applicantId, $score){
             
             $tscore = intval($score);
             $sql="UPDATE Application
                    SET  status = '$status', description = '$description', testScore = '$tscore'
                    WHERE applicantId = '$applicantId' AND schoolId = '$schoolId'";
             
             $this->db->prepareSQL($sql);
             $this->db->executeSQL();
             
             if($status=="Accepted" or $status=="accepted" ){
                 
                $sql = "SELECT seats 
                        FROM School 
                        WHERE schoolID='$schoolId'";
                $this->db->prepareSQL($sql);
                $data=$this->db->getSingleRecord();
             
                $seats = $data['seats'];
             
                $seats = $seats - 1;
             
                $sql = "UPDATE School
                        SET  seats = '$seats'
                        WHERE schoolId = '$schoolId'";
                 $this->db->prepareSQL($sql);
                 $this->db->executeSQL();
         
            
             }
         
         }
        
         public function getStudentAndSchoolInfo($applicantId, $schoolId){
             
             
             $sql = "SELECT s.type as type, aa.testScore as testScore, aa.applicantId as applicantId, aa.schoolId as schoolId,  u.fName as fname, u.lName as lname, aa.status as status, aa.description as description, s.seats as seats, s.name as schoolName  
             FROM Applicant a INNER JOIN Application aa ON(a.applicantId=aa.applicantId) 
                              INNER JOIN School s ON(s.schoolID = aa.schoolId)
                              INNER JOIN Users u on(a.userName = u.userName)
                              WHERE aa.applicantId =".$applicantId." AND aa.schoolId = ".$schoolId;
             
             $this->db->prepareSQL($sql);
             return $this->db->getSingleRecord();
         }
        
        
         public function getAllStudentApplications(){
            

            $sql = "SELECT u.fName AS fname, u.lName AS lname, s.name AS schoolName, aa.status, s.seats,           s.schoolID, a.applicantId            
                    FROM School s INNER JOIN Application aa ON (s.schoolID = aa.schoolId) 
                                  INNER join Applicant a ON(aa.applicantId = a.applicantId) 
                                  INNER JOIN Users u ON (a.userName = u.userName)";
            
            $this->db->prepareSQL($sql);
            return $this->db->resultSet();
            
        }
        
        public function getAnOes($un){
            
            $this->db->prepareSQL("SELECT * 
                                    FROM Users 
                                    WHERE userName ='$un'");
                
                return $this->db->getSingleRecord();
            
            
        }
        
        
        
    }

?>