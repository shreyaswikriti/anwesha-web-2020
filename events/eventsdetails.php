<?php
  include("../backend/user/functions/init.php");
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		header("location:../404.html");
	}
 $service_url = 'http://localhost/anwesha-web-2020/backend/admin/functions/events_api.php';
 $service_url = 'https://anwesha.info/backend/admin/functions/events_api.php';
  $curl = curl_init($service_url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $curl_response = curl_exec($curl);
  if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('Error occured during curl exec. Additioanl info: ' . var_export($info));
  }
  curl_close($curl);
  $data = json_decode($curl_response, true);
  $event=NULL;
  foreach ($data as $d) {
    if ($d['ev_id'] == $id) {
      $event = $d;
    }
  }
  if($event==NULL){
	header("location:../404.html");
  }

  $current_event=null;
  $event_amount=$event['ev_amount'];
  $amount_paid;
  $heading='';
  $isComp=0;
  $param=$event['ev_category'];
	if($param=="technical"){
		$heading="TECHNICAL";
		$isComp=1;
	}elseif($param=="cultural"){
		$heading="CULTURAL";
		$isComp=1;
	}elseif($param=="awelfare"){
		$heading="ARTS & WELFARE";
		$isComp=1;
	}elseif($param=="pronite"){
		$heading="PRONITES";
	}elseif($param=="proshow"){
		$heading="PROSHOWS";
	}elseif($param=="informal"){
		$heading="INFORMALS & WORKSHOPS";
	}elseif($param=="pre-anwesha"){
		$heading="PRE-ANWEHSA EVENTS";
	}

?>
<!doctype html>
<html lang="ZXX">

<head>
<title>Anwesha ♥ | IIT Patna</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name=description content="">
	<meta name=author content="Enventer">
	<link rel="icon" href="../img/favicon.png" type="image/png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,700,900&display=swap" rel="stylesheet">
	<!-- Meanmenu css -->
	<link rel="stylesheet" href="../css/meanmenu.css">
	<!-- Animation CSS -->
	<link href="../css/aos.min.css" rel="stylesheet">
	<link href="../css/slider.css" rel="stylesheet">
	<!-- Slick Carousel CSS -->
	<link href="../css/slick.css" rel="stylesheet">
	<!-- Main CSS -->
	<link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="../css/responsive.css">
	<style>
		.project-info h4{
			color:#d5e7de;
			font-family:font-family: initial;;

		}
		</style>
</head>

<body style="background-color:#121216;">
	<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


	<!--=============== Preloader Start========================-->
	<div id='preloader'>
		<div id='status'>
			<img src='../img/loading.gif' alt='LOADING....!!!!!' />
		</div>
	</div>

	<!--=========== Main Header Area ===============-->
	<header id="home">
		<div class="main-navigation-1">
			<div class="container" >
				<div class="row">
					<!-- logo-area-->
					<div class="col-xl-2 col-lg-3 col-md-3">
						<div class="logo-area">
							<a href="index.html"><img src="../img/logo.png" alt="enventer"></a>
						</div>
					</div>
					<!-- mainmenu-area-->
					<div class="col-xl-10 col-lg-9 col-md-9">
						<div class="main-menu f-right">
							<nav id="mobile-menu">
							<ul>
									<li>
										<a href="../">home</a>
									</li>
									<li>
										<a href="https://www.townscript.com/e/anwesha-iit-patna-214401">register</a>
									</li>
									<li>
										<a href="../events.html">events</a>
									</li>
									<li>
										<a href="../competition.html">Competitions</a>
									</li>
									<li>
										<a href="../comingsoon/index.html">sponsors</a>
									</li>
									<li>
										<a href="../gallery.html">gallery</a>
									</li>
									<!-- <li>
										<a  href="pronites.html">Pronites</a>
									</li> -->
									<li>
										<a href="../ca/ca.php">CA</a>
									</li>
									<!-- dropdown menu-area-->
									<li>
										<a href="#" onclick="return false">more <i class="fas fa-angle-down"></i>
										</a>
										<ul class="dropdown">
											<li><a href="https://www.townscript.com/e/anwesha-iit-patna-214401">accomodation</a></li>
											<li><a href="../multicity.html">multicity</a></li>
											<!-- <li><a href="faq.html">FAQ</a></li> -->
											<li><a href="../team.html">our team</a></li>
											<!-- <li>
												<a  href="pronites.html">Pronites</a>
											</li> -->
											<li><a href="../contact.html">contact</a></li>
											<!-- <li><a href="single-blog.html">single blog</a></li>
												<li><a href="single-blog2.html">single blog two</a></li>
												<li><a href="team.html">our team</a></li>
												<li><a href="contact.html">contact us</a></li>
												<li><a href="404.html">404 Page</a></li> -->
										</ul>
									</li>
								</ul>
							</nav>
						</div>
						<!-- mobile menu-->
						<div class="mobile-menu"></div>
						<!--Search-->
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- =========Single Portfolio Image Area=========== -->
	<div class="info">
		<div class="jumbotron jumbotron-fluid" style="background-color:  #121216;max-height: 200px;border-bottom: 5px solid #1b8a5f;margin-top:80px;">
		<h2 class="text-title" style="text-align: center;color: rgb(125, 192, 136);"><?php echo $heading ?></h2>
			<h3 style="text-align: center;color: rgb(125, 192, 136); "><?php echo $event["ev_name"] ?> </h3>
		</div>
	</div>
	<!-- =========Single Portfolio Details=========== -->
	<div class="portfolio-details" style="background-color:#121216;">
		<div class="container" style="background-color:#121216;">
			<div class="portfolio-details-box">
				<div class="row">
					<!--single project slider-->
					<div class="col-xl-6 col-lg-6 col-md-12">
						<div class="single-project-slider">
							<div class="portfolio-screenshot">
								<img src="<?php echo $event['ev_poster_url']?>" alt="">
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-12" style="background-color:#16161b">
						<!--single project name-->
						<div class="project-name">
							<h3 style="color: rgb(125, 192, 136);"><?php echo $event["ev_name"] ?></h3>
						</div>
						<!--single project description-->
						<div class="project-description">
							<h5 style="color:  rgb(194, 224, 199);font-family:inherit;">Description</h5>
							<p style="color: rgb(125, 192, 136);"><?php echo $event["ev_description"] ?></p>
                        </div>
                        <div class="project-info" style="background-color:#16161b;">
                            <h3 style="color:#205f40">Event Info</h3>
                            <h4>Organiser: <span ><?php echo $event['ev_organiser'] ?></span></h4>
                            <h4>Organizer's Phone: <span ><?php echo $event['ev_org_phone'] ?></span></h4>
                            <h4>Club: <span ><?php echo $event['ev_club'] ?></span></h4>
                            <h4>Date: <span ><?php echo $event['ev_date'] ?></span></h4>
                            <h4>Venue: <span ><?php echo $event['ev_venue'] ?></span></h4>
                            <h4>Start Time: <span ><?php echo $event['ev_start_time'] ?></span></h4>
                            <h4>End Time: <span ><?php echo $event['ev_end_time'] ?></span></h4>
                            <?php if($event["is_team_event"]){?>
                                <h4>Maximum Team Strength: <span><?php echo $event['team_members'] ?></span></h5>
                            <?php } ?>
                        </div>
					</div>
				</div>
			</div>
			<div class="row">
				<!--single project description-->
				
			<div class="col-xl-6">
				<!--single project technology-->
				<div class="project-technology form-check form-check-inline" style="background-color:#121216">
					<!-- <h3>Technology we used</h3> -->
					<ul>
						
						<?php if($isComp){ ?><li  style="background-color:#121216"><button class="btn btn-info form-check-input"><a href="<?php echo $event['ev_rule_book_url']?>" style="color:white">Rulebook</a></button></li><li  style="background-color:#121216"><button class="btn btn-info form-check-input"><a href="<?php echo $event['register_url'] ?>" style="color:white">Register</a></button></li><?php } ?>
					</ul>
				</div>
				<!--single project info-->
					
				</div>
			</div>
		</div>
	</div>
	<div class="toastContainer" style="position: absolute; top: 0; right: 0; margin: 20px; z-index: 99999;"></div>
	<!-- =========Call to Action=========== -->
	<div class="callto-action">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-7">
					<div class="callto-action-text">
						<h5>Like what you see? <span>Let’s work</span> </h5>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-5">
					<div class="callto-action-btn">
						<a href="../contact.html">contact us</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- =========Footer Area=========== -->
	<section id="footer-fixed">
		<div class="big-footer">
			<div class="container">
				<div class="row">
					<!--footer logo-->
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
						<div class="footer-logo">
							<a href="#">
								<img src="img/logo.png" alt="">
							</a>
							<p> Think. Dream. Live. Anwesha. <br>  A Reflection of Fond Remembrances.</p>
						</div>
						<!--footer social-->
						<div class="social">
							<ul>
								<li><a class="footer-socials" href="https://www.facebook.com/anwesha.iitpatna/"><i
											class="fab fa-facebook"></i></a></li>
								<li><a class="footer-socials" href="https://www.instagram.com/anwesha.iitp/?hl=en"><i
											class="fab fa-instagram"></i></a></li>
								<li><a class="footer-socials" href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a class="footer-socials"
										href="https://www.youtube.com/channel/UCVVdnGvmkm-Z9v9IKAq77JQ"><i
											class="fab fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
					<!--footer quick links-->
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
						<div class="footer-heading">
							<h3>quick links</h3>
						</div>
						<div class="footer-content">
						<ul>
								<li><a href="https://www.townscript.com/e/anwesha-iit-patna-214401">register</a></li>
								<li><a href="../events.html">events</a></li>
								<li><a href="https://www.townscript.com/e/anwesha-iit-patna-214401">accomodation</a></li>
								<li><a href="../comingsoon/index.html">sponsors</a></li>
								<li><a href="../gallery.html">gallery</a></li>
							</ul>
						</div>
					</div>
					<!--footer latest work-->
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
						<div class="footer-heading">
							<h3>&nbsp;</h3>
						</div>
						<div class="footer-content">
							<ul>
								<li><a href="../ca/ca.php">Campus Ambassador</a></li>
                                <!--<li><a href="">FAQ</a></li>-->
                                <li><a href="../competition.html">Competitions</a></li>
								<li><a href="../contact.html">contact</a></li>
								<li><a href="../team.html">team</a></li>
								<li><a href="../multicity.html">multicity</a></li>
							</ul>
						</div>
					</div>
					<!--footer subscribe-->
					<!-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
						<div class="footer-heading">
							<h3>Get Updates</h3>
						</div>
						<div class="footer-content footer-cont-mar-40">
							<form action="#">
								<input id="leadgenaration" type="email" placeholder="Enter your email">
								<input id="subscribe" type="submit" value="Subscribe">
							</form>
						</div>
					</div> -->
				</div>
			</div>
		</div>
		<!--copyright-->
		<footer>
			<p>© 2020 Anwesha IIT Patna Web and App. All rights reserved.</p>
		</footer>
	</section>
	<!-- Jquery JS -->
	<script src="../js/vendor/jquery-2.2.4.min.js"></script>
	<!-- Proper JS -->
	<script src="../js/popper.min.js"></script>
	<!-- Bootstrap Js -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Video popup Js -->
	<script src="../js/magnific-popup.min.js"></script>
	<!-- Waypoint Up Js -->
	<script src="../js/waypoints.min.js"></script>
	<!-- Counter Up Js -->
	<script src="../js/counterup.min.js"></script>
	<!-- Meanmenu Js -->
	<script src="../js/meanmenu.min.js"></script>
	<!-- Animation Js -->
	<script src="../js/aos.min.js"></script>
	<!-- Filtering Js -->
	<script src="../js/isotope.min.js"></script>
	<!-- Background Move Js -->
	<script src="../js/jquery.backgroundMove.js"></script>
	<!-- Slick Carousel Js -->
	<script src="../js/slick.min.js"></script>
	<!-- ScrollUp Js -->
	<script src="../js/scrollUp.js"></script>
	<!-- Main Js -->
	<script src="../js/main.js"></script>
</body>

</html> 
