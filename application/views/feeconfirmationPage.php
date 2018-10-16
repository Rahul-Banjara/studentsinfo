<?php 
 require_once('studentLoginHeader.php');
 headers($pageTitle);  
?>
<?php 
	if($this->session->userData('username')){?>
		<div class="row" style="padding-top: 8%;">
			<div class=" col-md-5 col-md-offset-4">
				<h3 style="color: green;">Your Transaction has been successfully </h3><br/>
				<p> please remember Transaction id in case of further assistant</p><br/>
				<p>please don't refresh page</p>
				<h3 style="color: red;"> Please Note Your TxnId is..</h3><?php echo $txnid; ?>
				&nbsp; &nbsp;<a href="<?php echo base_url().'index.php/Home/studentDashboard';?>">Ok</a>
			</div>
		</div>
<?php 
	}else{
		redirect('Home/studentLogin');
	}
?>