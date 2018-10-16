<?php  
  
class student_model extends CI_Model {  
  
   function fetchRecord(){    
        $query = pg_query("select * from student");
        return $query;
    }
 public function log_in_correctly() {  
        $this->db->where('student_name', $this->input->post('username'));  
        $this->db->where('student_password', $this->input->post('password'));  
        $query = $this->db->get('student');  
        //$where = "student_name='".$name."' AND student_password='".$password."' OR student_email='".$email."'";
        if ($query->num_rows() == 1){  
            return true;  
        } else {  
            return false;  
            }  
    }
    function insertFeedback($data){
        if(!empty($data)){
           return  $this->db->insert('contact', $data);
        }
    }  
       function fetchRecords($username){    
        $query = pg_query("select student.id, student.student_name,student.student_password,student.student_fees,student.student_adate,student.student_address,courseinfo.course, courseinfo.course_id from student join courseinfo on student.course_id = courseinfo.course_id where student_name = '{$username}'");
        return $query;
    } 
    function fetchPassword($name){
        $query = pg_query( "SELECT student_password FROM student WHERE student_name = '{$name}'");
        //return $query;
        $arr = pg_fetch_array($query, 0, PGSQL_NUM);
        //var_dump($arr);
        return $arr;
    } 
     public function updatePassword($data){
        if(!empty($data)){
        $username =$this->session->userData('username');  
        
        $this->db->where('student_name',$username);
        return $this->db->update('student',$data);
        }
        
    }
    function feeDepositConfirm($data){
         if(!empty($data)){
           return  $this->db->insert('fees', $data);
        }
    }

     function selectStudentRecords($sname){
        $this->db->where('student_name',$sname);
        //$query = $this->db->get('student');
        $query = pg_query( "SELECT * FROM student  WHERE student_name = '{$sname}'");
        //if($query->num_rows() == 1){
           return $query;
            //exit();
        /*}else{
            return false;
        }*/
    }
    function sendComplain($complain){
        if(!empty($complain)){
            return  $this->db->insert('complain', $complain);
        }
    }
    function selectFeeRecords($sname){
        $this->db->where('student_name',$sname);
        $query = pg_query( "SELECT * FROM fees  WHERE student_name = '{$sname}'");
        //if($query->num_rows() == 1){
           return $query;
            
    }
    function fetchSearchRecords($search){    
        $query = pg_query("SELECT * FROM courseinfo  WHERE course like '{$search}%'");
        return $query;
      }
    function selectNoticeRecords($id){
        $query = pg_query("SELECT * FROM notice  WHERE course_id = '{$id}'");
        return $query;
    }
     function fetchCourse($name){
        $query = pg_query( "SELECT DISTINCT course FROM courseinfo WHERE course = '{$name}'");
        //return $query;
        $arr = pg_fetch_array($query, 0, PGSQL_NUM);
        //var_dump($arr);
        return $arr;
    } 
    function fetchCourseDetails($course_id){
        $cid = (int)$course_id;
         $query = pg_query("SELECT DISTINCT  semester.sem_id,
                                string_agg(semester.sem_name, '&&& '),
                                string_agg(subject.sub_name, '&&& ') 
                            FROM semester join subject on semester.sem_id = subject.sem_id where
            course_id = '{$cid}' group by semester.sem_id");
        $res =  pg_fetch_all($query);
        $resultArr = array();
        /*if(count($res) > 0){
            foreach ($res as  $value) {
               $resultArr[$value['sem_id']][] = $value['sub_name'];
            }   
        }*/
      return $res;
    }
    function fetchDatabaseCourse(){
        $query = pg_query( "SELECT DISTINCT course FROM courseinfo ");
        $courseArray = pg_fetch_all($query);
        return $courseArray;
    } 
     function selectOldPassword($sname){
        $this->db->where('student_password',$sname);
        //$query = $this->db->get('student');
        $query = pg_query( "SELECT student_password FROM student  WHERE student_name = '{$sname}'");
      return $query;
     }
     function selectAllCourse(){
      $query = pg_query( "SELECT DISTINCT course,course_id FROM courseinfo");
      return $query;
     }
}
?>  