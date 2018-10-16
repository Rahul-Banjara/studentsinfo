<?php  
class Admin_Model extends CI_Model {  
    public function log_in_correctly() {  
        $this->db->where('admin_user', $this->input->post('username'));  
        $this->db->where('admin_password', $this->input->post('password'));  
        $query = $this->db->get('admin_user');  
        if ($query->num_rows() == 1){  
            return true;  
        } else {  
            return false;  
            }  
    }
    function fetchRecords(){    
        $query = pg_query("select student.id, student.student_name,student.student_password,student.student_fees,student.student_adate,student.student_address,courseinfo.course from student join courseinfo on student.course_id = courseinfo.course_id ");
        return $query;
    }  
    function selectRecords($sid){
        $this->db->where('id',$sid);
        //$query = $this->db->get('student');
        $query = pg_query( "SELECT * FROM student join courseinfo on student.course_id = courseInfo.course_id WHERE id = '{$sid}'");
        //if($query->num_rows() == 1){
           return $query;
            //exit();
        /*}else{
            return false;
        }*/
    }
    function selectCourseRecords($cid){
        //$this->db->where('id',$sid);
        $query = pg_query( "SELECT DISTINCT * FROM courseinfo WHERE course_id = '{$cid}'");
        
           return $query;
    }
    public function updateStudent($sid){
        $data=array(
            'student_name' => $this->input->post('student_name'),
            'course_id' => (int)$this->input->post('course'),
            'student_fees' => $this->input->post('student_fees'),
            'student_adate' => $this->input->post('student_adate'),
            'student_address' => $this->input->post('student_address'),
        );
        if($sid == 0){
            return $this->db->insert('student',$data);
        }else{
            $this->db->where('id',$sid);
            return $this->db->update('student',$data);
            }        
    }
     public function updateCourse($cid){
        $data=array(
            'course' => $this->input->post('courseUpdateName'),
            'course_details' => $this->input->post('courseUpdateDetails'),
            'university' => $this->input->post('courseUpdateUniversity'),
            'duration' => $this->input->post('courseUpdateDuration'),
            'full_name' => $this->input->post('courseUpdateFullName'),
        );
        if($cid == 0){
            return $this->db->insert('courseinfo',$data);
        }else{
            $this->db->where('course_id',$cid);
            return $this->db->update('courseinfo',$data);
            }        
    }
    function deleteRecord($sid){
        if(isset($sid)){
        $this->db->where('id', $sid);
        return $this->db->delete('student');
        }
    }
     function deleteCourseRecord($cid){
        if(isset($cid)){
        $this->db->where('course_id', $cid);
        return $this->db->delete('courseinfo');
        }
    }
    function deleteComplainRecord($cid){
        if(isset($cid)){
        $this->db->where('complain_id', $cid);
        return $this->db->delete('complain');
        }
    }
    public function insertStudentRecords($insertArray){    
        if(!empty($insertArray)){
            return $this->db->insert('student', $insertArray);
        }
    }
    function deleteUser($data){
        if (!empty($data)) {
             $this->db->where_in('id', $data);
            return $this->db->delete('student');
        }
    }  
    function insertCourseRecord($data){
        if(!empty($data)){
           return  $this->db->insert('courseinfo', $data);
        }
    }  
    function fetchAllRecords(){
        $query = pg_query("select student.id, student.student_name,student.student_password,student.student_fees,student.student_adate,student.student_address,courseinfo.course from student join courseinfo on student.course_id = courseinfo.course_id ");
        return $query;
        vardump(pg_fetch_all($query));
    
        while($row = pg_fetch_row($query)){
                      $Data[] = $row;
                      var_dump($row);
               } 
               var_dump($Data);
               $json_data = array(
                "iTotalRecords" => count($Data),
                "iTotalDisplayRecords" => count($Data),
                "aaData"=>$Data);
                var_dump($json_data);  
                exit();         
       // echo json_encode($json_data);         
    }
    function fetchPassword($name){
        $query = pg_query( "SELECT admin_password FROM admin_user WHERE admin_user = '{$name}'");
        //return $query;
        $arr = pg_fetch_array($query, 0, PGSQL_NUM);
        //var_dump($arr);
        return $arr;
    }
    public function updatePassword($data){
        if(!empty($data)){
        $username =$this->session->userData('username');  
        
        $this->db->where('admin_user',$username);
        return $this->db->update('admin_user',$data);
        }
    }
    function sendNotice($notice){
        if(!empty($notice)){
            return  $this->db->insert('notice', $notice);
        }
    }
    function selectFeeRecords($sname){
        $this->db->where('student_name',$sname);
        //$query = $this->db->get('student');
        $query = pg_query( "SELECT * FROM fees  WHERE student_name = '{$sname}'");
        //if($query->num_rows() == 1){
           return $query;
            //exit();
        /*}else{
            return false;
        }*/
    }
    function selectComplainRecords(){
        $query = pg_query( "SELECT * FROM complain");
        return $query;
          
    }
     function insertMultipleRecords($data){
        var_dump($data);
        return $this->db->insert_batch('student', $data);
    }//update multiple student records 
     function fetchcourseRecords(){    
        $query = pg_query("SELECT * FROM courseinfo");
        return $query;
    }
     function deleteMultipleCourse($data){
        if (!empty($data)) {
             $this->db->where_in('course_id', $data);
            return $this->db->delete('courseinfo');
        }
    }
     function selectAllCourse(){
      $courseArray = array();
      $query = $this->db->query( "SELECT course_id,course FROM courseinfo");
      if($query->num_rows() > 0){
           $courseArray = $query->result_array();
      }
      return $courseArray;
     }
}  
?>  