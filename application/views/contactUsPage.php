<?php
	require_once('layoutPage.php');
	headers($pageTitle);
	//footer();
?>
<div class="slider">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
					<img src = "<?= base_url();?>assets/images/about-banner.jpg" alt=" " class="img-responsive">
		  </div>
	 </div>
  </div>
</div>
<div class="container">
    <div class="campus_block">
      <div class="row">
          <div class="col-md-4 col-sm-5 ">
              <div class="address">
                  <h3>College Campus</h3>
                    <p>Vaishali Nagar, Near Anasagar Chopati</p>
                     <p>Ajmer-305001 (Rajasthan)</p>
                      <p>info@iBirdsajmer.org, </p>
                       <p>admissions@iBirdsajmer.org</p>
              </div>
              <div class="address">
                <h3>College City Office </h3>
                  <p> iBirds Groups of Services </p>
                  <p>Vaishali Nagar,Near Cine Mall</p>
                  <p> Ajmer- 305001</p>
                  
              </div>
                
              <div class="address">
                <h3> Admission Cell :</h3>
                  <p> 0141-2335487, 55555555, 853666808,  </p>
                  <p>12333333322, 111444444  </p>
               
               </div>
                
          </div>
          <div class="col-md-8 col-sm-7">
            <div class="get_touch">
                <h1>Get In Touch</h1>
                <div class="row">
                   <form class="form-horizontal" id ="ContactForm"  method="post" action="<?php echo base_url().'index.php/Home/getTouch'?>">
                    <div class="col-md-6 col-sm-6 form-group">
                      <label for="Name">Name:</label>
                        <input class="input_text form-control CharOnly contact" type="text" placeholder="Name" name="name" />
                      </div>
                      <div class="col-md-6 col-sm-6 form-group" style="margin-left: 5px;">
                      <label for="Email"> Email:</label>
                        <input class="input_text form-control contact Emailvalidate " type="text" placeholder="E-mail" name="email"  />
                      </div>
                      <div class="col-md-6 col-sm-6 form-group">
                      <label for="Address">Address:</label>
                        <input class="input_text form-control contact " type="text" placeholder="Address" name="addres"  />
                      </div>
                      <div class="col-md-6 col-sm-6 form-group" style="margin-left: 5px;"">
                       <label for ="Phone"> Phone:</label>
                        <input class="input_text form-control DigitOnly contact" type="text" placeholder="Phone No." name="phone" />
                      </div>
                      <div class="col-md-12 form-group">
                       <label for="Message">Query:</label>
                        <textarea name="feedback" id="feedback" cols="52" rows="5" class="form-control contact txtarea" placeholder="Type some char" ></textarea>
                      </div>
                       <div class="col-md-12 " >
                        <input class=" btn btn-success contactSubmit pull-right " type="submit" value="SEND"/>
                      </div>
                    </form>
                  </div>
              </div>
          </div>
            <!--contact submit alert using modal -->
          <!--<div id="contactModal" class = "modal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type ="button" class ="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Success</h4>
                    </div>
                    <div class = "modal-body">
                            <div class="form-group">
                             <p> Your Query Has Been Successfully Sent To Administrator..</p>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" name="studentDeleteId" id="studentDeleteId"/>
                                </div>
                            </div>
                            <div class="form-group modal-footer">
                                <div class="col-sm-offset-2 col-sm-10 pull-right">
        
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
        
                    </div>
                </div>
            </div>
        </div>-->
      </div>
    </div>
  </div>        
<?php
  footer();
?>