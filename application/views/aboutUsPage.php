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
<section class="about-top" style="margin-top: 5%">
    <div class="container"> 
        <div class="about">
          <div class="row">
              <div class="col-md-6  col-sm-6 about-mau">
                  <h1>iBirds College Ajmer</h1>
                  <p>iBirds College Ajmer is Established in 2012 of Government of Rajasthan. It is a multi faculty unitary College, with a jurisdiction spread over the State of Rajasthan.</p>
              </div>
                <div class="col-md-6  col-sm-6 vision" style="margin-top: 5%">     
                  <div class="about-vision">
                    <div class="row">
                        <div class="col-md-10 col-sm-9 icon-dis">
                            <p><strong>VISION:</strong> To contribute towards the objective of Nation building by offering Quality Higher Education and promoting a culture of Research and Innovation.</p>
                        </div>
                    </div>
                </div>
         <div class="about-vision ">
            <div class="row">                            
                <div class="col-md-10 col-sm-9 icon-dis">
                    <p><strong>MISSION:</strong>  To provide quality education to budding managers, technocrats and equip them with up-to-date knowledge, technical skills and attitudes. To instill professional Ethics, Competence and provide best placements in corporate and industry.</p>
                </div>
            </div>
        </div>
        <div class="about-vision">
            <div class="row">
                <div class="col-md-10 col-sm-9 icon-dis">
                    <p><strong>VALUES</strong>: Innovation | Fellowship & Team Work | Seeking Truth | Excellence | Accountability | Inclusiveness</p>
                </div>
            </div>
        </div>
      </div>
    </div>
 </div>
 </div>
</section> 
 
<div class="container"> 
 <div class="whyChoose">
  <div class="row">
       <div class="col-md-4  col-sm-5 mahirshi">
          <div class="mahirshi_img">
              <img src="<?= base_url();?>assets/images/LAW1.jpg" class = "img-responsive"/>
            </div>
        </div>
      <div class="col-md-8  col-sm-7 mahirshi-right">
          <h1>Why Choose Us ?</h1>
           
            <p class="why_choose">The college’s objectives are to disseminate and advance knowledge by offering teaching and research facilities, to make provisions for studies at Under Graduate, Post Graduate and Integrated course levels in Engineering & Technology, Basic & Applied Science, Management, Commerce, Arts & Humanities, Journalism & Mass Communication, Library & Information Science, Design and Vocational Education and to promote interdisciplinary studies and research.</p>
            
            <div class="row">
              <div class="col-md-4 col-sm-4  col-xs-12">
                  <div class="choose_us">
                      <p>100</p>
                        <h5>Experienced Faculty</h5>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4  col-xs-12">
                  <div class="choose_us">
                    <p>100</p>
                        <h5>Popular Courses</h5>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="choose_us">
                    <p>100</p>
                        <h5>Guaranteed Career</h5>
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