<!DOCTYPE html>
<html>
	<head>
		<title>Pgtest Example</title>
	</head>
	<body>
	<center>
		<table border="1">  
            <thead>  
                <th>ID</th>  
                <th>NAME</th>  
   
            </thead>  
            <tbody>  
               <?php
    	                while($row = pg_fetch_row($result)) {
                            $sid= $row[0];
    	                 	?>
    	                 	<tr>
    	                 		<td><?php echo $row[0];?></td>
    	                 		<td><?php echo $row[1];?></td>
    	                 	</tr>   
    	               <?php }
    	     
                ?>  
            </tbody>  
        </table> 
       </center>
	</body>
</html>