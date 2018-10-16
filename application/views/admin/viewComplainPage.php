<?php 
	require_once('adminLoginHeader.php');
  include('modals.php');
	headers($pageTitle);
?>
<?php 
  if($this->session->userData('username')){
?>
  <div class="container" style="margin-top: 2%;">
  <div class="row">
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
  <div class="col-md-10" style="margin-bottom: 5%;">
    <h3 align="center" style="color: blue;">Students Complain Details</h3>
      <table id="dashboard" class="display table" width="100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>Complain From</th>
            <th>From Name</th>
            <th>To</th>
            <th>Complain</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            while($row = pg_fetch_row($result)) {
              $cid= $row[0];
          ?>
              <tr>
                <td><?php echo $row[0];?></td>
                <td><?php echo $row[1];?></td>
                <td><?php echo $row[2];?></td>
                <td><?php echo $row[3];?></td>
                <td><?php echo $row[4];?></td>
                <td>
                   <button type="button" class="deleteModel btn btn-warning" data-toggle="modal" id="deleteComplain" onclick ='deleteComplain("<?php echo $row[0]?>")'>Delete</button>
                </td>
              </tr>   
          <?php 
            }
          ?>
        </tbody>  
      </table>
    </form>
  </div>
  
     <?php 
     footer();
   }  
    else{
      redirect('/admin');
    }
    ?>   
                   
