<?php
	if(isset($_POST['name']))
	{
	   	mysql_connect("localhost", "root", "root");
		mysql_select_db("stalepopcorn");
	
	    $name_query ="select * from Movies where name='". $_POST['name']."'";
	    $result=mysql_query($name_query)
	    	or die("Could not connect".mysql_error());
	    
		//echo "<b>".mysql_num_rows($result)." Found match(es).</b><p/>\n";
		echo "<b> Search results for \"".$_POST['name']."\" </b></br>\n";
		
	    	if(mysql_num_rows($result)>0)
	    	{
	    		for($i=0;$i<mysql_num_rows($result);$i++)
	    		{
	    			$name_row=mysql_fetch_row($result);
					
					echo "<table border=\"0\" cellpadding=\"7\"><tr>\n";
					echo "<td rowspan=\"4\"><img src=\"".$name_row[2]."\" width=200 height=250> </td>";
					echo "<td colspan=\"2\"><b>".$name_row[1] ."</b></td>";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "<td colspan=\"2\">".$name_row[3] ."</td>";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "<td><b>Genre: </b></td>";
					echo "<td>".$name_row[4] . "</td><br/>";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "<td><b>Rating: </b></td>";
					echo "<td>";
					for($x = 0;$x<$name_row[5];$x++){
						echo "<img src=\"images/popcorn.gif\" width=25 height=25 >";
						}
					echo "</td><br/>";
					echo "</tr>\n";
					echo "</table>\n";
					echo "&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<a href=\"".$name_row[6]."\"target=\"_blank\">Watch Trailer</a>";
					
						
	    		}
	    		
	    	}else

			echo "No results found";	    	
	}	
?>