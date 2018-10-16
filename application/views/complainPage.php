<?php 
 require_once('studentLoginHeader.php');
 headers($pageTitle);  
?>
<?php 
    if($this->session->userData('username')){
 ?>   	
	<div class="col-md-1 col-md-offset-11">
	<h4 style="color: orange; margin-top: 0px;"><?php echo 'Hello'.$this->session->userData('username'); ?></h4>
		<a href="<?php echo base_url().'index.php/Home/logout';?>">logout</a>
	</div>
	<div class="row" style="padding-top: 8%;">
		<div class=" col-md-5 col-md-offset-4">
			<h3 style="color: green;">Your Complain has been successfully Sent To Management Administrator </h3><br/>
			<p>Thank you for sending complain </p><br/>
				<p>Our management Aurthority will contact you soon with in 5 working days.</p>
				<h3 style="color: red;"> Your Query regarding to ...</h3><?php echo $message; ?>
					&nbsp; &nbsp;<a href="<?php echo base_url().'index.php/Home/studentDashboard';?>">Ok</a>
		</div>
	</div>
<?php
	}else{
	redirect('/Home/studentLogin');
	}
?>	