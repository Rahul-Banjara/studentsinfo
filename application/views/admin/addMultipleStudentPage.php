<?php 
	require_once('adminLoginHeader.php');
  include('modals.php');
	headers($pageTitle);
?>
<?php 
  if($this->session->userData('username')){
?>
<div class="container" style="margin-top: 2%;">
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
      <div class = "col-md-9">
        <h3 class ="bg" align="center" style="color: blue;">Insert Multiple Students</h3>
        <form name ="insertMultipleRecord" class = "form-horizontal" method ="post" action ="<?php echo base_url().'index.php/admin/insertMultipleRecord';?>">
          <div class = "form-group">
            <table class="table" id="addnews">
              <tr>
                <div class="input-group">
                  <td>Student Name:</td>
                  <td><input type ="text" name ="sname[]" class ="check form-control CharOnly"/></td>
                  <td> Fee:</td>
                  <td><input type="text" name="fee[]" class="fee check form-control digitOnly"></td>
                  <td>Admission Date:</td>
                  <td><input type="text" name="adate[]" id="adate" class="adate check form-control selectdate"></td>
              </tr>
              <tr>
                  <td>Course:</td>
                  <td>
                    <select name="course[]" id="course" class="course form-control check CharOnly">
                      <option value="">--select course--</option> 
                      <?php

                        foreach ($course as $row){
                          ?>
                          <option value="<?php echo $row['course_id'];?>"><?php echo $row['course']; ?></option>
                          <?php
                        } 
                      ?> 
                    </select>
                  </td>
                  <td>Student Address:</td>
                  <td><input type="text" name="address[]" class="address form-control check"></td>
                
                  <td>Student Email:</td>
                  <td><input type="text" name="student_email[]" id="student_email" class="student_email form-control check Emailvalidate"></td>
                    <td><input type ="button" id ="btnnext" class = "btn-success " value ="+"/></td>
                </div>
              </tr>
            </table>
          </div>
          <div class = "col-md-2 col-md-offset-8 pull-right" style="margin-bottom: 37%;">
            <input type ="submit" id = "submitData" value ="insert all records" class="btn btn-danger" />
          </div>
        </form>
      </div>
    </tr>
  </table>
</div>
  <script>
     
    $(document).ready(function(){
      $('#btnnext').on('click',function(){
        var html = '<tr id ="removeRow"><td>Student Name:</td><td><input type = "text"  name ="sname[]" class ="check form-control CharOnly" id = "removetext"/></td><td>Fee</td><td><input type = "text" name = "fee[]" class= "form-control check digitOnly" id="removetext"></td><td>Admission Date:</td><td><input type="text" name="adate[]" id="adate" class="adate check form-control selectdate"></td></tr><tr id="removeRow"><td>Course</td><td><select name = "course[]" id="course" class="course form-control check">';
        html +='<option value = "">--select Course--</option>';
        <?php
        foreach ($course as $row){
          ?>
          html += "<option value=\"<?php echo $row['course_id'];?>\"><?php echo $row['course']; ?></option>";
            <?php
          } 
        ?> 
        html+='</td><td>Student Address:</td><td><input type="text" name="address[]" class="address form-control check"></td><td>Student Email:</td><td><input type="text" name="student_email[]" id="student_email" class="student_email check form-control Emailvalidate"></td><td><input type="button" class="removetext btn-success" value="-"/></td></tr>';
        $('#addnews').append(html);
        $('.removetext').on('click',function(e){
          e.preventDefault();
          var parent = $(this).parent().parent();
          var previous = parent.prev();        
          parent.remove();
          previous.remove();
      
        });
        $('.selectdate').datepicker({
          dateFormat: "yy/mm/dd",
              changeMonth: true,
              changeYear: true
                 
           }).on('change', function(){
            $('.datepicker').hide();
        });
        $(".selectdate").keypress(function(event) {event.preventDefault();});
         //enter only digits
        $('.digitOnly').keypress(function (e) {
            $('.digitError').remove();
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $(this).after('<span class ="digitError">Enter only digits</span>');
                $('.digitError').css('color','red');
                //$('#feesError').css('color','red').html('please enter only digits').show();
                   return false;
            }if ($('.digitOnly').val().length < 10) {
                      if (e.keyCode != '110' && e.charCode != '46') {
                          $('.digitOnly').attr('maxlength', '10');
                      }
                  }
        });
         //enter only char 
          $('.CharOnly').keypress(function(e){
              $('.charError').remove();
              if (!( e.which >= 65 && e.which <= 90 ) && !(e.which >=97 && e.which <= 120) && !(e.which == 32)){
                  $(this).after('<span class ="charError">Enter only charecters</span>');
                  $('.charError').css('color','red');
                     return false;
              }if ($('.CharOnly').val().length < 25) {
                    if (e.keyCode != '110' && e.charCode != '46') {
                        $('.CharOnly').attr('maxlength', '25');
                    } 
                }
          });
          //Email must be an email
          $('.Emailvalidate').on('input', function() {
            $('.emailError').remove();
            var input=$(this);
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var is_email=re.test(input.val());
            if(is_email){
              //input.removeClass("invalid").addClass("valid");
            }else{
                $(this).after('<span class = "emailError">Please enter valid email address</span>');
                $('.emailError').css('color','red');
              //input.removeClass("valid").addClass("invalid");
            }
          });

      });
    });
    
    
  </script>

    <?php 
    footer();
   }  
    else{
      redirect('/admin');
    }
    ?>