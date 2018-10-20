<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
public function __construct() {
    	parent:: __construct();
        //$this->load->model('student_model','sm');  
	}

    public function index(){ 
    	$data['pageTitle'] = 'Welcome to iBirds Collegs';
    	$this->load->view('index',$data); 
    	
    }//trainning and placement page
     public function Trainning(){
        $data['pageTitle'] = 'Trainning & placement';
        $this->load->view('trainningPage.php',$data);
    }
    // call admin controller 
    public function adminLogin(){
        redirect('/admin');
    }// call student login page 
    public function studentLogin(){
        $data['pageTitle'] = 'Login';
        $this->load->view('LoginPage.php',$data);
    }//academic page
    public function Academic(){
        $data['pageTitle'] = 'Academic';
        $this->load->view('AcademicPage',$data);
    }// admission page
    public function admission(){
        $data['pageTitle'] = 'Admission process';
        $this->load->view('AdmissionPage',$data);
    }//contact us page
    public function contactUs(){
        $data['pageTitle'] = 'contactUs';
        $this->load->view('contactUsPage',$data);
    }//about us page
    public function AboutUs(){
        $data['pageTitle'] = 'AboutUs';
        $this->load->view('aboutUsPage',$data);
    }// login page check user exists or not and set session usint set_userdata()
   public function loginAction(){
        $this->form_validation->set_error_delimiters('<div class="errorshow alert alert-danger" style "color:red;">','</div>');
  
  
        $this->form_validation->set_rules('username', 'Username:', 'required|trim|xss_clean|callback_validation');  
        $this->form_validation->set_rules('password', 'Password:', 'required|trim');  
         
        if ($this->form_validation->run()){  
            $data = array(  
                'username' => $this->input->post('username'), 
                'password' => $this->input->post('password'), 
                );    
                 $this->session->set_userdata($data);
                redirect('Home/studentDashboard');  
        }else {  
            $data['pageTitle'] = 'Login';
            $this->load->view('LoginPage',$data);  
            }  
    }
    public function validation(){  
         
        if ($this->sm->log_in_correctly()){  
            return true;  
        } else {  
            $this->form_validation->set_message('validation', 'Incorrect username/password.');  
            return false;  
             }  
    }//user dashboard page open if user exist in database
    public function studentDashboard(){
        $username =$this->session->userData('username');
        //var_dump($username);

        $data['pageTitle'] = 'Welcome Student Panel';
        $res = $this->sm->fetchRecords($username);
        if($res){
            $data['result'] = $res;
            $this->load->view('studentDashboardPage',$data);
        }
     }   
    function getTouch(){
         $insertRecordArray = array(
            'contact_name' => $this->input->post('name'),
            'contact_email' => $this->input->post('email'),
            'contact_phone' => (int)$this->input->post('phone'),
            'contact_address' => $this->input->post('addres'),
            'contact_message' =>pg_escape_string($this->input->post('feedback')),
        );
        var_dump($insertRecordArray);
        $this->load->model('student_model','sm');   
        $res = $this->sm->insertFeedback($insertRecordArray);
        if($res){
          redirect(base_url('index.php/Home/contactUs'));
          }
    } 
    function logout(){
        $this->session->sess_destroy();  
        $data['pageTitle'] = 'Welcome to iBirds Collegs';
        $this->load->view('index',$data);   
    } 
    function changePassword(){
        $oldpassword = array();
        $oldDatabase;
        $old = $this->input->post('old');
        $new = $this->input->post('new');
        $confirm = $this->input->post('confirm');
        $username =$this->session->userData('username');
        $oldpassword = $this->sm->fetchPassword($username);
        $oldDatabase = $oldpassword[0];
        $data = array();
        if($old == $oldDatabase){
            var_dump('equal');
             $data=array(
            'student_password' => $this->input->post('new'),
           
            );
            $res = $this->sm->updatePassword($data);
            if($res){
            $this->session->set_userdata('password', $new);
            redirect(base_url('index.php/Home/studentDashboard'));
            }
        }else{
              redirect(base_url('index.php/Home/studentDashboard'));
        }
        
    }
        //fee deposit page open 
    function feeDeposit(){
        $data['pageTitle'] = 'Deposit Fee online';
        $this->load->view('depositFeePage',$data);   
    } 
    //deposit student fee
    function studentFeeDeposit(){
        if(isset($_POST['feeDeposit'])){
            $sum = 0;
            $username =$this->session->userData('username');

            $tutionfee = (int)$this->input->post('tutionfeeconfirm');
            $transportfee = (int)$this->input->post('transportfeeconfirm');
            $hostelfee = (int)$this->input->post('hostelfeeconfirm');
            $examfee = (int)$this->input->post('examfeeconfirm');
            $developmentfee = (int)$this->input->post('developmentfeeconfirm');
            $activityfee = (int)$this->input->post('activityfeeconfirm');
            $remark = $this->input->post('remarkconfirm');
            $paid_date = date("Y/m/d");
            $sum = $tutionfee+$transportfee+$hostelfee+$examfee+$developmentfee+$activityfee;
            $txnid = uniqid();
            $data = array(  
                'txnid' => $txnid, 
                'amount' => $sum, 
                'paid_date' => $paid_date,
                'student_name' => $username,
                'remark' =>$remark,
                );
             if($sum > 0){       
                $res = $this->sm->feeDepositConfirm($data);
                if($res){
                    $data['pageTitle'] = 'confirm fee deposited';
                    $data['txnid'] = $txnid;
                    $this->load->view('feeconfirmationPage',$data);
                }
            }else{
                 $data['pageTitle'] = 'Deposit Fee online';
                $this->load->view('depositFeePage',$data);   
            }

        }
        
    }
    //complain student 
    public function complainInformation(){
        if(isset($_REQUEST['sname'])){
            $student_name = $_REQUEST['sname'];
            $res = $this->sm->selectStudentRecords($student_name);
            if($res){
            echo json_encode(pg_fetch_all($res));
            } 
        }
        
    }
    public function getStudentPassword(){
        if(isset($_REQUEST['user'])){
            $oldUserPassword = $_REQUEST['user'];
            $res = $this->sm->selectOldPassword($oldUserPassword);
            if($res){
                echo json_encode(pg_fetch_all($res));
            } 
        }
    }
    //complain student information form data send to database
    public function complainStudent(){
        if(isset($_POST['complain'])){
            $student_id = (int)$this->input->post('complain_student_id');
            $from_name = $this->input->post('complain_student_name');
            $from_email = $this->input->post('complain_student_email');
            $complain_to = $this->input->post('mail_to');
            $message = pg_escape_string($this->input->post('complainMsg'));
            $complain = array(
            'from_name' => $from_name, 
            'from_email' => $from_email, 
            'complain_to' => $complain_to,
            'message' => $message,
            'student_id' =>$student_id,      
            );
             $res = $this->sm->sendComplain($complain);
             if($res){
                 $data['pageTitle'] = 'complain';
                 $data['to'] = $complain_to;
                 $data['message'] = $message;
                $this->load->view('complainPage',$data);
             }
        }
    }
    //get fee details
     public function getFeeDetails(){
        if(isset($_REQUEST['sname'])){
            $student_name = $_REQUEST['sname'];
            $res = $this->sm->selectFeeRecords($student_name);

            echo json_encode(pg_fetch_all($res)); 
        }
        
    }//get search item from requerst and searh from database 
    public function searchItem(){  
            $flag = 1;
            $searchItem = $_REQUEST['search'];
            $data['pageTitle'] = 'Welcome to Ibirds';
                if(strlen($searchItem) > 0){
                    $flag = 0;
                    $res = $this->sm->fetchSearchRecords(strtolower($searchItem));
                    if(pg_num_rows($res) > 0){
                        $data['result'] = $res;
                        $data['searchItem'] = $searchItem;
                        $this->load->view('studentSearchPage',$data);
                    }else{
                        $data['error'] = "Your selectd course is not available";
                        $data['result']='';
                        $data['searchItem'] = $searchItem;
                        $this->load->view('studentSearchPage',$data);
                        }   
                }

    }
    //get notice details
    public function getNoticeInformation(){
        if(isset($_REQUEST['id'])){
            $course_id = (int)$_REQUEST['id'];
            $res = $this->sm->selectNoticeRecords($course_id);

            echo json_encode(pg_fetch_all($res)); 
        }

    }//get course subject details 
    public function getDetails($id){
        if(!empty($id)){
            $course_id = (int)$id;
            $res = $this->sm->fetchCourseDetails($id);
            if($res){
                $data['pageTitle'] = 'Course details';
                 $data['result'] = $res;
                $this->load->view('courseDetailsPage',$data);
            }
        }
    }
    public function getAllCourse(){
        $res = $this->sm->selectAllCourse();
        echo json_encode(pg_fetch_all($res)); 
    }
}
?>
