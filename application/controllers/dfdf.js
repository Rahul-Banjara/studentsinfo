  $.ajax({
                type:'POST',
                url: 'updateRecords',
                data:{'id':student_id},
                dataType: 'json',
                success:function(data){
                console.log(data);
                }
            });









  $(document).ready(function(){
	$(function() {
     	var pgurl = window.location.href;
    	 $('.item').each(function(){
    	 	if($(this).attr("href") == pgurl || $(this).attr("href") == '' ){
          		$(this).parent().addClass('active');
			}
     	});
	});
	 /*$('#dashboardTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "bProcessing": true,
        "sAjaxSource": "<?php echo base_url().'index.php/admin/dashboardTable';?>",
        "aoColumns": [
        { mData: 'student_id' } ,
        { mData: 'student_name' },
        { mData: 'course' },
        { mData: 'student_fees' },
        { mData: 'student_adate' }
                    ]
      } );*/
      //$('#dashboardTable').DataTable();
      $('.multi-item-carousel').carousel({
          interval: false
        });
        $('.multi-item-carousel .item').each(function(){
          var next = $(this).next();
          console.log(next.length);
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


      
});
 function getDeleteData(id){
            $('#student_id').val(id);
            console.log(id);
            $('#deleteModal').modal('show');
        }
  function testingMethod(id){
     
      alert('before ajax');
       

  } 