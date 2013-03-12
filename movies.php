<?php
	   	mysql_connect("localhost", "root", "root");
		mysql_select_db("stalepopcorn");
	
	    $name_query ="select * from Movies";
	    $result=mysql_query($name_query)
	    	or die("Could not connect".mysql_error());
		
	    	if(mysql_num_rows($result)>0)
	    	{
	    		for($i=0;$i<mysql_num_rows($result);$i++)
	    		{
	    			$row=mysql_fetch_row($result);
					
					echo "<table border=\"0\" cellpadding=\"7\"><tr>\n";
					echo "<td rowspan=\"4\"><img src=\"".$row[2]."\" width=100 height=150> </td>";
					echo "<td colspan=\"2\"><b>".$row[1] ."</b></td>";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "<td colspan=\"2\">".$row[3] ."</td>";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "<td><b>Genre: </b></td>";
					echo "<td>".$row[4] . "</td><br/>";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "<td><b>Rating: </b></td>";
					echo "<td>";
					for($x = 0;$x<$row[5];$x++){
						echo "<img src=\"images/popcorn.gif\" width=25 height=25 >";
						}
					echo "</td><br/>";
					echo "</tr>\n";
					echo "</table>\n";
					echo "&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<a href=\"".$row[6]."\"target=\"_blank\">Watch Trailer</a><br />";
					
						
	    		}
	    		
	    	}else

			echo "No results found";	    		
?>