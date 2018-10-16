<?php
	function headers($pageTitle){
?>
<!DOCTYPE>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" /> 
		<title>
			<?php echo (isset($pageTitle)) ? $pageTitle : 'Default title text'; ?>
		</title>
		<meta name ="viewport" content="width=device-width, initial-scale=1">
		<link rel ="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script  src = "<?= base_url();?>assets/js/StudentInformationSystem.js"></script>
		<link rel ="stylesheet" href="<?= base_url();?>assets/css/custom.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	</head>
	<body class="removeScroll">
		<nav class="navbar navbar-inverse visible-phone" role="navigation" >
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href = "<?php echo base_url().'assets/images/ibirds_logo.jpg';?>"></a>
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	       		<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	      	</button>
		    </div>
		      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <ul class="nav navbar-nav">
		      	<li><a  class="item" href = "<?php echo base_url().'index.php';?>">Home</a></li>
		     
		      	<li><a class="item" href = "<?php echo base_url().'index.php/Home/Academic';?>">Academic</a></li>
		      	<li><a class="item" href = "<?php echo base_url().'index.php/Home/Admission';?>">Admission</a></li>
		      	<li><a class="item" href = "<?php echo base_url().'index.php/Home/Trainning';?>">Trainning & Placement</a></li>
		      	<li><a class="item" href = "<?php echo base_url().'index.php/Home/ContactUs';?>">Contact Us</a></li>
		      	<li><a class="item" href = "<?php echo base_url().'index.php/Home/Aboutus';?>">About us</a></li>
			</ul>
		    <ul class="nav navbar-nav navbar-right">
					<li class="dropdown"><a class="dropdown-toggle item" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url().'index.php/Home/adminLogin';?>">Admin Login</a></li>
		          	<li><a href="<?php echo base_url().'index.php/Home/studentLogin';?>">Student Login</a></li>
					</ul>
					</li>
			</ul>
		    <form class="navbar-form navbar-inverse" action="<?php echo base_url().'index.php/Home/searchItem';?>">
		    	 <div class="input-group">
				    <input type="text" class="form-control" placeholder="Search Course" list="AllCourses" name="search" id="searchCourse" required/>
				    <div class="input-group-btn">
				      <button class="btn btn-default search" type="submit" name="searchItem" id="searchCourse" style="height: 34px;">
				        <i class="glyphicon glyphicon-search"></i>
				      </button>
				    </div>
				  </div>
		    </form>
			</div>

		  </div>
		</nav>
		
<?php
	}
	function footer(){
		
?>
<div class="footer" style=" margin-top: 5%;">
	<div class="col-md-12" style="background-color: #000000;">
		<div class="col-md-3" style="text-align: left;">
			<div class="col-md-12" style="font-family: 'Oswald', sans-serif; font-size: 16px; margin-bottom: 5px;">
				<span class="glyphicon glyphicon-check" style="font-size: 15px; color: black;"></span>&nbsp;<font color="white">Visit @iBirds
                <img src="<?php echo base_url().'assets/images/footerImage.jpg';?>" alt="I Birds" class="img-responsive" width="200" height="200" /><br />
				 		<h6 style="margin-top:-15px;">Developed by Rahul Banjara</h6></font>
			</div>
	
		</div>
		<div class="col-md-3" style="text-align: left;">
			<div class="col-md-12" style="font-family: 'Oswald', sans-serif; font-size: 16px; margin-bottom: 10px;"><span class="glyphicon glyphicon-check" style="font-size: 15px; color: black;"></span>&nbsp;<font color="white">Address
			</div>
			<ul class=" footer-heading"><h4>iBirds Campus</h4>
			  <li>Near Chopati,</li>
			  <li>Vaishali Nagar, Pushkar Road,</li>
			  <li>Ajmer - 305001</li>
			  <li>Rajasthan, India</li>
			</ul>
			</font>
			</div>

		<div class="col-md-3" style="text-align: left;">
			<div class="col-md-12" style="font-family: 'Oswald', sans-serif; font-size: 16px; margin-bottom: 10px;"><font color="white"><span class="glyphicon glyphicon-check" style="font-size: 15px; color: black;"></span>&nbsp;Articles
			</font></div>
			<ul class="footer_link" style="margin-top: 0px; text-align: left; list-style-type: none;">
				<li><a href="<?php echo base_url().'index.php/Home/Trainning';?>">Trainning & Placement </a></li>
				<li><a href="<?php echo base_url().'index.php/Home/ContactUs';?>">Contact Us</a></li>
				<li><a href="<?php echo base_url().'index.php/Home/Aboutus';?>">About us</a></li>
			
			</ul>
		</div>
		<div class="col-md-3" style="text-align: left;">
			<div class="col-md-12" style="font-family: 'Oswald', sans-serif; font-size: 16px; margin-bottom: 10px;">
				<span class="glyphicon glyphicon-check" style="font-size: 15px; color: black;"></span>&nbsp;<font color="white">Sharing and blog</font>
			</div>
			<ul>
				<li><a href="#">Facebook <strong>( Like Us )</strong></a></li>
				<li><a href="#"> Twitter <strong>( Follow Us )</strong></a></li>
				<li><a href="#"> Instagram <strong>( Share Us )</strong></a></li>
			 </ul>
		</div>
	</div>
	<div class="copyright container" align="center" class="col-md-12"><p>Copyright &copy; 2018. All Rights Reserved</p></div>
</div>

<?php
	}
?>
		</body>
	</html>