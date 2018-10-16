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
				<!--<script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
				<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
				<script  src = "<?= base_url();?>assets/js/StudentInformationSystem.js"></script>
				<link rel ="stylesheet" href="<?= base_url();?>assets/css/custom.css">
				<!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
				<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
				<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

			</head>
			<body>
			<table WIDTH="100%" cellSpacing="0" cellpadding="0" border="0" bordercolor="#00b8f1" bordercolordark="DarkBlue" bordercolorlight="Lavender" height = "8%">
						<td align="center" width="95%" bgcolor="MidnightBlue">
							<font size="4" face="verdana" color="white"><b>iBirds Groups of Colleges Ajmer</b></font>
						<br>
						<font size="-2" face="verdana" color="white">(Approved by AICTE,New Delhi and 
							affiliated to RTU,Kota and  MDSU University of Rajasthan)</font>
							<div class="dropdown pull-right ">
        					<a href="#" data-toggle="dropdown" class="dropdown-toggle"><font color="white"><span class="glyphicon glyphicon-user"></span><?php echo  $_SESSION['username']; ?><b class="caret"></b></font></a>
        					<ul class="dropdown-menu">
           						 <li class="section" ><a href="#" data-toggle="modal" data-target="#ChangeAdminPassword"  data-backdrop="static" data-keyboard="false">Change Password</a></li>
            					<li class="section"><a href="<?php echo base_url().'index.php/Home/logout';?>">Logout</a></li>
       						 </ul>
  						</div>
						</td>
						
					</tr>
			</table>
			
		
<?php
	}
	function footer(){
		?>
		<div class="copyright col-md-12 col-lg-12 col-sm-12" align="center" style="width: 100%; background-color: midnightblue;"><font color="white"><p>Copyright &copy; 2018. All Rights Reserved</p></font></div>
<?php
	}
?>
		</body>
	</html>