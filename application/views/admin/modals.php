 <!--change Password modal -->
 <div id="ChangeAdminPassword" class="modal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Password</h4>
            </div>
            <div class="modal-body">
          <form class="form-horizontal" id="changeAdminPassword"  method="post" action="<?php echo base_url('index.php/admin/changePassword');?>">
              <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="old" >Old :<span class="required" style="color: red;">*</span></label>
                  <div class="col-sm-8">
                    <input type="hidden" name="passwordAdmin" id="PasswordAdmin" value="<?php echo $this->session->userData('password'); ?>">
                    <input type="password" class="form-control AdminPassword " name="old" id="oldAdminPassword" value="" required />
                    <span class="error"></span>
                 </div>
             </div>    
               <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="old" >New:<span class="required" style="color: red;">*</span></label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control AdminPassword" name="new" id="newAdminPassword" value="" required />
                    <span class="error"></span>
                 </div>
               </div> 
                  <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="old" >Confirm:<span class="required" style="color: red;">*</span></label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control AdminPassword " name="confirm" id="confirmAdminPassword" value="" required/>
                    <span class="error"></span>
                 </div>
              </div>
              
        <div class="modal-footer">
          <p id="updateinfo"></p>
          <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                   <input type="submit"  class="btn btn-success PasswordAdmin "  id="btnsubmit" name="changePassword" value="change Password" />
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
  <!-- open notice modal -->
   <div id="openNoticeModal" class="modal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Notice to College Students</h4>
            </div>
            <div class="modal-body">
          <form class="form-horizontal" id="sendNoticeData"  method="post" action="<?php echo base_url('index.php/admin/sendNotice');?>">
                  
               <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="old" >Name:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  readonly name="admin_name" id="notice_student_name" value="<?php echo $this->session->userData('username') ?>" />
                 </div>
               </div> 
                <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="student_course" >Course:<span class="required" style="color: red;">*</span>
                </label>
                 <div class="col-sm-8">
                    <select id ="student_course" name="student_course" class="form-control SendNotice course">
                      <option value="">---Select Course---</option>              
                    </select>
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="" >Date:<span class="required" style="color: red;">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control SendNotice selectdate " readonly name="notice_date"  id="notice_date" value=""/>
                </div>
              </div>  
                <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="old" >Notice:<span class="required" style="color: red;">*</span>
                </label>
                  <div class="col-sm-8">
                    <textarea name="noticeMsg" id="complain" cols="52" rows="5" required class="form-control SendNotice" placeholder="Type your Notice Details in details"></textarea> 
                 </div>
               </div> 
               <div class="modal-footer">
                <p id="updateinfo"></p>
                 <div class="form-group">
                  <div class="col-sm-offset-7 col-sm-5">
                   <input type="submit" id="submitform" class="btn btn-success NoticeSend "  name="notice" value="Send" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
           </div>
        </div>
        </div>
      </div>
  </div>
   <!--insertCourse modal -->
   <div id="insertCourseModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insert Course details</h4>
            </div>
            <div class="modal-body">
          <form class="form-horizontal" id="insertCourseData"  method="post" action="<?php echo base_url('index.php/admin/insertCourse');?>">
              <div class="form-group formRightMargin">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="Course" >Course:<span class="required" style="color: red;">*</span>
                </label>
                  <div class="col-sm-8"><input type="text" class="form-control InsertCourse RemoveContent CharOnly " name="student_course" id="student_course" value="" required />
                 </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="Course" >University:<span class="required" style="color: red;">*</span>
                </label>
                  <div class="col-sm-8"><input type="text" class="form-control InsertCourse RemoveContent CharOnly " name="courseUniversity" id="courseUniversity" value="" required />
                 </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="Course" >Duration:<span class="required" style="color: red;">*</span>
                </label>
                  <div class="col-sm-8"><input type="text" class="form-control InsertCourse RemoveContent" name="courseDuration" id="courseDuration" value="" required />
                 </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="Course" >Course Name:<span class="required" style="color: red;">*</span>
                </label>
                  <div class="col-sm-8"><input type="text" class="form-control insertCourse RemoveContent CharOnly " name="courseFullName" id="courseFullName" value="" required/>
                 </div>
              </div>
               <div class="form-group">
                <label class="col-sm-2 col-sm-offset-1 control-label" for="old" >Course Details:<span class="required" style="color: red;">*</span>
                </label>
                  <div class="col-sm-8">
                    <textarea name="CourseDetails" id="CourseDetails" cols="52" rows="5" required class="form-control InsertCourse RemoveContent " placeholder="Type course Details in details" required></textarea>
                    <span class="error"></span>   
                 </div>
               </div> 
          <div class="modal-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                   <input type="submit" id="courseInsert" class="btn btn-primary CourseInsert " name="Add" value="Add" />
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
  <!-- open insert studnet modal -->
  <div id="insertStudentModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insert Student details</h4>
            </div>
            <div class="modal-body"> 
             <form class="form-horizontal" id="insertStudentData"  method="post" action="<?php echo base_url('index.php/admin/insertStudent');?>">
              <div class="form-group">
                <label class="col-sm-3 col-sm-2-offset-1 control-label" for="student_name" >Name:<span class="required" style="color: red;">*</span>
                </label>
                  <div class="col-sm-8">
                  <input type="hidden" class="form-control" name="course_id" id="course_id" value=""/>
                    <input type="text" class="form-control InsertStudent CharOnly " name="student_name" id="student_name" value="" required />
                 </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-sm-2-offset-1 control-label " for="student_name" >Email:
                <span class="required" style="color: red;">*</span>
                </label>
                  <div class="col-sm-8">
                  <input type="hidden" class="form-control" name="course_id" id="course_id" value=""/>
                    <input type="text" class="form-control InsertStudent Emailvalidate  " name="student_email" id="student_email" value="" required />
                 </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-sm-2-offset-1 control-label" for="student_course" >Course:<span class="required" style="color: red;">*</span>
                </label>
                 <div class="col-sm-8">
                    <select id ="insert_course" name="student_course" class="form-control insertStudent course " required>
                      <option value ="">---Select Course---</option>
                      <!--<option value ="1">MCA</option>
                      <option value="2"> BCA</option>
                      <option value="3">M.Tech</option>
                      <option value="4">B.Tech</option>
                      <option value="6">M.sc IT</option>-->              
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-sm-2-offset-1 control-label" for="" >Fees:<span class="required" style="color: red;">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control InsertStudent digitOnly " name="student_fees" id="student_fees"  value="" required />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-sm-2-offset-1 control-label" for="" >Admission Date:<span class="required" style="color: red;">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control InsertStudent selectdate" name="student_adate" id="student_adate" value="" required />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-sm-2-offset-1 control-label" for="" >Address:<span class="required" style="color: red;">*</span>
                </label>
                <div class="col-sm-8">
                     <textarea name="student_address" id="student_address" cols="52" rows="5" required class="form-control InsertStudent" placeholder="Type your Notice Details in details"></textarea> 
                </div>
              </div>
              
          <div class="modal-footer">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                   <input type="submit" id="studentInsert" class="btn btn-primary"  name="Register" value="Add" />
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
   <!-- confirmation modal -->
          <div id="confirmModal" class="modal">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Confirmation Modal</h4>
                    </div>
                    <div class="modal-body">
                        <p>Please select checkboxes for operations...</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
          <div id="MultipleOperation" class = "modal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type ="button" class ="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Multiple Records</h4>
                    </div>
                    <div class = "modal-body">
                        <form class="form-horizontal" id ="frmdelete"  method="post" action="<?php echo base_url().'index.php/admin/updateMultiple'?>">
                            <div class="form-group">
                             <p id="textContent" style="margin-left: 30px;"> Are you sure want to delete selected records..</p>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" name="studentMultipleId" id="studentMultipleId" value="" />
                                </div>
                            </div>
                            <div class="form-group modal-footer">
                                <div class="col-sm-offset-2 col-sm-10 pull-right">
                                    <input type="submit" id="btnMultiple" class="btn btn-danger" name="delete" value="Delete" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      <!-- delete multiple course records-->  
     <div id="multipleCourseDelete" class = "modal" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type ="button" class ="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Multiple Records</h4>
                </div>
                <div class = "modal-body">
                    <form class="form-horizontal" id ="frmdelete"  method="post" action="<?php echo base_url().'index.php/admin/deleteCourseMultiple'?>">
                        <div class="form-group">
                         <p id="textContent" style="margin-left: 30px;"> Are you sure want to delete selected course records..</p>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="courseMultipleId" id="courseMultipleId" value="" />
                            </div>
                        </div>
                        <div class="form-group modal-footer">
                            <div class="col-sm-offset-2 col-sm-10 pull-right">
                                <input type="submit" id="btncourseMultiple" class="btn btn-danger" name="deleteMultipleCourse" value="Delete" />
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--delete complain modal-->
     <div id="complainDeleteModal" class = "modal" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type ="button" class ="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Records</h4>
                </div>
                <div class = "modal-body">
                    <form class="form-horizontal" id ="frmdelete"  method="post" action="<?php echo base_url().'index.php/admin/deleteComplain'?>">
                        <div class="form-group">
                         <p id="textContent" style="margin-left: 30px;"> Are you sure want to delete records..</p>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="ComplainDeleteId" id="ComplainDeleteId" value="" />
                            </div>
                        </div>
                        <div class="form-group modal-footer">
                            <div class="col-sm-offset-2 col-sm-10 pull-right">
                                <input type="submit" id="btncomplain" class="btn btn-danger" name="deleteComplain" value="Delete" />
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



  <!-- delete confirmation model-->
  <div id="deleteModal" class = "modal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type ="button" class ="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Delete Records</h4>
        </div>
        <div class = "modal-body">
            <form class="form-horizontal" id ="frmdelete"  method="post" action="<?php echo base_url().'index.php/admin/delete'?>">
                <div class="form-group">
                 <p style=" margin-left: 50px;"> Are you sure want to delete this record..</p>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" name="studentDeleteId" id="studentDeleteId"/>
                    </div>
                </div>
                <div class="form-group modal-footer">
                    <div class="col-sm-offset-2 col-sm-10 pull-right">
                        <input type="submit" id="btnyes" class="btn btn-danger" name="Yes" value="Delete" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
   <!-- delete confirmation model-->
  <div id="CourseModal" class = "modal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type ="button" class ="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Delete Records</h4>
        </div>
        <div class = "modal-body">
            <form class="form-horizontal" id ="frmdelete"  method="post" action="<?php echo base_url().'index.php/admin/deleteCourse'?>">
                <div class="form-group">
                 <p style=" margin-left: 50px;"> Are you sure want to delete this Course..</p>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" name="courseDeleteId" id="courseDeleteId"/>
                    </div>
                </div>
                <div class="form-group modal-footer">
                    <div class="col-sm-offset-2 col-sm-10 pull-right">
                        <input type="submit" id="btnyes" class="btn btn-danger" name="Yes" value="Delete" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
      