<?php  
  
class pgsql_module extends CI_Model {  
  
   function fetchRecords(){    
        $query = pg_query("select * from student");
        return $query;
    }
}
?>  