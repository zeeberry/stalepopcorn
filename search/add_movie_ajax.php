<?php
		if(isset($_POST['name'], $_POST['genre'], $_POST['rate']) )
		{
			
			mysql_connect('localhost', 'root', 'root');
			mysql_select_db('stalepopcorn');
			
			$add_query= "select * from Movies";
			$add_result= mysql_query($add_query) 
				or die("Could not get categories ".mysql_error());
				
			$add_num_results = mysql_num_rows($add_result); 
			
			$i = 0;
			$loop = true; 
			
			while( $loop == true && $i < $add_num_results)
			{
				$add_row = mysql_fetch_row($add_result);
				
				//echo $add_row[2] ; //DEBUGGING!!!
				//echo $_POST['name'];//DEBUGGING!!!
				
				if($add_row[1]==$_POST['name'] )
				{
					echo "That Movies is already in the Database!\n Please Try Again.";
					$loop = false;
				}
				
				$i++;
				
			}//end of while loop
			if($loop == true)
			{
				$insert_query = "insert into Movies values(1,"
					. "'" .$_POST['name'] . "',"
					. "'" . $_POST['genre'] . "',"
					. "'" . $_POST['rate'] . "')";
								
				//echo $insert_query."\n";	
					
				$insert_result = mysql_query($insert_query);
					//or die("Could not add record" . mysql_error());
						
				if(!$insert_result)
					echo "Could not add Movie, Try again later\n";
					
				else
					echo $_POST['name'] ." has been added to Database\n";
			
			}//end if
			
		}// end of isset
		
		
		?>
		