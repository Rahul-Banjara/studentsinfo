<?php 
 require_once('studentLoginHeader.php');
 headers($pageTitle);  
   
?>
<?php 
    if($this->session->userData('username')){
 ?>
 <div class="container" style="margin-top: 3%;">
    <div class=" col-md-2 col-sm-3">
       <a href="<?php echo base_url().'index.php/Home/studentDashboard';?>">
          <div class='' align="left" style=" padding: 10px; border-bottom: 1px solid ">
              <span id="" style="font-size: 13px;">Dashboard</span>
          </div>
      </a>
      <a href="#" onclick="viewFeeDetails('<?php echo $this->session->userData('username');?>')">
          <div class='' align="left" style=" padding: 10px; border-bottom: 1px solid ">
              <span id="" style="font-size: 13px;">View Fee Details</span>
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
<div class="feedeposit col-md-10" id="feedeposit" style="margin-bottom: 19%;">
	<table id="student" border="1"  align = "center" cellspacing="0" width="50%" style="margin-top: 3%" class="table">
		 <form class="form-horizontal" id="frmupdate"  method="post" action=" ">
        <thead>
            <tr>
                <th colspan="6" style="text-align: center;">Fill Details for Submit fee Online</th>
            </tr>
        </thead>
        <tbody>
        	<tr>
        		<td>Tution fee</td>
        		<td><input type ="text" name="tutionfee" id="tutionfee" class="digitOnly fee"></td>
        		<td>TransPort Fee</td>
        		<td><input type ="text" name="transportfee" id="transportfee" class="digitOnly fee"></td>
      		</tr>   
      		<tr>
        		<td>Exam fee</td>
        		<td><input type ="text" name="examfee" id="examfee" class="digitOnly fee"></td>
        		<td>Hostel fee</td>
        		<td><input type ="text" name="hostelfee" id="hostelfee" class="digitOnly fee"></td>
      		</tr>   
      		<tr>
        		<td>Development fee</td>
        		<td><input type ="text" name="developmentfee" id="devlopmentfee" class="digitOnly fee"></td>
        		<td>Activity fee</td>
        		<td><input type ="text" name="activityfee" id="activityfee" class="digitOnly fee"></td>
      		</tr> 
      		<tr>
      			<td>Remark !</td>
      			<td colspan="2"><input type="text" name="remark" id ="remark" class="remarkDeposit"></td>
      		</tr>
      		<tr>
      			<td> </td>
      			<td><input type="button" name="send"  id ="btnFeeDeposit"  class="digitOnly btn btn-primary" value="Deposit"></td>
      		</tr>            		     		
        </tbody>
	    </form>   
	 </table>
</div> 
<div id="feeconfirm" class="col-md-10" style="display: none;">
	 <table id="student" border="1"  align = "center" cellspacing="0" width="50%" style="margin-top: 3%" class="table">
		 <form class="form-horizontal" id="ConfirmFee"  method="post" action="<?php echo base_url().'index.php/Home/studentFeeDeposit';?>">
      	<thead>
          	<tr>
              	<th colspan="6" style="text-align: center;">Fill Details for Submit fee Online</th>
              	
          	</tr>
      	</thead>
      	<tbody>
      		<tr>
        		<td>Tution fee</td>
        		<td><input type ="text" name="tutionfeeconfirm" id="tutionfeeconfirm" class="digitOnly feeConfirm "></td>
        		<td>TransPort Fee</td>
        		<td><input type ="text" name="transportfeeconfirm" id="transportfeeconfirm" class="digitOnly feeConfirm "></td>
      		</tr>   
      		<tr>
        		<td>Exam fee</td>
        		<td><input type ="text" name="examfeeconfirm" id="examfeeconfirm" class="digitOnly feeConfirm "></td>
        		<td>Hostel fee</td>
        		<td><input type ="text" name="hostelfeeconfirm" id="hostelfeeconfirm" class="digitOnly feeConfirm "></td>
      		</tr>   
      		<tr>
        		<td>Development fee</td>
        		<td><input type ="text" name="developmentfeeconfirm" id="devlopmentfeeconfirm" class="digitOnly feeConfirm "></td>
        		<td>Activity fee</td>
        		<td><input type ="text" name="activityfeeconfirm" id="activityfeeconfirm" class="digitOnly feeConfirm "></td>
      		</tr> 
      		<tr>
      			<td>Remark !</td>
      			<td colspan="2"><input type="text" name="remarkconfirm" id ="remarkconfirm" class="remarkDepositConfirm"></td>
      		</tr>
      		<tr>
      			<td> </td>
      			<td><input type="submit" name="feeDeposit"  id ="depositFeeConfirm" class="btn btn-primary" value="Confirm"></td>
      		</tr>            		     		
      	</tbody>
      </form>   
	</table>
</div>
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
 <!-- change password modal -->
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
<?php 
  footer();
}else{
	redirect('Home/studentLogin');
}
?>