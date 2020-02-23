<?php require_once("include/DB.php");  ?>
<?php require_once("include/Sessions.php");  ?>
<?php require_once("include/Functions.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Travel-Posts</title>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  		<!-- Favicon -->
		  <link rel="shortcut icon" href="Images/inside.png" type="image">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">  
  <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
<style>
*{
    margin: 0;
    padding: 0;
}
.navbar{
  	margin-bottom: 0;
  	border-radius: 0;
  	background-color: #5E4485;
  	color: #FFF;
  	padding: 1% 0;
  	font-size: 1.2em;
  	border: 0;
	}
  .navbar-brand{
  	float: left; 
  	min-height: 30px;
  	padding: 0 15px 5px;
  }
  .navbar-inverse .navbar-nav .active a,.navbar-inverse .navbar-nav .active a:focus 
  .navbar-inverse .navbar-nav .active a:hover {
  color:#FFF;
  background-color:#5E4485;

}
.navbar-inverse .navbar-nav ul a{
 color: #D5D5D5  ;
	}
.icon-bar{
    background: darkorange;
}
li a
{
    color: darkorange;
}
.footer{
    list-style: none;
    display: flex;  
}
footer{
		width: 100%;
		background-color: #5E4485;
		padding: 3%;
		color: #FFF;
	}
.fa-footer{
    
    font-size: 30px!important;
    color:#fff;
    background-color: #000;
}
.fa-facebook-official{
	margin: 12px;
    padding: 7px;
    border-radius: 5px;   
}
.fa-instagram{
    margin: 12px;
    padding: 7px;
    border-radius: 5px;
}
.fa-google-plus-official{
    margin: 12px;
    padding: 7px;
    border-radius: 5px;
}
.fa-facebook-official:hover{
    background-color: #3B5998;
    
}

.fa-instagram:hover{
    background: #f09433; 
    background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); 
    background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
    background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 

   
}

.fa-google-plus-official:hover{
    background-color: #D62408;
}
/*#social_logo{
    transform: translateX(3%);
}
@media only screen and (max-width: 1200px){
	#social_logo{
		transform: translateX(-15%);
	}
}
@media only screen and (max-width: 987px){
	#social_logo{
		transform: translateX(-6%);
	}
}*/

.well{
	background-color:#fff!important;
}


#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 26px;
  border: none;
  outline: none;
  background-color: rgba(100, 100, 100, 0.4);
  color: white;
  cursor: pointer;
  padding: 0 11px;
  border-radius: 4px;
  
}

#myBtn:hover {
	background-color:#AE404B;
}
.i,.fa-angle-up{
    color:#fff;
    
}

</style>
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
<!---Posts---->

	<h1 class="title text-center" id="posts">Posts</h1>
	<br>
	<br>
	<br>
	<div class="container" style="margin-top: 10px;">	
	<div class="row">
		<div class="col-md-8">
		<?php	
		global $connectingDB;
		if (isset($_GET["SearchButton"])) {
		$Search=$_GET["Search"];
		$ViewQuery="SELECT * FROM admin_panel WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%' OR category LIKE '%$Search%' OR post LIKE '%$Search%' ";
		}elseif(isset($_GET["Category"])){
			$Category=$_GET["Category"];
			$ViewQuery="SELECT * FROM admin_panel WHERE category='$Category' ORDER BY datetime desc";
		}elseif(isset($_GET["Page"])){
			$Page=$_GET["Page"];
			if($Page==0||$Page<1){
				$ShowPostFrom=0;
			}else{
				$ShowPostFrom=($Page*5)-5;}
			$ViewQuery="SELECT * FROM admin_panel ORDER BY datetime desc LIMIT $ShowPostFrom,5";	
		}
		else{

		$ViewQuery="SELECT * FROM admin_panel ORDER BY datetime desc LIMIT 0,3";}
		$Execute=mysqli_query($connectingDB,$ViewQuery);
		while ($DataRows=mysqli_fetch_array($Execute)) {
		$PostId=$DataRows["id"];
		$DateTime= $DataRows["datetime"];
		$Title= $DataRows["title"];
		$Category= $DataRows["category"];
		$Admin= $DataRows["author"];
		$Image= $DataRows["image"];
		$Post= $DataRows["post"]; 
		?>
		<div class="blogpost thumbnail" style="background-color:whitel;">
			<img class="img-responsive img-rounded" src="Upload/<?php echo $Image; ?>">
		<div class="caption">
		<h1 id="heading"> <?php echo htmlentities($Title); ?> </h1>	<p class="description">Category:<?php echo htmlentities($Category); ?>Published on <?php echo htmlentities($DateTime); ?>  </p>
		<p class="post"><?php echo $Post; ?></p>
		</div>
	</div>
		<?php } ?>	
		<nav>
			<ul class="pagination pull-left pagination-lg">
			<?php
		 global $connectingDB;
		 $QueryPagination="SELECT COUNT(*) FROM admin_panel";
		 $ExecutePagination=mysqli_query($connectingDB,$QueryPagination);
		 $RowPagination=mysqli_fetch_array($ExecutePagination);
		 $TotalPosts=array_shift($RowPagination);

		 $PostPagination=$TotalPosts/5;
		 $PostPagination=ceil($PostPagination);
		 for($i=1;$i<=$PostPagination;$i++){
		 if(isset($Page)){	
		 if($i==$Page){	
		 	?>
		<li class="active"><a href="index.php?Page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		<?php
	}else{ ?>
		<li><a href="index.php?Page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		<?php } 
	}
	}
	?>

 	</ul><br /><br /><br /><br /><br />
</nav>
		</div>
		

		
		<div class="col-md-4">
	    <div class="well">
		<h4>Follow Us</h4>
		<ol class="footer" id="social_logo">
                                    <li>
                                    <a href="#">
                                    <div class="float-left f"><i class="fa fa-facebook-official fa-footer" aria-hidden="true"></i></div>
                                    </a>
                                    </li>
                                    <li>
                                    <a href="#">
                                    <div class="float-left i"><i class="fa fa-instagram fa-footer" aria-hidden="true"></i></div>
                                    </a>
                                    </li>
                                    <li>
                                    <a href="#">
                                    <div class="float-left t"><i class="fa fa-google-plus-official fa-footer" aria-hidden="true"></i></div>
                                    </a>
                                    </li>                    
		</ol>
		

		
     <br><br>

		
							  <h3>Categories</h3>
							  <br>
							  <br>
                             <?php 
                             global $connectingDB;

		$ViewQuery="SELECT * FROM category ORDER BY datetime desc";
		$Execute=mysqli_query($connectingDB,$ViewQuery);
		while ($DataRows=mysqli_fetch_array($Execute)) {
			$id=$DataRows['id'];
			$Category=$DataRows['name'];
			?>
<a href="blog.php?Category=<?php echo $Category; ?>">		
<h4 style="color: blue;"><?php echo $Category."<br>"."<hr>"; ?></h4>
</a>
<?php } ?>

		<h3>Recent Posts</h3>

		<?php
		$connectingDB;
		$ViewQuery="SELECT * FROM admin_panel ORDER BY datetime desc LIMIT 0,5";
		$Execute=mysqli_query($connectingDB,$ViewQuery);
		while ($DataRows=mysqli_fetch_array($Execute)) {
		$PostId=$DataRows["id"];
		$DateTime= $DataRows["datetime"];
		$Title= $DataRows["title"];
		$Image= $DataRows["image"];
		if (strlen($DateTime)>11){
			$DateTime=substr($DateTime,0,11);}
		?>
	<div>
	<img style="margin-top: 10px;margin-left: 10px;" src="Upload/<?php echo htmlentities($Image); ?>" width=70; height=70;>
	<h4 id="heading" style="margin-left: 90px;margin-top: -65px;"><?php echo htmlentities($Title); ?></h4>	
	<p id="description" style="margin-left: 90px;"><?php echo htmlentities($DateTime); ?></p>
	<hr>
</div>

	<?php } ?>


		</div>
		
		</div>
						
		  </div>
	</div>
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

<!--scroll top button-->
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class=" fa fa-angle-up"></i>  </button>


<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>




</body>
</html>