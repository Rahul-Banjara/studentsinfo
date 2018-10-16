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
 <!--marguee tag to show placement companies images -->
 <div class="container">
        <div class="row">
            <div style="padding-top: 20px; margin-top: 10px; border: 1px none gray;">
                <label class="col-md-4 col-md-offset-4" style="font-size:20px;: top;);
                    height: 80px; background-size: 100%; 
                    text-align: center;">
                    TOP Visited Companies at iBirds
                </label>
                <div class="marquee"  class="col-md-12 col-lg-12"style="width:100%; height:">
                   <marquee onmouseover='stop();' onmouseout='start();'>
                    <a href=""><img src="<?= base_url();?>assets/images/logo1.jpg" /></a>
                     <a href=""><img src="<?= base_url();?>assets/images/logo2.jpg" /></a>
                    <a href=""> <img src="<?= base_url();?>assets/images/logo3.jpg" /></a>
                    <a href=""> <img src="<?= base_url();?>assets/images/logo4.jpg" /></a>
                     <a href=""><img src="<?= base_url();?>assets/images/logo5.jpg" /></a>
                    <a href=""> <img src="<?= base_url();?>assets/images/logo6.jpg" /></a>
                    <a href=""> <img src="<?= base_url();?>assets/images/logo7.jpg" /></a>                   
                    </div>
                  </marquee>
                </div>
            </div>
    <div class="inner-container col-md-8 col-md-offset-2" style="margin-bottom: 
    5%;">
      <div class="" style=" font-size:26px; color:#d15900; border-bottom:1px solid #d15900; margin-bottom: 11px;">Career Guidance & Placement Unit
      </div>
      <div class="text-container">
        <h3>Achievements :</h3>
          <p>The college is a favorite destination for campus placement  of top companies. The college has conducted campus placement of&nbsp; students. The Department of Training and  Placement is one of the most important department of college. To name a few  recruiting companies for placement for our students are : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /> A3logics, IBM, Ericsson, Wipro,  HCL, Tech Mahindra,  Infosys, Olico Services, Patni Computers, Agilis Informational Technology  International, Girnarsoft Automobiles Pvt .Ltd, Meta cube pvt. Ltd, M S  Technology, Ocean Ship Maritime Services(P).LTD.</p>
        <h3>Placement  :</h3>
          &nbsp; The department contacts industries and  invites them for conducting on campus or off campus selection of students. The  department also improves the students after getting the feedback from the  company representatives. <img src="<?= base_url();?>assets/images/LAW3.jpg" align="right" class = "img-responsive"/>
      <h3>Training  :</h3>
        The cell conducts training programs in the respective areas of students and  soft skills. Department conducts aptitude test, GD &amp; PI for the students.
      <h3>Covered Areas are :</h3>
        <li>Personality  Development.</li>
        <li>Communication  Skills.</li>
        <li>C V  preparation.</li>
        <li>Group  Discussion.</li>
        <li>Interview  Management.</li>
        <li> Aptitude  Tests.</li>
        <li>English  Language.</li>
        </div>
    </div>
  </div>
</div>       
<?php
  footer();
?>

