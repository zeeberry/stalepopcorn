<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Welcome to StalePopcorn</title>

<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link rel="stylesheet" type="text/css" href="lib/style.css" media="screen" />
<link href="lib/nivo-slider.css" rel="stylesheet" type="text/css" media="screen" />
<link href="lib/default.css" rel="stylesheet"  type="text/css" media="screen" />
<link href="lib/rating_style.css" rel="stylesheet"  type="text/css" media="screen" />
<link rel="stylesheet" href="poll/poll.css" type="text/css" />

<!--  =================Javascript includes================= -->

<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="js/jquery.nivo.slider.pack.js" ></script>
<script type="text/javascript" src="login/logout.js"></script>
<script src="poll/jquery.cookie.js" type="text/javascript" charset="utf-8"></script>
<script src="poll/poll.js" type="text/javascript" charset="utf-8"></script>

<!--  ================= / Javascript includes============= -->

   
<!--  =================Slideshow call================= -->

<script type="text/javascript">
			$(window).load(function() {
    			$('#slider').nivoSlider({
					effect: 'fade',
					pauseTime: 3000
					
				});
				
			});

</script>
<!--  =================End Slideshow call================= -->  

<!--  =================Rating calls================= -->  
<script>
    
    $(document).ready(function() {
        
        $('.rate_widget').each(function(i) {
            var widget = this;
            var out_data = {
                widget_id : $(widget).attr('id'),
                fetch: 1
            };
            $.post(
                'rating/ratings.php',
                out_data,
                function(INFO) {
                    $(widget).data( 'fsr', INFO );
                    set_votes(widget);
                },
                'json'
            );
        });
    

        $('.ratings_stars').hover(
            // Handles the mouseover
            function() {
                $(this).prevAll().andSelf().addClass('ratings_over');
                $(this).nextAll().removeClass('ratings_vote'); 
            },
            // Handles the mouseout
            function() {
                $(this).prevAll().andSelf().removeClass('ratings_over');
                // can't use 'this' because it wont contain the updated data
                set_votes($(this).parent());
            }
        );
        
        
        // This actually records the vote
        $('.ratings_stars').bind('click', function() {
            var star = this;
            var widget = $(this).parent();
            
            var clicked_data = {
                clicked_on : $(star).attr('class'),
                widget_id : $(star).parent().attr('id')
            };
            $.post(
                'rating/ratings.php',
                clicked_data,
                function(INFO) {
                    widget.data( 'fsr', INFO );
                    set_votes(widget);
                },
                'json'
            ); 
        });
        
        
        
    });

    function set_votes(widget) {

        var avg = $(widget).data('fsr').whole_avg;
        var votes = $(widget).data('fsr').number_votes;
        var exact = $(widget).data('fsr').dec_avg;
    
        window.console && console.log('and now in set_votes, it thinks the fsr is ' + $(widget).data('fsr').number_votes);
        
        $(widget).find('.star_' + avg).prevAll().andSelf().addClass('ratings_vote');
        $(widget).find('.star_' + avg).nextAll().removeClass('ratings_vote'); 
        $(widget).find('.total_votes').text( votes + ' votes recorded (' + exact + ' rating)' );
    }
    
</script>
<!--  =================End Rating calls================= --> 

<!--  =================Display Ajax calls================= -->
<script>
 $(document).ready(function() {
 		$("#formid").submit(function(){
				var name = $("form#formid input#namefieldid").val();//getting data from input
				
				$.ajax({
					url: "search/search_movie_ajax.php",
					type: "POST",
					data: "name="+ name,
					success: function(msg){
							//alert(msg);
						
							if(msg!="none"){
								$(".left").html(msg);
								$(".left").show('blind');
							}else{
								$(".left").html("Sorry, no matches found");
								$(".left").show('pulsate');
							}
						
						}
						
				});//end ajax
				
		});
		
		$("#genreformid").submit(function(){
				var genre = $("form#genreformid select#genre").val();//getting data from input
				
				$.ajax({
					url: "search/search_genre_ajax.php",
					type: "POST",
					data: "genre="+ genre,
					success: function(msg){
							//alert(msg);
						
							if(msg!="none"){
								$(".left").html(msg);
								$(".left").show('blind');
							}else{
								$(".left").html("Sorry, no matches found");
								$(".left").show('pulsate');
							}
						
						}
						
				});//end ajax
				
		});
		
		$("#rateformid").submit(function(){
				var rate = $("form#rateformid select#rate").val();//getting data from input
				
				$.ajax({
					url: "search/search_rating_ajax.php",
					type: "POST",
					data: "rate="+ rate,
					success: function(msg){
							//alert(msg);
						
							if(msg!="none"){
								$(".left").html(msg);
								$(".left").show('blind');
							}else{
								$(".left").html("Sorry, no matches found");
								$(".left").show('pulsate');
							}
						
						}
						
				});//end ajax
				
		});//end rate
		
		$("#all").click(function(){
				
				$.ajax({
					url: "movies.php",
					type: "POST",
					success: function(msg){
							//alert(msg);
								$(".left").html(msg);
								$(".left").show('blind');
						
						}
						
				});//end ajax
				
		});//end rate
<!--  =================Click About link================= -->			
		$('#about').click(function(){
		
			$.ajax({
			
				url:"about.php",
				type: "POST",
				success: function(msg){
					
					$('.left').html(msg);
				
				}
			});
		});
<!--  =================End About link================= -->	
		
	});// end doc ready
	</script>
<!--  =================End Display Ajax calls================= -->
	
</head>
<body>

<!-- =================Login check ================= -->

<script type="text/javascript">
//			if(localStorage.getItem("user") != null) {
//				document.write("<span class=\"label important\">You are already logged in</span>")
//			}
</script>

<!-- =================End Login check ================= -->

<!-- ================= Wrapper ================= -->		
<div id="wrap">

<!-- ================= Header ================= -->
<a href="index.php"><div id="header">
</div></a>

<!-- ================= End Header ================= -->

<div id="top"> </div> <!-- div top -->

<!-- ================= Content ================= -->
<div id="content">

<!-- ================= Menu ================= -->
<div id="menu">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="javascript:void(0);" id="about">About</a></li>
<li><a href="javascript:void(0);" id="all">All Movies</a></li>


</ul>
</div>

<!-- ================= End Menu ================= -->

<!-- =================Login form ================= -->


<form method="post" action="login/loginHandler.php" class="form-stacked">
		<fieldset>
			&#160;&#160;&#160;&#160;&#160;&#160;<label for="user">Username:</label>
			<input id="user" name="user" />&#160;&#160;
			<label for="pass">Password: </label>
			<input id="pass" type="password" name="pass" />
		
			<button class="primary btn">Login</button> 
			<a href="register.html" class="btn">Register</a>
			</fieldset>
</form>
<!-- =================End Login form ================= -->

<!-- ================= Left ================= -->
<div class="left"> 

<!-- ================= Articles ================= -->
<div class="articles">
Check out reviews on the latest movies in NYC. Dont forget to participate in the poll. Which movie tastes like STALEPOPCORN?<br />
Sign Up you get the chance to review the movies you think taste like STALEPOPCORN. 
<br/><br/>
<div class="slider-wrapper theme-default">
    			<div class="ribbon"></div>
  				  <div id="slider" class="nivoSlider">
						<a href="#"><img src="images/slide/NewYearsEve_slide.jpg"/></a>
						<a href="#"><img src="images/slide/Happy_slide.jpg"/></a>
						<a href="#"><img src="images/slide/immortals_slide.jpg"/></a>
					</div>
					
			</div>
<br /><br />

</div>


<h2>Featured Movies</h2>
<div class="articles">
<div class="movie_choice">
<a href="#"><img src="images/movies/hugo.jpg" width=150px height=200px /></a>
<div id="r1" class="rate_widget">
        <div class="star_1 ratings_stars"></div>
        <div class="star_2 ratings_stars"></div>
        <div class="star_3 ratings_stars"></div>
        <div class="star_4 ratings_stars"></div>
        <div class="star_5 ratings_stars"></div>
        <div class="total_votes">vote data</div>
</div>
<br/><br/><br/>
</div>
	<div class="movie_choice">
		<a href="#"><img src="images/movies/muppets.jpg" width=150px height=200px /></a>
		<div id="r2" class="rate_widget">
        	<div class="star_1 ratings_stars"></div>
        	<div class="star_2 ratings_stars"></div>
        	<div class="star_3 ratings_stars"></div>
        	<div class="star_4 ratings_stars"></div>
       		<div class="star_5 ratings_stars"></div>
        	<div class="total_votes">vote data</div>
		</div>
	</div>
	<div class="movie_choice">
		<a href="#"><img src="images/movies/twilight.jpg" width=150px height=200px /></a>
		<div id="r3" class="rate_widget">
    	    <div class="star_1 ratings_stars"></div>
       		<div class="star_2 ratings_stars"></div>
        	<div class="star_3 ratings_stars"></div>
        	<div class="star_4 ratings_stars"></div>
        	<div class="star_5 ratings_stars"></div>
        	<div class="total_votes">vote data</div>
		</div>
	</div>

</div>

</div>

<div class="right"> 

<h2>Search</h2>

<form id="formid" name="nameof_form" action="javascript:void(0);">
		
			<br /><b>Movie Title: </b><br/>
			<div id="namesearch">
			<input type="text" id="namefieldid" size="20"><br/><br/>
			<input type="submit" value="Search"><br/>
			</div>
			
</form>

<br/>&#160;&#160;&#160;&#160;&#160;&#160;--- OR ---<br /><br />
<form id="genreformid" name="genre_form" action="javascript:void(0);">
<b>Genre:</b>
<select name="genre" id="genre">
  <option selected>Select Genre</option>
  <option value="action">Action</option>
  <option value="drama">Drama</option>
  <option value="animation">Animation</option>
  <option value="comedy">Comedy</option>
</select>
<input type="submit" value="Go"><br/>
</form>
<br/>&#160;&#160;&#160;&#160;&#160;&#160;--- OR ---<br /><br />
<form id="rateformid" name="rate_form" action="javascript:void(0);">
<b>Rating:</b> 
<select name="rate" id="rate">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select>
<input type="submit" value="Go"><br/><br/>
</form>
	<h2>Poll</h2>
<div id="poll_container">
			<form id='poll' action="poll/poll.php" method="post" accept-charset="utf-8">
					<p>Which Movie tastes like STALEPOPCORN?:</p><p>
					<input type="radio" name="poll" value="opt1" id="opt1" /><label for='opt1'>&nbsp;Jack Jill</label><br />
					<input type="radio" name="poll" value="opt2" id="opt2" /><label for='opt2'>&nbsp;Twilight</label><br />
					<input type="radio" name="poll" value="opt3" id="opt3" /><label for='opt3'>&nbsp;The Descendants</label><br />
					<input type="radio" name="poll" value="opt4" id="opt4" /><label for='opt4'>&nbsp;Immortals</label><br />
					<input type="submit" value="Vote &rarr;" /></p>
			</form>				
	</div>
</div>

<div style="clear: both;"> </div>

</div>


<div id="bottom"> </div>

<div id="footer">
Developed by Danielle Clarke, Zainab Ebrahimi, Richard Ramos and Jonathan Vasquez.
</div>

</div>

</body>
<!--- =================End Body ================= -->
</html>

