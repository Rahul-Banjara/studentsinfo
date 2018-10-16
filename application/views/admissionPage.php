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
<div class="section-first how-to-apply">
  <div class="container">
    <div class="row">
      <h1>How To Apply </h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      <div class="col-md-12 col-sm-12 apply">
        <h3><strong>ONLINE REGISTRATION</strong></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <h4><strong>College Office</strong></h4>
          <p>Shastri Nagar, Near R.P. car Bazar<br>
          Ajmer-305001 (Rajasthan)<br>
          info@iBirds.org,<br>
          admissions@iBirdsajmer.org</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 apply">
        <h3><strong>IN-PERSON REGISTRATION</strong></h3>
          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <h4><strong>College Office</strong></h4>
          <p>Shastri Nagar, Near R.P. car Bazar<br> 
          Ajmer-305001 (Rajasthan)<br>
          info@iBirds.org,<br>
          admissions@iBirdsajmer.org</p>
      </div>
  </div>
</div>
</div>

<?php 
	footer();
?>
