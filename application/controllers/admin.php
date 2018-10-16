<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
public function __construct() {
    	parent:: __construct();
 		$this->load->model('admin/Admin_model','am'); 
	}

    public function index(){ 
    	$data['pageTitle'] = 'Welcome to iBirds Collegs';
    	$this->load->view('admin/index',$data); 
    	
    }
    public function login_action(){
    	$this->form_validation->set_error_delimiters('<div class="errorshow alert alert-danger" style "color:red;">','</div>');
  
  
        $this->form_validation->set_rules('username', 'Username:', 'required|trim|xss_clean|callback_validation');  
        $this->form_validation->set_rules('password', 'Password:', 'required|trim');  
         
        if ($this->form_validation->run()){  
            $data = array(  
                'username' => $this->input->post('username'), 
                'password' => $this->input->post('password'),  
                'currently_logged_in' => 1  
                );    
                $this->session->set_userdata($data);
                redirect('admin/AdminDashboard');  
        }else {  
        	$data['pageTitle'] = 'Welcome';
            $this->load->view('admin/index',$data);  
            }  
    }
    public function validation(){  
  		$this->load->model('admin/Admin_model','am'); 
        if ($this->am->log_in_correctly()){  
            return true;  
        } else {  
            $this->form_validation->set_message('validation', 'Incorrect username/password.');  
            return false;  
             }  
    }
    public function AdminDashboard(){
    	
    	$data['pageTitle'] = 'Welcome Admin';
    	$res = $this->am->fetchRecords();
        $data['course'] = $this->am->selectAllCourse();
        if($res){
            $data['result'] = $res;
    		$this->load->view('admin/AdminDashboardPage',$data);
    	}
    }
    //add multiple student page
    public function addMultipleStudent(){
        $data['pageTitle'] = 'Add multiple Student';
        $data['course'] = $this->am->selectAllCourse();
        $this->load->view('admin/addMultipleStudentPage',$data);
    }
 	public function updateRecords(){
 		if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            $res = $this->am->selectRecords($id);

            echo json_encode(pg_fetch_all($res)); 
        }
 		
 	}
    public function updateCourseRecords(){
        if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            $res = $this->am->selectCourseRecords($id);

            echo json_encode(pg_fetch_all($res)); 
        }
        
    }
     public function updateStudent(){
        $sid = (int)$this->input->post('studentUpdateId');
        $student_name = pg_escape_string($this->input->post('student_name'));
        $res = $this->am->updateStudent($sid);
        redirect(base_url('index.php/admin/AdminDashboard'));
    }
     public function updateCourse(){
        $cid = (int)$this->input->post('courseUpdateId');
        $res = $this->am->updateCourse($cid);
        redirect(base_url('index.php/admin/viewCourse'));
    }
     public function delete(){
        $sid = (int)$this->input->post('studentDeleteId');
        $res = $this->am->deleteRecord($sid);
        if($res){
        redirect(base_url('index.php/admin/AdminDashboard'));
        }
    }
    public function deleteComplain(){
        $complain_id = (int)$this->input->post('ComplainDeleteId');
        $res = $this->am->deleteComplainRecord($complain_id);
        if($res){
        redirect(base_url('index.php/admin/viewComplain'));
        }
    }
     public function deleteCourse(){
        $cid = (int)$this->input->post('courseDeleteId');
        $res = $this->am->deleteCourseRecord($cid);
        if($res){
        redirect(base_url('index.php/admin/viewCourse'));
        }
    }
    public function insertStudent(){

        $insertRecordArray = array(
            'student_name' => pg_escape_string($this->input->post('student_name')),
            'student_email' => $this->input->post('student_email'),
            'course_id' => (int)$this->input->post('student_course'),
            'student_fees' => (int)$this->input->post('student_fees'),
            'student_adate' =>$this->input->post('student_adate'),
            'student_address' => pg_escape_string($this->input->post('student_address')),
        );
        var_dump($insertRecordArray);
        
        $res = $this->am->insertStudentRecords($insertRecordArray);
        if($res){
          redirect(base_url('index.php/admin/AdminDashboard'));
          }
    }
     function updateMultiple(){
        $updateMultipleArray = array();
    //$student_id = $this->input->post('chkdeletesid');
        if(isset($_POST['update'])){
            $student_id = json_decode($_POST['studentMultipleId']);
            $updateMultipleArray['student'] = $student_id;
            $this->load->view('updateAllPage.php',$updateMultipleArray);
        }
        if(isset($_POST['delete'])){
             echo "hello";
        //$updateMultipleArray = $this->input->post('studentMultipleId');
            $details = json_decode($_POST['studentMultipleId']);
             $res = $this->am->deleteUser($details);
            if($res){
                redirect(base_url('index.php/admin/AdminDashboard'));
                }

        }
    }
    function deleteCourseMultiple(){
        if(isset($_POST['deleteMultipleCourse'])){
            $details = json_decode($_POST['courseMultipleId']);
            var_dump($details);
            $res = $this->am->deleteMultipleCourse($details);
            if($res){
                redirect(base_url('index.php/admin/viewCourse'));
                }
        }
    }
    function insertCourse(){
        $insertRecordArray = array(
            'course' => $this->input->post('student_course'),
            'university' => $this->input->post('courseUniversity'),
            'duration' => $this->input->post('courseDuration'),
            'full_name' => $this->input->post('courseFullName'),
            'course_details' => pg_escape_string($this->input->post('CourseDetails')),
        );
        $res = $this->am->insertCourseRecord($insertRecordArray);
        if($res){
          redirect(base_url('index.php/admin/AdminDashboard'));
          }
    }
    /*public function dataTable(){
           $res = $this->am->dataTable();
           $Data=array();
            $query = "SELECT * FROM student";
            pg_fetch_all($query);
         while( $row = pg_fetch_row($result)){ 
                $Data[] = $row;
             }   
             var_dump($data);

             $json_data = array(
            "iTotalRecords" => count($Data),
            "iTotalDisplayRecords" => count($Data),
            "aaData"=>$Data);           
            echo json_encode($json_data); 
        
        
    }*/
     function logout(){
        $this->session->sess_destroy();  
        $data['pageTitle'] = 'Welcome to iBirds Collegs';
        $this->load->view('admin/index',$data);   
    }
    function changePassword(){
        $oldpassword = array();
        $oldDatabase;
        $old = $this->input->post('old');
        $new = $this->input->post('new');
        $confirm = $this->input->post('confirm');
        $username =$this->session->userData('username');
        $oldpassword = $this->am->fetchPassword($username);
        $oldDatabase = $oldpassword[0];
        var_dump($old);
        var_dump($oldDatabase);
        $data = array();
        $data=array(
            'admin_password' => $this->input->post('new'),
           
        );
         
       
        $res = $this->am->updatePassword($data);
        if($res){
             $this->session->set_userdata('password', $new);
            redirect(base_url('index.php/admin/AdminDashboard'));
        }
 
        
    }
    function sendNotice(){
        if(isset($_POST['notice'])){
            //$admin_name = $this->input->post('admin_name');
            $course_id = (int)$this->input->post('student_course');
            $noticeMsg = pg_escape_string($this->input->post('noticeMsg'));
            $noticeDate = $this->input->post('notice_date');
            $notice = array(
            'notice_details' => $noticeMsg, 
            'notice_date' => $noticeDate, 
            'course_id' => $course_id,   
            );
             $res = $this->am->sendNotice($notice);
             if($res){
                 $data['pageTitle'] = 'send notice';
                 $data['message'] = $noticeMsg;
                $this->load->view('admin/sendnoticePage',$data);
             }
        }
    }
    function viewFeeDetails(){
        $data['pageTitle'] = 'view Student Fee Details';
        $this->load->view('admin/viewFeeDetailsPage',$data); 
        
    }
    function viewComplain(){
        $data['pageTitle'] = 'view Student Complain Details';
         $res = $this->am->selectComplainRecords();
        if($res){
            $data['result'] = $res;
           $this->load->view('admin/viewComplainPage',$data);   
        }
        
    }
    function getFee(){
        if(isset($_REQUEST['sname'])){
            $student_name = $_REQUEST['sname'];
            $res = $this->am->selectFeeRecords($student_name);
            echo json_encode(pg_fetch_all($res)); 
        }
    }
    function getComplain(){
            $res = $this->am->selectComplainRecords();
            echo json_encode(pg_fetch_all($res)); 
        
    }
    function insertMultipleRecord(){
        $name = $_REQUEST['sname'];
        $fee = $_REQUEST['fee'];
        $adate = $_REQUEST['adate'];
        $course = $_REQUEST['course'];
        $address = $_REQUEST['address'];
        $email = $_REQUEST['student_email'];
        $data = array();
        foreach($name as $key=>$val)
        {
             $data[$key]['student_name'] = $name[$key];
             $data[$key]['student_fees'] = $fee[$key];
             $data[$key]['student_adate'] = $adate[$key];
             $data[$key]['student_address'] = $address[$key];
             $data[$key]['course_id'] = (int)$course[$key];
             $data[$key]['student_email'] = $email[$key];
        }
        var_dump($data);
        $res = $this->am->insertMultipleRecords($data);
        if($res){
        redirect('admin/AdminDashboard');    
        }
    }
    function viewCourse(){
        $data['pageTitle'] = 'Welcome Admin';
        $res = $this->am->fetchCourseRecords();
        if($res){
            $data['result'] = $res;
            $this->load->view('admin/courseDetailsPage',$data);
        }
    }
}
