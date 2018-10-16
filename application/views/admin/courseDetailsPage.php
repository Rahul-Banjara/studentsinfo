<?php 
	require_once('adminLoginHeader.php');
	headers($pageTitle);
  include('modals.php');
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
  <!-- fetch student records and apply data table -->
	<div class="col-md-10 w3-container" style="margin-bottom: 5%;">
    <h3 align="center" style="color: blue;">Registered Course Details</h3>
      <form name="deleteCourse" id="deleteCourse" method="post" action="<?php echo base_url().'index.php/admin/deleteMultipleCourse';?>">
 			<table id="dashboard" class="display table" width="100%">
    		<thead>
          <tr>
            <th>
              <input type="checkbox" class="checkbox" id="selectAll" />
                  <!--<input type="submit"  class=" btn btn-danger btncheck " name="delete"  id="delete" value="delete" />-->
              <button class="btn-default" name="deleteCourseRecords"  id="deleteCourseRecords" type="submit" >
                <img src="<?php echo base_url('assets/images/delete.png') ?> " width="50%" />
              </button>
            </th>
          	<th>Id</th>
          	<th>Course</th>
          	<th>Course Details</th>
          	<th>University</th>
          	<th>Duration</th>
          	<th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
	          while($row = pg_fetch_row($result)) {
              $cid= $row[0];
	        ?>
	            <tr>
             		<td><input type="checkbox" class="checkbox" name="chkdeletecid[]" value="<?php echo $cid ?>"/></td>
             		<td><?php echo $row[0];?></td>
             		<td><?php echo $row[1];?></td>
             		<td><textarea rows="3" cols="20"><?php echo $row[2];?></textarea></td>
             		<td><?php echo $row[3];?></td>
             		<td><?php echo $row[4];?></td>
	              <?php
                  $deleteUrl = 'index.php/student/delete/'.($row[0]);
                  $updateUrl = 'index.php/student/edit/'.($row[0]);  
                ?>
                <td>
                  <button type="button" class="openModal btn btn-info" data-toggle="modal"  onclick="courseUpdate('<?php echo $row[0]?>')">Update</button>
                  <button type="button" class="deleteModel btn btn-warning" data-toggle="modal" id="deleteBtn" onclick ='courseDelete("<?php echo $row[0]?>")'>Delete</button>
                </td>
	            </tr>   
	        <?php 
            }
    	    ?>
    	  </tbody>	
      </table>
    </form>
  </div>
  <div class="col-md-12 col-xs-12  table-responsive" style="margin-top: 2%;">
    <table  id="complainDetails" class="table" border="1" >
      <thead>
        <tr>
          <th>Complain ID</th>
          <th>From Email</th>
          <th>From Name</th>
          <th>To</th>
          <th>Message</th>
          <th>Student ID</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
   <div id="CourseUpdateModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Course details</h4>
            </div>
            <div class="modal-body">
          <form class="form-horizontal" id="insertCourseUpdateData"  method="post" action="<?php echo base_url('index.php/admin/updateCourse');?>">
              <div class="form-group formRightMargin">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="Course" >Course:<span class="required" style="color: red;">*</span>
                </label>
                  <div class="col-sm-8"><input type="text" class="form-control UpdateCourse RemoveContent CharOnly " name="courseUpdateName" id="courseUpdateName" value="" required />
                 </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="Course" >University:<span class="required" style="color: red;">*</span>
                </label>
                  <div class="col-sm-8">
                  <input type="hidden" class="form-control" name="courseUpdateId" id="courseUpdateId" value=""/>
                  <input type="text" class="form-control UpdateCourse RemoveContent CharOnly " name="courseUpdateUniversity" id="courseUpdateUniversity" value="" required />
                 </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="Course" >Duration:<span class="required" style="color: red;">*</span>
                </label>
                  <div class="col-sm-8"><input type="text" class="form-control UpdateCourse RemoveContent  " name="courseUpdateDuration" id="courseUpdateDuration" value="" required />
                 </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="Course" >Course Name:<span class="required" style="color: red;">*</span>
                </label>
                  <div class="col-sm-8"><input type="text" class="form-control UpdateCourse RemoveContent " name="courseUpdateFullName" id="courseUpdateFullName" value="" required/>
                 </div>
              </div>
               <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="old" >Course Details:<span class="required" style="color: red;">*</span>
                </label>
                  <div class="col-sm-8">
                    <textarea name="courseUpdateDetails" id="courseUpdateDetails" cols="52" rows="5" required class="form-control UpdateCourse RemoveContent " placeholder="Type course Details in details" required></textarea>  
                 </div>
               </div> 
          <div class="modal-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                   <input type="submit" id="coursUpdate" class="btn btn-primary CourseUpdate " name="CourseUpdate" value="Update" />
                   <input type="reset" name="reset" class =" btn btn-danger" value="Reset"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
            </div>
        </div>
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
  