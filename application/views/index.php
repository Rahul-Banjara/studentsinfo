<?php
	require_once('layoutPage.php');
	headers($pageTitle);
	//footer();
?>
<style type="text/css">
  .flipImage > .ImageFront{
  position:absolute;
  transform: perspective( 600px ) rotateY( 0deg ); 
  width:150px; 
  height:150px; 
      background-color: #fff;
    border-radius: 50%;
  backface-visibility: hidden;
  transition: transform .5s linear 0s;
}

.flipImage > .ImageBack{
  position:absolute;
  transform: perspective( 600px ) rotateY( 180deg );
  background: #ffdb3b; 
      background: #000;
  width:150px; 
  height:150px; 
  border-radius: 50%;
  backface-visibility: hidden;
  transition: transform .5s linear 0s;
}

.flipImage:hover > .ImageFront{
  transform: perspective( 600px ) rotateY( -180deg );
}

.flipImage:hover > .ImageBack{
  transform: perspective( 600px ) rotateY( 0deg );
}
.clear{
  clear:both;
}

.ImageBack p {
    color: red;
    padding: 35% 20% 0%;
    font-size: 13px;
    text-align: center;
    line-height: 20px;
}
.hide
{
   display:none;
}

</style>
<div id="carousel-example-generic" style="margin-top: -20px;  " class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
 <!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">
  <div class="item active">
    <img src="<?php echo base_url().'assets/images/slider1.jpg';?>"  class="img-responsive">
  </div>
  <div class="item">
      <img src="<?php echo base_url().'assets/images/slider1.jpg';?>" class="img-responsive">
 </div>
</div>
<!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
</div>
<div class="container">
    <div class="education_bg">
  	     <h2>Education Is The Key To  Your Success</h2>
          <p>Admission Open For 2018</p>
          <div class="clearfix"></div>
    </div>
</div>
<div class="container"> 
    <div class="welcome">
 	    <div class="row">
    	 <div class="col-md-8 col-sm-7">
        	<h1><span>Welcome to</span> iBirds College Ajmer</h1>
            <p>iBirds College Ajmer is Established  in 2012 of Government of Rajasthan. It is a multi faculty unitary College, with a jurisdiction spread over the State of Rajasthan.</p>
            <p>iBirds College provide six months Industrial Training to B.Tech and MCA Students, which is a part of their Graduate/Post Graduate Degree of Recognized Universities/Institutes. It is coming under iBirds Shikshan Sansthan. Most students waste their precious time meant to get hand on experience on the latest technologies either joining Training Institutes or Non Software Development Companies.</p>
        <div class="row">
            <div class="col-md-3 col-sm-3  col-xs-6">
                <div class="counter">
                    <h2>100</h2>
                    <p>Courses</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3  col-xs-6">
                <div class="counter">
                  <h2>250</h2>
                  <p>Teachers</p>
                </div>
           </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
              <div class="counter">
                  <h2>3000+</h2>
                  <p>Students</p>
              </div>
           </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="counter">
                    <h2>2000+</h2>
                    <p>Books</p>
                </div>
            </div>
          </div>
      </div>
      <div class="col-md-4  col-sm-5">
        	<div class="wel_img">
            	<img src="<?php echo base_url().'assets/images/welcome_img.png';?>"/>
            </div>
        </div>
    </div>
 </div>
</div>
<!--<div class="program_bg col-md-4 " style="margin-bottom: 10%;">
  <div class="col-sm-2">
    <div class="flipImage photo">
      <div class="ImageBack">
        <p>
          AGRICULTURE SCIENCE
        </p>
      </div>
      <div class="ImageFront"><img class="img-responsive"  src="<?php echo base_url().'assets/images/agriculture.png';?>" alt="panIcon"/>
      </div>
    </div>
  </div>
</div>
     
<!--<div class="container" style="margin-top: 5%;">
    <div class="row">
      <div class="col-md-12">
        <div class="carousel slide multi-item-carousel" id="theCarousel">
          <div class="carousel-inner">
            <div class="item active">
              <div class="col-md-4 col-md-4"><a href="#1"><img src=" <?= base_url();?>assets/images/image1.jpg" class="img-responsive" widht = "300" height = "200"></a></div>
            </div>
            <div class="item">
              <div class="col-xs-4 col-md-4"><a href="#1"><img src=" <?= base_url();?>assets/images/image2.jpg" class="img-responsive" width = "300" height = "200"></a></div>
            </div>
            <div class="item active">
              <div class="col-xs-4 col-md-4"><a href="#1"><img src=" <?= base_url();?>assets/images/image3.jpg" class="img-responsive" width = "300" height = "200"></a></div>
            </div>
            <div class="item">
              <div class="col-xs-4 col-md-4"><a href="#1"><img src=" <?= base_url();?>assets/images/image4.jpg" class="img-responsive" width = "300" height ="200" ></a></div>
            </div>
            <div class="item">
              <div class="col-xs-4 col-md-4"><a href="#1"><img src=" <?= base_url();?>assets/images/image5.jpg" class="img-responsive" width ="300" height = "200"></a></div>
            </div>
            <div class="item">
              <div class="col-xs-4 col-md-4"><a href="#1"><img src=" <?= base_url();?>assets/images/image6.jpg" class="img-responsive" width ="300" height = "200"></a></div>
            </div>
             <div class="item">
              <div class="col-xs-4 col-md-4"><a href="#1"><img src=" <?= base_url();?>assets/images/image7.jpg" class="img-responsive" widht = "300" height = "200"></a></div>
            </div>
             <div class="item">
              <div class="col-xs-4 col-md-4"><a href="#1"><img src=" <?= base_url();?>assets/images/image8.jpg" class="img-responsive" widht ="300" height ="200"></a></div>
            </div>
            <div class="item">
              <div class="col-xs-4 col-md-4"><a href="#1"><img src=" <?= base_url();?>assets/images/image9.jpg" class="img-responsive" widht = "300" height="200"></a></div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
    <div class="col-md-2 col-md-offset-10">
        <a href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
        <a  href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
    </div>-->

 <?php 
 	footer();
 ?>