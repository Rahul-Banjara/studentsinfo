<?php 
  require_once('studentLoginHeader.php');
  headers($pageTitle);  
  $course_id = pg_fetch_result($result, 0, 7);
  $sname = $this->session->userData('username');
?>
<?php 
  if($this->session->userData('username')){?>
    <div class="container" style="margin-top: 2%;">
      <div class="col-sm-3 col-md-2">
        <a href="#" onclick="viewFeeDetails('<?php echo $this->session->userData('username');?>')">
          <div class='' align="left" style=" padding: 10px; border-bottom: 1px solid ">
              <span id="" style="font-size: 13px;">View Fee Details</span>
          </div>
        </a>
        <a href="#" onclick="viewNotice('<?php echo $course_id ?>')">
          <div class='' align="left" style=" padding:  10px; border-bottom: 1px solid ">
              <span id="" style="font-size: 13px;">View Notice</span>
          </div>
       </a>
      <a href="#" onclick="openComplainModal('<?php echo $this->session->userData('username');?>')">
        <div class='' align="left" style=" padding: 10px; border-bottom: 1px solid ">
            <span id="" style="font-size: 13px;">Complain if information is not satisficatory</span>
        </div>
      </a>
      <a href = "<?php echo base_url().'index.php/Home/feeDeposit';?>">
        <div class='' align="left" style=" padding: 10px; border-bottom: 1px solid ">
            <span id="" style="font-size: 13px;">Deposit Fee Online</span>
        </div>
      </a>

      <a href="#" data-toggle="modal" data-target="#ChangePasswordModal"  data-backdrop="static" data-keyboard="false">
          <div class='' align="left" style=" padding:  10px; border-bottom: 1px solid ">
              <span id="" style="font-size: 13px;">Change Password</span>
          </div>
      </a>
    </div>
    <div class="col-sm-8 col-md-6 col-md-offset-2" style="margin-bottom: 6%;">
      <div class="form-horizontal">
       <h3 class=" col-sm-offset-2" style="color: blue;">Student Information</h3>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Name:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" readonly name="email" value=" <?php echo pg_fetch_result($result,0,1); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Login Password:</label>
            <div class="col-sm-5">          
              <input type="text" class="form-control"   readonly  name="pwd" value=" <?php echo pg_fetch_result($result,0,2); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Fees:</label>
            <div class="col-sm-5">          
              <input type="text" class="form-control"  name="pwd"  readonly  value=" <?php echo pg_fetch_result($result,0,3); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Course:</label>
            <div class="col-sm-5">          
              <input type="text" class="form-control"  readonly  name="pwd" value=" <?php echo pg_fetch_result($result,0,6); ?>">
            </div>
          </div>
         <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Admission Date:</label>
          <div class="col-sm-5">          
            <input type="text" class="form-control"  readonly   name="pwd" value=" <?php echo pg_fetch_result($result,0,4); ?>">
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Address:</label>
          <div class="col-sm-5">          
            <input type="text" class="form-control"  readonly  name="pwd" value=" <?php echo pg_fetch_result($result,0,5); ?>">
          </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Status:</label>
        <div class="col-sm-5">          
          <input type="text" class="form-control"  readonly  name="pwd">
        </div>
      </div>
    </div> 
    </div>
  </div>    
   



<!--<div class="center">
		<center><h4>Student details</h4>
		<h3><a class="item" href = "<?php echo base_url().'index.php/Home/feeDeposit';?>">Deposit Fee Online</a></h3>
		 </center>	
		<table id="student" border="1"  align = "center" cellspacing="0" width="50%" style="margin-top: 5%">

        		<thead>
            	<tr>
                	<th>id</th>
                	<th>name</th>
                	<th>Password</th>
                	<th>Fees</th>
                	<th>Course</th>
                	<th>Admission_date</th>
                	<th>Address</th>
            	</tr>
            	<?php
	                while($row = pg_fetch_row($result)) {
                        $sid= $row[0];
	                 	?>
	                 	<tr>
	                 		<td><?php echo $row[0];?></td>
	                 		<td><?php echo $row[1];?></td>
	                 		<td><?php echo $row[2];?></td>
	                 		<td><?php echo $row[3];?></td>
	                 		<td><?php echo $row[6];?></td>
	                 		<td><?php echo $row[4]; ?></td>
	                 		<td><?php echo $row[5];?></td>
	                 	</tr>   
	               <?php }
    	        ?>
    	     
        	</thead>
        </table>
     </div>-->  

      <!-- view fee details table data come from database  -->
        <div class="col-md-12 col-xs-12  table-responsive">
          <table  id="feedetails" class="table" border="1">
            <thead>
              <tr>
                <th>fees Id</th>
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
        <div class="col-md-12 col-xs-12  table-responsive" style="margin-top: 2%;">
          <table  id="NoticeDetails" class="table" border="1">
            <thead>
              <tr>
                <th>Notice ID</th>
                <th>Notice</th>
                <th>Notice Date</th>
                <th>Course Id</th>
              </tr>
          </thead>
          <tbody>
          </tbody>
      </table>
    </div>

      <div id="ChangePasswordModal" class="modal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Password</h4>
            </div>
            <div class="modal-body">
          <form class="form-horizontal" id="changeStudentPassword"  method="post" action="<?php echo base_url('index.php/Home/changePassword');?>">
              <div class="form-group">
                <label class="col-sm-3 col-sm-offset-1 control-label" for="old" >old Password :<span class="required" style="color: red;">*</span></label>
                  <div class="col-sm-7">
                    <input type="hidden" name="passwordStudentName" id="passwordStudentName" value="<?php echo $this->session->userData('password'); ?>">
                    <input type="text" class="form-control StudentPassword " name="old" id="oldStudentPassword" value="" required />
                    <span class="error"></span>
                 </div>
             </div>    
               <div class="form-group">
                <label class="col-sm-3 col-sm-offset-1 control-label" for="old" >New Password:<span class="required" style="color: red;">*</span></label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control StudentPassword" name="new" id="newStudentPassword" value="" required />
                    <span class="error"></span>
                 </div>
               </div> 
                  <div class="form-group">
                <label class="col-sm-3 col-sm-offset-1 control-label" for="old" >Conf Password:<span class="required" style="color: red;">*</span></label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control StudentPassword " name="confirm" id="confirmStudentPassword" value="" required/>
                    <span class="error"></span>
                 </div>
              </div>
              
        <div class="modal-footer">
          <p id="updateinfo"></p>
          <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                   <input type="submit"  class="btn btn-success PasswordStudent "  id="btnsubmit" name="changePassword" value="change Password" />
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

  <!--complain model-->
   <div id="ComplainModal" class="modal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Complain to College Administrator</h4>
            </div>
          <div class="modal-body">
          <form class="form-horizontal" id="frmupdate"  method="post" action="<?php echo base_url('index.php/Home/complainStudent');?>">
              <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="old" >Reg.Id :</label>
                  <div class="col-sm-8">
          
                    <input type="text" class="form-control" readonly  name="complain_student_id" id="complain_student_id" value=""/>
                 </div>
             </div>    
               <div class="form-group">
                <label class="col-sm-2  col-sm-offset-1 control-label" for="old" >Name:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  readonly name="complain_student_name" id="complain_student_name" value="<?php echo $this->session->userData('username') ?>" />
                 </div>
               </div> 
                <div class="form-group">
                <label class="col-sm-2  col-sm-offset-1 control-label" for="old" >Email:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" readonly  name="complain_student_email" id="complain_student_email" value=""/>
                 </div>
               </div>  
                <div class="form-group">
                <label class="col-sm-2  col-sm-offset-1 control-label" for="old" >To:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="mail_to"  readonly  id="complain_student_name" value="mgmt@ibirdscollege.com"/>
                 </div>
               </div> 
                <div class="form-group">
                <label class="col-sm-2  col-sm-offset-1 control-label" for="old" >Complain:
                <span class="required" style="color: red;">*</span> </label>
                  <div class="col-sm-8">
                    <textarea name="complainMsg" id="complainMsg" cols="52" rows="5" required class="form-control" placeholder="Type your complain message in details"></textarea>
                    
                 </div>
               </div> 
          <div class="modal-footer">
          <p id="updateinfo"></p>
           <div class="form-group">
                <div class="col-sm-offset-7 col-sm-5">
                   <input type="submit" id="submitform" class="btn btn-success ComplainSend"  name="complain" value="Send" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
        </form>
        </div>
        </div>
      </div>
    </div>
  </div>
  <!-- notice details modal to show notice data -->
    <div id="noticeDetails" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Notice From College Administration</h4>
            </div>
            <div class="modal-body">
          <form class="form-horizontal" id="frmupdate"  method="post" action="<?php echo base_url('index.php/Home/changePassword');?>">
              <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="old" >Notice Date :</label>
                  <div class="col-sm-8">
          
                    <input type="text" class="form-control" readonly name="notice_date" id="notice_date" value="" required />
                    <span class="error"></span>
                 </div>
             </div>    
               <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="old" >Notice:</label>
                  <div class="col-sm-8">
                    <textarea name="notice_details" id="notice_details" readonly cols="52" rows="5" required class="form-control" placeholder="Type your complain message in details"></textarea>
                    <span class="error"></span>
                 </div>
               </div> 
        <div class="modal-footer">
          <p id="updateinfo"></p>
          <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
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
    }else{
      redirect('Home/studentLogin');
      }
      ?>