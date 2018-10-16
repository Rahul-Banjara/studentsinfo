<?php 
	require_once('adminLoginHeader.php');
  include('modals.php');
	headers($pageTitle);
?>
<?php 
  if($this->session->userData('username')){
?>
  <div class="container" style="margin-top: 2%;">
  <div class="row" style="margin-bottom: 18%;">
    <div class="col-sm-3 col-md-2">
      <a href="<?php echo base_url().'index.php/admin/AdminDashboard';?>">
          <div class='' align="left" style=" padding: 10px; border-bottom: 1px solid ">
            <span id="" style="font-size: 13px;">Dashboard</span>
        </div>
      </a>
      <a href="#" onclick="openInsertModal()">
          <div class='' align="left" style=" padding: 10px; border-bottom: 1px solid ">
            <span id="" style="font-size: 13px;">Add Student</span>
        </div>
      </a>
       <a href="<?php echo base_url().'index.php/admin/addMultipleStudent';?>">
         <div class='' align="left" style=" padding: 10px; border-bottom: 1px solid ">
            <span id="" style="font-size: 13px;">Add Multiple Student</span>
        </div>
      </a>
      <a href="#"  onclick="openInsertCourseModal()">
        <div class='' align="left" style=" padding:  10px; border-bottom: 1px solid ">
          <span id="" style="font-size: 13px;">Add Course</span>
        </div>
      </a>
       <a href="<?php echo base_url().'index.php/admin/viewCourse';?>">
          <div class='' align="left" style=" padding: 10px; border-bottom: 1px solid ">
            <span id="" style="font-size: 13px;">View Courses</span>
        </div>
      </a>
      <a href="<?php echo base_url().'index.php/admin/viewFeeDetails';?>"  onclick="">
        <div class='' align="left" style=" padding:  10px; border-bottom: 1px solid ">
          <span id="" style="font-size: 13px;">View Fee Details</span>
        </div>
      </a>
      <a href="#"  onclick="openNoticeModal()">
        <div class='' align="left" style=" padding:  10px; border-bottom: 1px solid ">
          <span id="" style="font-size: 13px;">Send Notice</span>
        </div>
      </a>
      <a href="<?php echo base_url().'index.php/admin/viewComplain';?>"  onclick="viewComplain()">
        <div class='' align="left" style=" padding:  10px; border-bottom: 1px solid ">
          <span id="" style="font-size: 13px;">View Complain</span>
        </div>
      </a>
     
      <a href="#" onclick = "changeAdminPassword()">
      <div class='' align="left" style=" padding:  10px; border-bottom: 1px solid ">
          <span id="" style="font-size: 13px;">Change Password</span>
      </div>
  </a>
    </div>
  <div class="container col-md-8 col-md-offset-1">
    <h2>Search Student Fee Details</h2>
    <p >Search student fee details By Student Name</p>
    <form class="form-inline" action=" ">
      <div class="form-group">
        <label for="Name">Student Name:</label>
        <input type="Text" class="form-control" id="searchFeeStudentName"  placeholder="Search By Name" name="sname" />
      </div>
      <button type="button" id="searchFee" name="searchFee" class="btn btn-success" onclick="viewFee()">View Fee</button>
    </form>
  </div>
    
      <div class="col-md-8 col-xs-12  col-md-offset-1 table-responsive">
          <table  id="feeStudentDetails" class="table" border="1">
            <thead>
              <tr>
                <th>Fees Id</th>
                <th>Transaction Id</th>
                <th>Amount</th>
                <th>Name</th>
                <th>Date</th>
                <th>Remark</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
      </div>
    </div>
  </div>  
     <?php 
     footer();
   }  
    else{
      redirect('/admin');
    }
    ?>   
                   
