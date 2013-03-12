<?php

		mysql_connect("localhost", "root", "root");
			mysql_select_db("stalepopcorn");
		
		if(isset($_POST['deleted']))
			{
				$delete_query="delete from Movies where id=".$_POST['deleted'];
				$delete_result=mysql_query($delete_query)
					or die("Error deleting".mysql_error());
				if($delete_result != false)
					echo "Movie successfully deleted";
			}
			

?>