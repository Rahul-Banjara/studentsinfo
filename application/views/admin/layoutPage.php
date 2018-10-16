<?php
	function headers($pageTitle){
?>
<!DOCTYPE html>
<head>
	<title><?php echo (isset($pageTitle)) ? $pageTitle : 'Default title text'; ?></title>
	<meta name ="viewport" content="width=device-width, initial-scale=1">
	<link rel ="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--<script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script  src = "//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->
		
	<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
	<script  src = "<?= base_url();?>assets/js/StudentInformationSystem.js"></script>
	<link rel ="stylesheet" href="<?= base_url();?>assets/css/custom.css">
	<!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

	</head>
	<body>
	<?php 
	if(!isset($_SESSION['username'])){
		?>
		<table WIDTH="100%" cellSpacing="0" cellpadding="0" border="0" bordercolor="#00b8f1" height = "10%">
			<tr>
			<td align="center" width="95%" bgcolor="MidnightBlue">
				<font size="4" face="verdana" color="white"><b>iBirds Groups of Colleges Ajmer</b></font>
			<br>
			<font size="-2" face="verdana" color="white">(Approved by AICTE,New Delhi and 
				affiliated to RTU,Kota and  MDSU University of Rajasthan)</font>
			</td>
			</tr>
		</table>
	<?php

	 }else{ ?>
	 <div class ="col-lg-12 col-sm-12 col-sm-12">
	 	<table width="100%" cellSpacing="0" cellpadding="0" border="0" bordercolor="#00b8f1" height = "10%">
	 		<tr>
				<td align="center" width="95%" bgcolor="MidnightBlue">
					<font size="4" face="verdana" color="white"><b>iBirds Groups of Colleges Ajmer</b></font><br>
					<font size="-2" face="verdana" color="white">(Approved by AICTE,New Delhi and 
					affiliated to RTU,Kota and  MDSU University of Rajasthan)</font>
					<font class="pull-right" face="verdana" style="margin-right: 5px;">
					<div class="dropdown pull-right ">
    					<a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo  $_SESSION['username']; ?><span class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
    					<ul class="dropdown-menu">
       						 <li class="section" ><a href="#">Change Password</a></li>
        					<li class="section"><a href="<?php echo base_url().'index.php/admin/logout';?>">Logout</a></li>
   						</ul>
  					</div>
				</td>
			</tr>
		</table>
	</div>			
	<?php
		}
}      
	function footer(){
		?>
		<div class="footer_main">
		<div class="row">
			<div class="col-md-3 block1  col-sm-3">
				<h3>About Us</h3>
				<p>iBirds College Ajmer is Established in 2012 of Government of Rajasthan. It is a multi faculty unitary College, with a jurisdiction spread over the State of Rajasthan.</p>
				<p>
			</div>
			<div class="col-md-3 block1 col-sm-3">
				<h3>Quick Links</h3>
				<ul>
					<li><a href="#">The University</a></li>
					<li><a href="#">Campus Amenities</a></li>
				</ul>
			</div>
			<div class="col-md-3 block1 col-sm-3">
				<h3>Get In Touch</h3>
				 				 
				 <ul>
					<li><a href="#">Home </a></li>
					<li><a href="#"> About Us</a></li>
				 </ul>
				 
			</div>
			<div class="col-md-3 block1 col-sm-3">
				<h3>Social Links</h3>
				<ul>
					<li><a href="#"><i class="fa fa-facebook"></i> Facebook <strong>( Like Us )</strong></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i> Twitter <strong>( Follow Us )</strong></a></li>
				 </ul>
			</div>
		</div>
		</div>
	</div>
		<?php
	}
	?>
