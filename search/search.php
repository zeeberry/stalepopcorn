<?php
			mysql_connect('localhost', 'root', 'root');
			mysql_select_db('stalepopcorn');
		
?>

<html> 
	<head> 
	<title> </title>
	
	<script type ="text/javascript"  src="js/jquery-1.4.2.min.js"></script>
	<script type ="text/javascript"  src="js/jquery-ui-1.8.custom.min.js"></script>
	<script type="text/javascript">
	
	$("document").ready(function(){
			
			
			$("#display").click(function(){
				if($("#displaydivid").is(":visible")){
					$("#displaydivid").hide("blind");	
				}else{
					$("#displaydivid").show("blind");
				}
		
			});
			
			
			$("a.linkname").click(function(){
				var linkid = $(this).attr("id");
				var theid = "stars"+linkid;
				//alert(theid);
				if($("#"+theid).is(":visible")){
					$("#"+theid).hide("blind");
				}else{
					$("#"+theid).show("blind");
				}
			});
			
			$("#search").click(function(){
			
				if($("#form_div").is(":visible")){
					$("#form_div").hide("blind");
					
				}else{
					$("#form_div").show("blind");

				}
		
			});
			
			
			
			$("#formid").submit(function(){
				var name = $("form#formid input#namefieldid").val();//getting data from input
				
				$.ajax({
					url: "search_movie_ajax.php",
					type: "POST",
					data: "name="+ name,
					success: function(msg){
							//alert(msg);
						
							if(msg!="none"){
								$("#form_div").html(msg);
								$("#form_div").show('blind');
							}else{
								$("#form_div").html("Sorry, no matches found");
								$("#form_div").show('pulsate');
							}
						
						}
						
				});//end ajax
				
						
			});//end of submit
			
			
			$("#add").click(function(){
			
				if($("#addform_div").is(":visible")){
					$("#addform_div").hide("blind");
				}else{
					$("#addform_div").show("blind");
				}
		
			});
			
			$("#addformid").submit(function(){
				var name = $("form#addformid input#name").val();//getting data from input
				var genre = $("form#addformid input#genre").val();
				var rate = $("form#addformid input#rate").val();
				
				$.ajax({
					url: "add_movie_ajax.php",
					type: "POST",
					data: "name="+ name + "&genre="+genre+"&rate="+ rate,
					success: function(msg){
							//alert(msg);
						
								$("#addform_div").html(msg);
								$("#addform_div").show('blind');
							
						
						}
						
				});//end ajax
			
			
			});//end submit
			
			$("#delete").click(function(){
			
				if($("#deleteform_div").is(":visible")){
					$("#deleteform_div").hide("blind");
				}else{
					$("#deleteform_div").show("blind");
				}
		
			});
			
			$("a.namelink").click(function(){
				var deleteid = $(this).attr("id");//getting data from input
				
				$.ajax({
					url: "delete_movie_ajax.php",
					type: "POST",
					data: "deleted="+ deleteid,
					success: function(msg){
							//alert(msg);
								$("#deleteform_div").html(msg);
								$("#deleteform_div").show('blind');
							
						}
						
				});//end ajax
				
						
			});//end of submit
			
			
	});
	
	</script>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
	<style type= "text/css">
	
	ul.no-bullets {
 		list-style-type : none;   
	}
	
	</style>
	</head>
	<body>
	<div class="container">
	<h2>Test Search Engine </h2><p><p>
	
	<div id="numofmovies_div">
	<?php
	
	$query = "select * from Movies";
	$result = mysql_query($query);
	$num_result = mysql_num_rows($result);
	
	//echo "<b>Database has ".$num_result." Movies.<p>";
	
	?>
	<ul>
	</div>
	
	<div id="display_div">
	<a href="javascript:void(0);" id="display"> Show all Movies in Database</a>
	<p>
		
		<div id="displaydivid" style="display:none;">
			<?php
				for($i=0; $i<$num_result; $i++)
					{
						$row = mysql_fetch_row($result);
							
						echo "<a href=\"javascript:void(0);\" class=\"linkname\" id=\"".$row[0]."\">" . $row[1]. "</a>\n";
						echo "<table border=\"0\"><tr>\n";
						echo "<td>Description: </td>";
						echo "<td>".$row[2] ."</td>";
						echo "</tr>\n<tr>\n";
						echo "<td>Genre: </td>";
						echo "<td>".$row[2] ."</td>";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "<td>Rating: </td>";
						echo "<td>".$row[3] ."</td><br/>";
						echo "</tr>\n";
						echo "</table>\n";
						echo "<div id=\"stars".$row[0]."\" style=\"display:none;\">\n";
								for($x = 0;$x<$row[3];$x++){
									echo "<img src=\"images/pop_full.jpg\" width=20px height=20px >";
								}	
						echo "</div>\n";
						

					}
				
			?>
			
		</div>
		
	</div>
	<p>
	<hr align="left" size="3" width="500">
	
	<div id="search_div">
	
	<a href="javascript:void(0);" id="search">Search Movies</a>
	
		<div id="form_div" style="display:none;">
			<form id="formid" name="nameof_form" action="javascript:void(0);">
		
			Search by Name: <br/>
			<p>
			<div id="namesearch">
			<input type="text" id="namefieldid" size="20"><p><p>
			<input type="submit" value="Search Movie">
			</div>
			
			</form>
			
		</div>
	</div>
	<p>
	<hr align="left" size="3" width="500">
	
	<div id="add_div">
	<a href="javascript:void(0);" id="add">Add a Movie to database</a><p>
	
	<div id="addform_div" style="display:none;">
			<form id="addformid" name="nameof_addform" action="javascript:void(0);">
				
				Name:
				<input class="input-small" type="text" id="name" size ="20"><p><p>
				
				Genre: 
				<input class="input-small" type="text" id="genre" size = "5"><p><p>
				
				Rating: 
				<input class="input-small" type="text" id="rate" size = "3"><p><p>
				<p/>
				
				<button class="btn" type="submit">Add to Database</button>
				
				</form>
			</div>	
	
	
	</div>
	<p>
	<hr align="left" size="3" width="500">
	
	<div id="delete_div">
	<a href="javascript:void(0);" id="delete">Delete a Movie from database</a>
	
		<div id="deleteform_div" style="display:none;">
			
			<form id="deleteformid" name="nameof_deleteform" action="javascript:void(0);">	
			
			<?php
			
			$thequery = "select * from Movies";
			$theresult = mysql_query($thequery);
			
			for($i = 0; $i<mysql_num_rows($theresult);$i++)
			{
				$therow = mysql_fetch_row($theresult);
				echo "<a href=\"javascript:void(0);\" class=\"namelink\"  id=\"". $therow[0]."\">". $therow[1]."</a><br/>\n";
				//echo "hello";
				
			}
			
			
			?>
			
			
			</form>
		</div>
		
	</div>
	<p>
	<hr align="left" size="3" width="500">
	</div>
	</body>
</html>