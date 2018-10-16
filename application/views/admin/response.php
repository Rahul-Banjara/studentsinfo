<?php 
	$Data=array();
	$query='select * from student';
	
	$result = pg_query($query);
	while( $row = pg_fetch_row($result) ) { 
		$Data[] = $row;
	}	
	$json_data = array(
		"iTotalRecords" => count($Data),
        "iTotalDisplayRecords" => count($Data),
        "aaData"=>$Data);			
		echo json_encode($json_data);  
?>