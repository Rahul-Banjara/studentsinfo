<?php
	require_once('layoutPage.php');
	headers($pageTitle);
	//footer();
if($result){
  $numrows = pg_numrows($result);
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
 <?php  
  for($i = 0; $i < $numrows; $i++) 
  {
      $row = pg_fetch_array($result, $i);
      $course_id = $row['course_id'];
      $course = $row["course"];
      $course_details = $row["course_details"];
      $university = $row["university"];
      $duration = $row["duration"];
      $full_name = $row["full_name"];
      $DetailsUrl = 'index.php/Home/getDetails/'.$course_id;
 ?>
 <div class="span2">
    <div class="container">
     <div class="row">    
      <h2 class="career-heading">
        <a class="item" href = "<?php echo base_url($DetailsUrl)?>"><?php echo $course ?></a>
        </h2>

        <div class="row welcome_details">
          <div class="col-xs-12 col-sm-12 col-md-6">
              <div class="welcome_item">
                 <a href="#"><img src="<?= base_url();?>assets/images/<?php echo$course?>.jpg"></a>
                  <div class="welcome_info">
                    <h3><a class="item" href = "<?php echo base_url($DetailsUrl)?>"><?php echo $full_name; ?></a></h3>
                    <p><?php echo $course_details; ?> </p>
                 <p><strong>University:</strong><?php echo $university;?> <span><strong>Duration:</strong><?php echo $duration ?></span></p>   
             </div>
           </div>
        </div>
      </div>
    </div>
  </div>
</div> 
<?php
}
  }else{
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
  <div class="alert alert-danger col-md-12 " style=" margin-top: 5%; margin-bottom: 5%;">
    <strong>Danger! Oops</strong>
    <p><?php echo $error;?></p><br/>
    <p>Sorry we don<sup>'</sup>t provide your search course</p></br>
    <p>Your Searching course is &nbsp; <?php echo $searchItem; ?></p>
    </div>
      <?php

}

  footer();
?>

