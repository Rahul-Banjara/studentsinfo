var projects = [];
$(document).ready(function(){
  //current page link active
	$(function() {
     	var pgurl = window.location.href;
    	 $('.item').each(function(){
    	 	if($(this).attr("href") == pgurl || $(this).attr("href") == '' ){
          		$(this).parent().addClass('active');
			}
     	});
	});
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
                  $('.CharOnly').attr('maxlength', '40');
              } 
          }
    });

  //auto complete
  /*$( function(){
    var availableTags = [
      "MCA",
      "BCA",
      "M.Tech",
      "B.Tech",
      "m.sc ",
      "m.com",
      "PGDCAs"
    ];
    $( "#searchCourse" ).autocomplete({
      source: availableTags
    });
  });*/
 
  $(function() {
       $.ajax({
          type:'GET',
          url: 'getAllCourse',
          dataType: 'json',
          success:function(result){
              projects = result;
              /*console.log(projects);
              console.log(projects);
             $( "#searchCourse" ).autocomplete({
                 minLength: 0,
                 source: projects,
                 keypress: function( event, ui ) {
                    $( "#searchCourse" ).val( ui.item.course );
                       return false;
                 },
                 select: function( event, ui ) {
                    $( "#searchCourse" ).val( ui.item.course );
                    //$( "#project-id" ).val( ui.item.value );
                    //$( "#project-description" ).html( ui.item.desc );
                    return false;
                 }
              })
      
              .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                 return $( "<li>" )
                 .append( "<a>" + item.course + "<br>" + item.desc + "</a>" )
                 .appendTo( ul );
              };*/
               var result = [];
              for(var i in projects){
                  result.push((projects[i].course));
                }
                $('#searchCourse').autocomplete({
                source: result,
                 minLength: 1,
                  select: function(event, ui) { 
                      alert(ui.item.label);
                    //$('#chooseCity').dialog('close'); 
                    //$('#cityInput').append('airline');
                  }
                });
            }
      });
  }); 
  $('#searchCourse').focus(function(){
  })
  //multiple insert records check fields are not empty
  $('#submitData').on('click',function(e){
    $('.requiredErrorClass').remove();
       var check=true;
           $.each($('.check'),function(){
      if($(this).val().length == 0){
        check = false;
        var input=$(this);
        var is_name=input.val();
        if(is_name){
          //input.removeClass("invalid").addClass("valid");
        }else{
          $(this).after('<span class="requiredErrorClass">this fields is required</span>');
           $('.requiredErrorClass').css('color','red');
           $(this).css('borderColor','red');
          }
          e.preventDefault();
        }
      });
     if(check == true){
        $('insertMultipleRecord').serealize();
     }
      
  });
  //appending row dynamically to insert multiple records
  /*$('#btnnext').on('click',function(){
      $('#addnews').append('<tr id ="removeRow"><td>Student Name:</td><td><input type = "text"  name ="sname[]" class ="check form-control CharOnly" id = "removetext"/></td><td>Fee</td><td><input type = "text" name = "fee[]" class= "form-control check digitOnly" id="removetext"></td><td>Admission Date:</td><td><input type="text" name="adate[]" id="adate" class="adate check form-control selectdate"></td></tr><tr id="removeRow"><td>Course</td><td><select name = "course[]" id="course" class="course form-control check"><option value = "">--select Course--</option><option value ="1">MCA</option></select></td><td>Student Address:</td><td><input type="text" name="address[]" class="address form-control check"></td><td>Student Email:</td><td><input type="text" name="student_email[]" id="student_email" class="student_email check form-control"></td><td><input type="button" class="removetext btn-success" value="-"/></td></tr>');
       $('.course')
        .find('option')
        .remove()
        .end()
        .append('<option value="">--select course--</option>')
        .val('');
        $.ajax({
          type:'GET',
          url: '../Home/getAllCourse',
          dataType: 'json',
          success:function(result){
          for(var i = 0; i<result.length; i++){
            console.log(result[i]['course_id']+'&'+result[i]['course']);
            $('.course').append($("<option></option>").attr("value",result[i]['course_id']).text(result[i]['course'])); 
            }
          }
      });
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
               
      });
  });*/
 //calender show
  $( function() {
    $('.selectdate').datepicker({
      dateFormat: "yy/mm/dd",
          changeMonth: true,
          changeYear: true,
    }).on('change', function(){
        $('.datepicker').hide();
    });
    $(".selectdate").keypress(function(event) {event.preventDefault();});
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
   //select all checkboxes 
  $('#selectAll').click(function (e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
  });
  //check admin login field is fill or not if not give error msg
   $('.checkAdmin').on('click',function(e){
      var check =true;
      $('.requiredErrorClass').remove();
       $('.LoginAdmin').each(function(){
         if($(this).val().length == 0){
            check = false;
            var input=$(this);
            var is_name=input.val();
            if(is_name){
               
                input.removeClass("invalid").addClass("valid");
            }else{
                input.removeClass("valid").addClass("invalid");
                $(this).after('<span class="requiredErrorClass">this fields is required</span>');
                 $('.requiredErrorClass').css('color','red');
                    
                }
            e.preventDefault();
          }
        });
        if(check == true){
            $('#adminForm').serealize();
        }
  });//check contact validation and give error if not fill field and give alert if success
  $('.contactSubmit').on('click',function(e){
    var check = true;
    $('.requiredErrorClass').remove();
      $('.contact').each(function(){
        if($(this).val().length == 0){
           check = false;
              var input=$(this);
              var is_name=input.val();
              if(is_name){
                 
                  //input.removeClass("invalid").addClass("valid");
              }else{
                  //input.removeClass("valid").addClass("invalid");
                  $(this).after('<span class="requiredErrorClass">this fields is required</span>');
                   $('.requiredErrorClass').css('color','red');
                      
                  }
             e.preventDefault();
        }
      });
       if(check == true){
        alert('Your query has been successfully sent');
           $('#ContactForm').serealize();
           /*$('#contactModal').modal({
            show: true,
            keyboard: false,
            backdrop: 'static',
            });*/

        }
    });//student login check fields are empty or not 
    $('.LoginStudent').on('click',function(e){
       var check =true;
      $('.requiredErrorClass').remove();
       $('.StudentLogin').each(function(){
             if($(this).val().length == 0){
                check = false;
                var input=$(this);
                var is_name=input.val();
                if(is_name){    
                }else{
                    $(this).after('<span class="requiredErrorClass">this fields is required</span>');
                     $('.requiredErrorClass').css('color','red');
                        
                    }
                e.preventDefault();
            }
        });
        if(check == true){
            $('#studentLogin').serealize();
        }
    });//search course
    $('.search').on('click',function(e){
        
    });
    //check insert student modal filds are empty or not 
    $('#studentInsert').on('click',function(e){
      var check =false;
      $('.requiredErrorClass').remove();
      $('.InsertStudent').css('borderColor','');
       $('.InsertStudent').each(function(){
             if($(this).val().length == 0){
                check = true;
                var input=$(this);
                var is_name=input.val();
                if(is_name){
                }else{
                    $(this).after('<span class="requiredErrorClass">this fields is required</span>');
                     $('.requiredErrorClass').css('color','red');
                     $(this).css('borderColor','red');
                        
                    }
                e.preventDefault();
            }
        });
        if(check == true){
            $('#insertStudentData').serealize();
        }
    });
    //check course modal  fields is not empty
    $('.CourseInsert').on('click',function(e){
      var check =false;
      $('.requiredErrorClass').remove();
       $('.InsertCourse').each(function(){
             if($(this).val().length == 0){
                check = true;
                var input=$(this);
                var is_name=input.val();
                if(is_name){    
                }else{
                    $(this).after('<span class="requiredErrorClass">this fields is required</span>');
                     $('.requiredErrorClass').css('color','red');
                     $(this).css('borderColor','red');
                        
                    }
                e.preventDefault();
            }
        });
        if(check == false){
            $('#insertCourseData').submit();
        }
    });
      $('.UpdateStudent').on('click',function(e){
      var check =false;
      $('.requiredErrorClass').remove();
      $('.Update').css('borderColor','');
       $('.Update').each(function(){
            if($(this).val().length == 0){
                check = true;
                var input=$(this);
                var is_name=input.val();
                if(is_name){    
                }else{
                    $(this).after('<span class="requiredErrorClass">this fields is required</span>');
                     $('.requiredErrorClass').css('color','red');
                     $(this).css('borderColor','red');
                        
                    }
                e.preventDefault();
 
            }
        });
        if(check == false){
            $('#frmUpdate').submit();
        }
    });
      $('.CourseUpdate').on('click',function(e){
      var check =false;
      $('.requiredErrorClass').remove();
      $('.UpdateCourse').css('borderColor','');
       $('.UpdateCourse').each(function(){
            if($(this).val().length == 0){
                check = true;
                var input=$(this);
                var is_name=input.val();
                if(is_name){    
                }else{
                    $(this).after('<span class="requiredErrorClass">this fields is required</span>');
                     $('.requiredErrorClass').css('color','red');
                     $(this).css('borderColor','red');
                        
                    }
                e.preventDefault();
 
            }
        });
        if(check == false){
            $('#insertCourseUpdateData').submit();
        }
    });
    //check send notice fields is empty or not 
    $('.NoticeSend').on('click',function(e){
        var check =false;
      $('.requiredErrorClass').remove();
       $('.SendNotice').each(function(){
             if($(this).val().length == 0){
                check = true;
                var input=$(this);
                var is_name=input.val();
                if(is_name){    
                }else{
                    $(this).after('<span class="requiredErrorClass">this fields is required</span>');
                     $('.requiredErrorClass').css('color','red');
                      $(this).css('borderColor','red');
                    }
                e.preventDefault();
            }
        });
        if(check == true){
            $('#sendNoticeData').serealize();
        }
    });//check admin change password modal fields are empty or not
    $('.PasswordAdmin').on('click',function(e){
       $('.requiredErrorClass').remove();
       $('.AdminPassword').css('borderColor','');
          $('.AdminPassword').each(function(){
             if($(this).val().length == 0){
                check = true;
                var input=$(this);
                var is_name=input.val();
                if(is_name){    
                }else{
                    $(this).after('<span class="requiredErrorClass">this fields is required</span>');
                     $('.requiredErrorClass').css('color','red');
                     $(this).css('borderColor','red');   
                    }
                e.preventDefault();
            }
        });
      $('.passwordError').remove();
        var old = $('#oldAdminPassword').val();
        var newpassword = $('#newAdminPassword').val();
        var confirmpassword =$('#confirmAdminPassword').val();
        var oldpassword =$('#PasswordAdmin').val();
        if(old != oldpassword){
          $('#oldAdminPassword').after('<span class= "passwordError">old password not matched</span>');
          $('.passwordError').css('color','red');
          e.preventDefault();
        }else if(newpassword != confirmpassword){
          $('#newAdminPassword').after('<span class= "passwordError">new and confirm password not matched</span>');
          $('.passwordError').css('color','red');
          e.preventDefault();
        }
          else{
            $('#changeAdminPassword').serealize();
          }

      });//check student password fields are empty or not
    $('.PasswordStudent').on('click',function(e){
      var check = false;
       $('.requiredErrorClass').remove();
          $('.StudentPassword').each(function(){
             if($(this).val().length == 0){
                check = true;
                var input=$(this);
                var is_name=input.val();
                if(is_name){    
                }else{
                    $(this).after('<span class="requiredErrorClass">this fields is required</span>');
                     $('.requiredErrorClass').css('color','red');
                     $(this).css('borderColor','red');   
                    }
                e.preventDefault();
            }
        });
      $('.passwordError').remove();
      var old = $('#oldStudentPassword').val();
      var oldpassword = $('#passwordStudentName').val();
      var newpassword = $('#newStudentPassword').val();
      var confirmpassword =$('#confirmStudentPassword').val();
      if(old != oldpassword){
        $('#oldStudentPassword').after('<span class= "passwordError">old password not matched</span>');
        $('.passwordError').css('color','red');
        e.preventDefault();
      }else if(newpassword != confirmpassword){
        $('#newStudentPassword').after('<span class= "passwordError">new and confirm password not matched</span>');
        $('.passwordError').css('color','red');
        e.preventDefault();
      }
        else{
          $('#changeStudentPassword').serealize();
        }
    });
    //send complain message if the message length is not 200 charecter
    $('.ComplainSend').on('click',function(e){
      $('.complainError').remove();
      var msg = $('#complainMsg').val();
      if(msg.length <=50){
        $('#complainMsg').after('<span class="complainError">please type at least 50 charecter</span>');
        $('.complainError').css('color','red');
         e.preventDefault();
      }
     
         });
   
//hide complaindetails table at document load
  $('#complainDetails').hide();
  $('#feedetails').hide();
  $('#NoticeDetails').hide();
	$('#dashboard').DataTable( {
    	"oLanguage": {
        "sEmptyTable": "data is not available in table"
    	}
	} );

  //$('#dashboardTable').DataTable();
  $('.multi-item-carousel').carousel({
      interval: false
    });
    $('.multi-item-carousel .item').each(function(){
      var next = $(this).next();
      if (!next.length) {
        next = $(this).siblings(':first');
      }
      next.children(':first-child').clone().appendTo($(this));
      
      if (next.next().length>0) {
        next.next().children(':first-child').clone().appendTo($(this));
      } else {
        $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
      }
    });
    //multiple delete and update operation change modal header and body dyanmically 
   $('.btncheck').on('click',function(e){
      var name = $(this).attr('name');
      var check=false;
      var sum=0;
      var arr = [];
      if($('#deletestudent input[type="checkbox"]').is(':checked')){
          check =true;
          $('input[name="chkdeletesid[]"]:checked').each(function() {
              sum += 1;
              arr.push($(this).val());
          });
          if(name == 'delete'){
              $('#MultipleOperation').modal('show');
              $('#studentMultipleId').val(JSON.stringify(arr));
              document.getElementById("textContent").textContent = "Are You Sure Want to Delete Selected Records";
              $('#btnMultiple').prop('value','Delete');
              $('#btnMultiple').prop('name','delete');
              e.preventDefault();
          }else if(name == 'update'){
              alert('you are in update');
               $('#MultipleOperation').modal('show');
              $('#studentMultipleId').val(JSON.stringify(arr));
              document.getElementById("textContent").textContent = "Are You Sure Want to Update Selected Records";
              $('#btnMultiple').prop('value','Update');
              $('#btnMultiple').prop('name','update');
              e.preventDefault();
          }
       }
          else{
          //alert('Please select Checkboxs for Operation');
          $('#confirmModal').modal('show');
           e.preventDefault();
          }
  }); 
  $('#deleteCourseRecords').on('click',function(e){
    var name = $(this).attr('name');
     var check=false;
      var sum=0;
      var arr = [];
      if($('#deleteCourse input[type="checkbox"]').is(':checked')){
          check =true;
          $('input[name="chkdeletecid[]"]:checked').each(function() {
              sum += 1;
              arr.push($(this).val());
          });
          if(name == 'deleteCourseRecords'){
              $('#multipleCourseDelete').modal('show');
              $('#courseMultipleId').val(JSON.stringify(arr));
              e.preventDefault();
          }
       }
          else{
          $('#confirmModal').modal('show');
           e.preventDefault();
          }
  });
    //open new form on click and get same value
  $('#btnFeeDeposit').on('click',function(e){
    $('.requiredFee').remove();
    //check at least one field to be filled 
    var empty = $('.fee').filter(function() {
            return this.value != '';
          });
          if (empty.length == 0) {
          $('.remarkDeposit').after('<span class = "requiredFee">please deposit at least one fee</span>');
          $('.requiredFee').css('color','red');
          return false;
          }
    var tutionfee,examfee,hostelfee,devlopmentfee,activityfee,transportfee,remark;
    tutionfee = $('#tutionfee').val();
    examfee = $('#examfee').val();
    hostelfee = $('#hostelfee').val();
    devlopmentfee = $('#devlopmentfee').val();
    activityfee = $('#activityfee').val();
    transportfee = $('#transportfee').val();
    remark = $('#remark').val();
    var total = 0;
    $('#feedeposit').hide();
    $('#tutionfeeconfirm').val(tutionfee);
    $('#examfeeconfirm').val(examfee);
    $('#hostelfeeconfirm').val(hostelfee);
    $('#devlopmentfeeconfirm').val(devlopmentfee);
    $('#activityfeeconfirm').val(activityfee);
    $('#transportfeeconfirm').val(transportfee);
    $('#remarkconfirm').val(remark);
    $('#feeconfirm').show();
  });
        //confirm fee deposit form is empty or not
  $('#depositFeeConfirm').on('click',function(e){
    $('.requiredFee').remove();
    var empty = $('.feeconfirm').filter(function() {
            return this.value != '';
          });
          if (empty.length == 0) {
          $('#remarkconfirm').after('<span class = "requiredFee">please deposit at least one fee</span>');
          $('.requiredFee').css('color','red');
          return false;
          }
      $('#ConfirmFee').submit();
  });
});
 function getDeleteData(id){
      $('#studentDeleteId').val(id);
      $('#deleteModal').modal('show');
  }
  function deleteComplain(id){
      $('#ComplainDeleteId').val(id);
      $('#complainDeleteModal').modal('show');
  }
  function courseDelete(id){
      $('#courseDeleteId').val(id);
      $('#CourseModal').modal('show');
  }      
  function testingMethod(id){
      var student_id = id;
      $('.requiredErrorClass').remove();
      $('.Update').css('borderColor','');
      $.ajax({
              type:'GET',
              url: 'updateRecords',
              data:{'id':student_id},
              dataType: 'json',
              success:function(result){
              $('#studentUpdateId').val(result[0]['id']);
          		$('#student_name').val(result[0]['student_name']);
          		$('#student_fees').val(result[0]['student_fees']);
          		$('#student_adate').val(result[0]['student_adate']);
          		$('#student_address').val(result[0]['student_address']);
          		$('#course_id').val(result[0]['course_id']);
          		$('#course_update').val(result[0]['course_id']).prop("selected",true);
              }

          });
     		$('#myModal').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
            }); 

  } //course update modal
   function courseUpdate(id){
      var course_id = id;
      $('.requiredErrorClass').remove();
      $('.UpdateCourse').css('borderColor','');
      $.ajax({
              type:'GET',
              url: 'updateCourseRecords',
              data:{'id':course_id},
              dataType: 'json',
              success:function(result){
              $('#courseUpdateId').val(result[0]['course_id']);
              $('#courseUpdateName').val(result[0]['course']);
              $('#courseUpdateUniversity').val(result[0]['university']);
              $('#courseUpdateDuration').val(result[0]['duration']);
              $('#courseUpdateFullName').val(result[0]['full_name']);
              $('#courseUpdateDetails').val(result[0]['course_details']);
              }
      });
      $('#CourseUpdateModal').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
            }); 

  } 
  function openInsertModal(){
    $('.InsertStudent').val(null);
      $('.course')
          .find('option')
          .remove()
          .end()
          .append('<option value="">--select course--</option>')
          .val('');

     $.ajax({
        type:'GET',
        url: '../Home/getAllCourse',
        dataType: 'json',
        success:function(result){
        for(var i = 0; i<result.length; i++){
            $('.course').append($("<option></option>").attr("value",result[i]['course_id']).text(result[i]['course'])); 
        }
        }
    });
   
	 $('#insertStudentModal').modal({
        show: true,
        keyboard: false,
        backdrop: 'static'

        });
 
  }
    function openInsertCourseModal(){
    $('.RemoveContent').val(null);
  	 $('#insertCourseModal').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
            });
  }
  //remove content of modal

 
  // get id and email using ajax to send complain
  function openComplainModal(name){
      var sname = name;
      $.ajax({
                type:'GET',
                url: 'complainInformation',
                data:{'sname':sname},
                dataType: 'json',
                success:function(result){
                $('#complain_student_id').val(result[0]['id']);
                $('#complain_student_email').val(result[0]['student_email']);
                }
            });
          $('#ComplainModal').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
            });
    }
    //view fee detials and replace table using ajax
    function viewFeeDetails(name){
      var sname =name;
       var trRows = '';
       $.ajax({
                type:'GET',
                url: 'getFeeDetails',
                data:{'sname':sname},
                dataType: 'json',
                cache: false,
                success:function(data){
                 if(data != false){
                  $.each(data, function(key, value){
                    trRows += '<tr>';
                    $.each(value, function(k, v) {
                      trRows+= '<td>'+v+'</td>';
                    });
                    trRows+= '</tr>';
                  });
                }else{
                   trRows += '<tr>';
                    trRows += '<td colspan ="6" align = "center"><font color = "red">No Records Found</font></tr>';
                    trRows += '</tr>';
                }
                  $("#feedetails tbody").html(trRows);
                  $('#feedetails').show();
                  setTimeout(function(){$('#feedetails').hide() }, 10000);
              }
             });
      }
      //open sendNoticeModal 
      function openNoticeModal(){
       $('.SendNotice').val(null); 
        $('.course')
          .find('option')
          .remove()
          .end()
          .append('<option value="">--select course--</option>')
          .val('');

     $.ajax({
        type:'GET',
        url: '../Home/getAllCourse',
        dataType: 'json',
        success:function(result){
        for(var i = 0; i<result.length; i++){
          $('.course').append($("<option></option>").attr("value",result[i]['course_id']).text(result[i]['course'])); 
        }
        }
    });
      $('#openNoticeModal').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
            });     
      }
      //change admin password modal
      function changeAdminPassword(){
      $('.AdminPassword').val(null); 
      $('#ChangeAdminPassword').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
            });     
      }
      function viewFee(){
        //var student_id = $('#searchFeeStudentId').val();
        var sname = $('#searchFeeStudentName').val();
         var trRows = '';
         $.ajax({
                type:'GET',
                url: 'getFee',
                data:{'sname':sname},
                dataType: 'json',
                cache: false,
                success:function(data){
                if(data != false){
                   $.each(data, function(key, value) {
                    trRows += '<tr>';
                    $.each(value, function(k, v) {
                      trRows+= '<td>'+v+'</td>';
                    });
                    trRows+= '</tr>';
                  });
                }else{
                    trRows += '<tr>';
                    trRows += '<td colspan ="6" align = "center"><font color = "red">No Records Found</font></tr>';
                    trRows += '</tr>';
                }
                  $("#feeStudentDetails tbody").html(trRows);
                  $('#feeStudentDetails').show();
              }
             });

      }
      //feeStudentDetails
      //view complain using ajax
      function viewComplain(){
        var trRows = '';
        $.ajax({
                type:'GET',
                url: 'getComplain',
                dataType: 'json',
                cache: false,
                success:function(data){
                $.each(data, function(key, value) {
                    trRows += '<tr>';
                    $.each(value, function(k, v) {
                      trRows+= '<td>'+v+'</td>';
                    });
                    trRows+= '</tr>';
                  });
                    
                  $("#complainDetails tbody").html(trRows);
                  $('#complainDetails').show();
              }
             });
      }//view notice function call
      function viewNotice(id){
         var trRows = '';
        $.ajax({
                type:'GET',
                url: 'getNoticeInformation',
                data:{'id':id},
                dataType: 'json',
                success:function(data){
                if(data != false){  
                $.each(data, function(key, value){
                    trRows += '<tr>';
                    $.each(value, function(k, v) {
                      trRows+= '<td>'+v+'</td>';
                    });
                    trRows+= '</tr>';
                  });
              }else{
                  trRows += '<tr>';
                  trRows += '<td colspan ="4" align = "center"><font color = "red">No Records Found</font></tr>';
                  trRows += '</tr>';
              }
                  $("#NoticeDetails tbody").html(trRows);
                  $('#NoticeDetails').show();
                  setTimeout(function(){$('#NoticeDetails').hide() }, 10000);
              }
            });
          /*$('#noticeDetails').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
            });*/
          }
