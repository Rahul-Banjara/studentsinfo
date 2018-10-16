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
<div class="section-first career">
    <div class="container">
        <h1>Law</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
    </div>
</div>
 <div class="span2">
    <div class="container">
      <div class="row">    
        <h2 class="career-heading">Undergraduate</h2>
        <div class="row welcome_details">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="welcome_item">
                    <a href="#"><img src="<?= base_url();?>assets/images/LAW1.jpg"></a>
                    <div class="welcome_info">
                        <h3>Diploma of Community Services Work</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        <p><strong>Eligibility:</strong>BCA <span><strong>Duration:</strong> 3 Years</span></p>   
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="welcome_item" >
                    <a href="#"><img src="<?= base_url();?>assets/images/LAW1.jpg"></a>
                        <div class="welcome_info">
                            <h3>Masters Of Compluter Applications</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
                            <p><strong>Eligibility:</strong>MCA <span><strong>Duration:</strong> 3 Years</span></p>
                        </div>
                </div>
            </div>
        </div>
        <div class="row welcome_details">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="welcome_item">
                <a href="#"><img src="<?= base_url();?>assets/images/LAW3.jpg"></a>
                    <div class="welcome_info">
                        <h3>Bachelors in Computer Application</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <p><strong>Eligibility:</strong>BCA <span><strong>Duration:</strong> 3 Years</span></p>
                    </div>
              </div>
          </div>
        </div>
    </div>
</div>
</div>


<?php
	footer();
?>