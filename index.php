<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php
if(isset($_POST["submit"])){
	$Name=mysqli_real_escape_string($connectingDB,($_POST["name"]));
	$Email=mysqli_real_escape_string($connectingDB,($_POST["email"]));
	$Phone=mysqli_real_escape_string($connectingDB,($_POST["phone"]));
	$Message=mysqli_real_escape_string($connectingDB,($_POST["message"]));

if(empty($Name)&&empty($Email)&&empty($Phone)&&empty($Message)){
	$_SESSION["message"]="All Fields must be filled out";
	Redirect_To("index.php");
}	
else{
	global $connectingDB;
	$Query="INSERT INTO contact(name,email,phone,message)
	VALUES('$Name','$Email','$Phone','$Message')";
	$Execute=mysqli_query($connectingDB,$Query);
	if($Execute){
		$_SESSION["message"]="Thanks for your response";
		Redirect_To("index.php");
    }
}	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>hotelbookings-flightbookings-holidayspackages</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style2.css">
  <script src="script.js"></script>
</head>
<body> 
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MyNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="img/travellogo.jpg" style="height:50px;margin-top:2px;" alt="Travel Logo"></a>
			</div>
			<div class="collapse navbar-collapse" id="MyNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="blog.php">Posts</a></li>
					<li><a href="gallery1.php">Gallery</a></li>
					<li><a href="aboutus.php">About Us</a></li>

				</ul>
			</div>
		</div>
	</nav>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	<li data-target="#myCarousel" data-slide-to="1"></li>
	<li data-target="#myCarousel" data-slide-to="2"></li>
</ol>
<div class="carousel-inner" role="listbox">
	<div class="item active">
		<img src="img/travel2.jfif">
		<div class="carousel-caption">
			<h1>get to know</h1>
			<br>
			<button type="button" class="btn btn-default">get Started</button>
		</div>
		

	</div>
			<div class="item">
				<img src="img/travel1.jfif">
				
			</div>	
			<div class="item">
				<img src="img/travel3.jfif">
			</div>
			
	</div>				
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<div class="container text-center">
<h1>Our Services</h1>
<div class="row">
	<div class="col-sm-4">
		<img src="img/hotel.png" id="icon">
		<h4>Hotel Booking</h4>
		<p>
			More than 2,650,000 Hotels worldwide . Best Price Guaranteed. Inns. Real comments. No booking fees. Immediate confirmation. Houses. Hotels . Guest rooms. 24/7 customer service. Villas. Types: Hotels , Apartments.
		</p>
	</div>
	<div class="col-sm-4">
		<img src="img/cab.png" id="icon">
		<h4>Cab Service</h4>
		<p>
			Now Book Cabs In Over 900 Cities. Verified Cabs & Drivers At Best Prices. Hurry! Timely Pickup, Clean Cabs . No Surge Pricing, Verified & Trusted Drivers. 5 Million Happy Customers. Offers On First Booking . Book with Partial Payment. Lowest Price Guaranteed.	 
		</p>
	</div>
	<div class="col-sm-4">
		<img src="img/flightbooking.png" id="icon">
		<h4>Flight Tickets</h4>
		<p>
			Fly at Best Prices. Lowest Fares. Hassle-Free Travel. Hurry and Book Now! India's No.1 Airline. Best On-Time Performance, Over 1000 Daily Flights. Excess Baggage. Seat Selection. Lounge Services. Hassle Free Booking.
		</p>
	    </div>
	</div>
</div> 

<div class="social-box">
    <div class="container">
		<h1 class="text-center">
			Holiday Packages
		</h1>
     	<div class="row">
			 
			    <div class="col-lg-4 col-xs-12 text-center">
					<div class="box">
                        <img src="img/europe.jpg">
						<div class="box-title">
							<h3>Europe</h3>
						</div>
						<div class="box-text">
							<span>30 Itineraries to Choose From. Book your Europe Holiday Now! Customised Itineraries. Free Wi-fi in Coaches. Destinations: Paris, Barcelona, Zurich.</span>
						</div>
						<div class="box-btn">
						    <a href="#">Learn More</a>
						</div>
					 </div>
				</div>	 
				
				 <div class="col-lg-4 col-xs-12  text-center">
					<div class="box">
					    <img src="img/bhutan.jpg">
						<div class="box-title">
							<h3>Bhutan</h3>
						</div>
						<div class="box-text">
							<span>Enjoy Beautiful Sightseeing of Thimpu, Punakha, Paro etc. Best Deal Guranteed! Get Mesmerised By the Scenic And Fascinating Mountain Views of Bhutan</span>
						</div>
						<div class="box-btn">
						    <a href="#">Learn More</a>
						</div>
					 </div>
				</div>	 
				
				 <div class="col-lg-4 col-xs-12 text-center">
					<div class="box">
                        <img src="img/bali.jpg">
						<div class="box-title">
							<h3>Bali</h3>
						</div>
						<div class="box-text">
							<span>Southern Bali is the most popular area for tourists on their holidays in Bali,Nusa Dua,Kuta and Legian are very popular spots attracting very different crowds.</span>
						</div>
						<div class="box-btn">
						    <a href="#">Learn More</a>
						</div>
					 </div>
				</div>	 
				
				<div class="col-lg-4 col-xs-12 text-center">
					<div class="box">
                        <img src="img/kerela.jpg">
						<div class="box-title">
							<h3>Kerela</h3>
						</div>
						<div class="box-text">
							<span>Kerala Packages - Book your Kerala tour packages at best price with Yatra.com. Click now to get exclusive deals on Kerala holiday packages with airfare, hotel ..</span>
						</div>
						<div class="box-btn">
						    <a href="#">Learn More</a>
						</div>
					 </div>
				</div>	 
				
				 <div class="col-lg-4 col-xs-12 text-center">
					<div class="box">
					    <img src="img/dubai.jpg">
						<div class="box-title">
							<h3>Dubai</h3>
						</div>
						<div class="box-text">
							<span>Dubai Packages - Book your Dubai tour packages at best price with Yatra.com. Click now to get exclusive deals on Dubai holiday packages with airfare, hotel ...</span>
						</div>
						<div class="box-btn">
						    <a href="#">Learn More</a>
						</div>
					 </div>
				</div>	 
				
				 <div class="col-lg-4 col-xs-12 text-center">
					<div class="box">
                        <img src="img/north.jpg">
						<div class="box-title">
							<h3>North East</h3>
						</div>
						<div class="box-text">
							<span>North East Holidays - Get best offers on North East holiday packages at Thomas Cook India. Book North East tour package & get amazing deals for your North ...</span>
						</div>
						<div class="box-btn">
						    <a href="#">Learn More</a>
						</div>
					 </div>
				</div>
		
		</div>		
    </div>
</div>



<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<h2>Here's the cool thing about mumbai</h2>
		<p>A microcosm of India, Mumbai is a melting pot of cultures, professions, and food! You’ll find everything here – incredible street food, the best fashion labels, and movie stars.</p>
		<p>Mumbai (formerly Bombay) is a densely populated city on the west coast of India. This financial center is the largest city in the country. On the seafront of the port of Mumbai, the Gateway of India is an iconic stone arch that was built in 1924, under the British Raj. Offshore, the neighboring island of Elephanta has ancient temples carved into the rock and dedicated to the Hindu god Shiva. The city is also famous as the center of the country's film industry along with Bollywood.</p>
	</div>
		<div class="col-sm-6">
			<img src="img/mumbai.jpg" class="img-responsive">
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<h5><a href="#hidden" data-toggle="collapse">Care to learn more about us?</a></h5>
		<div id="hidden" class="collapse">
		<p>
			A travel agency is a private retailer or public service that provides travel and tourism-related services to the general public on behalf of suppliers.
			Travel agencies often receive commissions and other benefits and incentives from providers or may charge a fee to the end users.Smaller providers, such as boutique hotels, have often found it to be cheaper to offer commissions to travel agents rather than engage in direct advertising and distribution campaigns; however, many larger providers, such as airlines, do not pay commissions.The customer is normally not made aware of how much the travel agent is earning in commissions and other benefits.A 2016 survey of 1,193 travel agents in the United States found that on average 78% of their revenue was from commissions and 22% was generated from fees.
		</p>
		</div>
	</div>
</div>


	<form action="index.php" name='myform' onsubmit="return validate()" method="post">
		<h3 style="text-align: center;">Get In Touch!</h3>
	<div class="container">	
	   <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="name" class="form-control" placeholder="Your Name *" value="" />
				</div>
				<div class="form-group">
					<input type="text" name="email" class="form-control" placeholder="Your Email *" value="" />
				</div>
				<div class="form-group">
					<input type="number" name="phone" class="form-control" placeholder="Your Phone Number *" value="" />
				</div>
				<div>
			    <h3>
				<?php echo Message(); ?>
				</h3>
				</div>				
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Submit" />
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
<footer class="container-fluid text-center">
	<div class="row">
		<div class="col-sm-4">
			<h3>Contact Us</h3>
			<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3549.4005538501765!2d78.0399535150506!3d27.175144783015206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39747121d702ff6d%3A0xdd2ae4803f767dde!2sTaj%20Mahal!5e0!3m2!1sen!2sin!4v1582494207265!5m2!1sen!2sin" width="300" height="200" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
			</p>
		</div>
		<div class="col-sm-4">
			<h3>Connect</h3>
			<a href="#" class="fa fa-facebook"></a>
			<a href="#" class="fa fa-twitter"></a>
			<a href="#" class="fa fa-google"></a>
			<a href="#" class="fa fa-instagram"></a>
			<a href="#" class="fa fa-youtube"></a>
			<p>
				Connect with us on a social media to get an updates about our recent discounts on a holiday packages.
			</p>
		</div>
		<div class="col-sm-4">
			<img src="img/travellogo.jpg" style="height:200px;margin-top:15px;" class="icon">

	</div>
</footer>

</body>
</html>