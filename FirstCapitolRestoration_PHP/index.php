
<?php

include_once("config.php");

$webpage = "SELECT * FROM webpage";

$boxitems = "SELECT * FROM boxitems";

$galleryimages = "SELECT * FROM galleryimage WHERE active = 1";

$res1 = mysqli_query($mysqli, $webpage);
$result1 = mysqli_fetch_array($res1);

$res2 = mysqli_query($mysqli, $boxitems);
$result2 = mysqli_fetch_array($res2);

$res3 = mysqli_query($mysqli, $galleryimages);
$result3 = mysqli_fetch_array($res3);

// Code to send emails //
$errors = '';
$myemail = '';
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))

{

$to = '';

$email_subject = "Contact form submission: $name";

$email_body = "You have received a new message. ".

" Here are the details:\n Name: $name \n ".

"Email: $email_address\n Message \n $message";

$headers = "From: $myemail\n";

$headers .= "Reply-To: $email_address";

mail($to,$email_subject,$email_body,$headers);

echo "<script>alert('Your message was sent successfully!');</script>";
echo "<script>document.location.href='contact.php'</script>";

}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>First Capitol Restoration</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<style>
		.banner .content h1, .banner .content p, .banner .content a {
			color: white !important;
		}
		.i-size-1 {
				font-size:1.5rem;
			} 
		
		
	</style>
	<body class="is-preload">
			<div id="wrapper" class="divided">
				<!-- ************** Banner ************** -->
				<section class="banner onload-image-fade-in onload-content-fade-right invert style5  image-position-center orient-left content-align-center" style="padding:2em 3em">
					<div class="content" >
						<img src="images/<?php echo $result1['bannerlogoimage']; ?>" style="height:18em;width:18em;border-radius: 100%;" alt="">

				
						<p class="major">
							
							<?php echo $result1['bannertext']; ?>
					
						</p>
						<ul class="actions stacked">
							<li><a href="#first" class="button primary large wide smooth-scroll-middle">Get In Touch</a></li>
						</ul>
					</div>
					<div class="image">
						<img src="images/<?php echo $result1['bannerbackgroundimage']; ?>" alt="">
					</div>
				</section>
				<!-- ************** End Banner ************** -->

					<!-- ************** Section One ************** -->
					<section class="wrapper style1 align-center">
						<div class="inner" style="width:75rem;">
							<!-- Heading Area -->

							<h2>
								<!-- Title -->
								<?php echo $result1['sectionone_title']; ?>
								<!-- End Title -->
							</h2>
							<p>
								<!-- Subtitle -->
								<?php echo $result1['sectionone_subtitle']; ?>
								<!-- End Subtitle -->
							</p>

							<!-- End Heading Area -->

							<!-- Box Items Area -->

							<div class="items style1 small onscroll-fade-in">

								<?php
								
								$icons = array("fas fa-pencil-ruler", "fas fa-ruler-combined", "far fa-handshake", "fas fa-hard-hat");
								$boxCount = 0;

									while ($row = $result2) {

								?>

									<!-- Box 1 -->
									<section>
										<span class="icon style2 major">
											<span class="fa-stack i-size-1">
												<i class="fas fa-circle fa-stack-2x"></i>
												<i class="<?php echo $icons[$boxCount]; ?> fa-stack-1x fa-inverse"></i>
											</span>
										</span>
											<h3>
											<!-- Heading -->
												<?php echo $row['title']; ?>
											<!-- End Heading -->
										</h3>
										<p>
											<!-- Subheading -->
											<?php echo $row['subtitle']; ?>
											<!-- End Subheading -->
										</p>
									</section>
									<!-- End Box 1 -->

								<?php       
										$boxCount += 1;

									}

									mysqli_free_result($res2);
								?>   
								
							</div>
						</div>
					</section>
				<!-- ************** End Section One ************** -->

				<!-- ************** Section Two ************** -->
					<section class="spotlight style1 orient-right content-align-left image-position-center onscroll-image-fade-in" id="first">
						<div class="content">
							
							<h2>
								<!-- Heading -->
								<?php echo $result1['sectiontwo_title']; ?>
								<!-- End Heading -->
							</h2>
							
							<p>
								<!-- Subheading -->
								<?php echo $result1['sectiontwo_subtitle']; ?>
								<!-- End Subheading -->
							</p>
							
							<ul class="actions stacked">
								<li><a href="#contactform" class="button">Learn More</a></li>
							</ul>
						</div>

						<div class="image">

							<!-- Image -->
							<img src="images/<?php echo $result1['sectiontwo_image']; ?>" alt="" />

						</div>
					</section>
				<!-- ************** End Section Two ************** -->

				<!-- ************** Section Three ************** -->
					<section class="spotlight style1 orient-left content-align-left image-position-center onscroll-image-fade-in">
						<div class="content">
							
							<h2>
								<!-- Heading -->
								<?php echo $result1['sectionthree_title']; ?>
								<!-- End Heading -->
							</h2>
							
							<p>
								<!-- Subheading -->
								<?php echo $result1['sectionthree_subtitle']; ?>
								<!-- End Subheading -->
							</p>
							
							<ul class="actions stacked">
							<li><a href="#contactform" class="button">Learn More</a></li>
							</ul>
						</div>
						<div class="image">

							<!-- Image -->
							<img src="images/<?php echo $result1['sectionthree_image']; ?>" alt="" />

						</div>
					</section>
				<!-- ************** End Section Three ************** -->

				<!-- ************** Section Four ************** -->
					<section class="spotlight style1 orient-right content-align-left image-position-center onscroll-image-fade-in">
						<div class="content">
							
							<h2>
								<!-- Heading -->
								<?php echo $result1['sectionfour_title']; ?>
								<!-- End Heading -->
							</h2>
							
							<p>
								<!-- Subheading -->
								<?php echo $result1['sectionfour_subtitle']; ?>
								<!-- End Subheading -->
							</p>
							
							<ul class="actions stacked">
							<li><a href="#contactform" class="button">Learn More</a></li>
							</ul>
						</div>
						<div class="image">

							<!-- Image -->
							<img src="images/<?php echo $result1['sectionfour_image']; ?>" alt="" />

						</div>
					</section>
				<!-- ************** End Section Four ************** -->

				<!-- ************** Section Five ************** -->
					<section class="wrapper style1 align-center">

						<!-- Heading -->
						<div class="inner">
							<h2>
								<!-- Title -->
								<?php echo $result1['sectionfive_title']; ?>
								<!-- End Title -->
							</h2>
							
							<p>
								<!-- Subtitle -->
								<?php echo $result1['sectionfive_subtitle']; ?>
								<!-- End Subtitle -->
							</p>					
						</div>
						<!-- End Heading -->

						<!-- Slideshow Gallery -->
							<div class="gallery style2 medium lightbox onscroll-fade-in">

							<?php

						

								while ($row = $result3) {

							?>


							   <!-- Gallery Image 1 -->
							   <article>
									<!-- Thumbnail Image -->
									<a href="images/gallery/<?php echo $row['mainimage']; ?>" class="image">

										<!-- End Linked Image -->
										<img src="images/gallery/<?php echo $row['thumbimage']; ?>" alt="" />
										<!-- End Linked Image -->

									</a>
									<!-- End Thumbnail Image -->

									<!-- Thumbnail Caption -->
									<div class="caption">
										<h3>
											<!-- Heading -->
											<?php echo $row['title']; ?>
											<!-- End Heading -->
										</h3>
										
										<p>
											<!-- Subheading -->
											<?php echo $row['subtitle']; ?>
											<!-- End Subheading -->
										</p>

										<ul class="actions fixed">
											<li><span class="button small">View</span></li>
										</ul>
									</div>
									<!-- Thumbnail Caption -->
								</article>


							<?php       

								}

								

							?>   

								
								<!-- End Gallery Image 1 -->

								<!-- Gallery Image 2 -->
								<article>
									<!-- Thumbnail Image -->
									<a href="images/gallery/fulls/02.jpg" class="image">

										<!-- End Linked Image -->
										<img src="images/gallery/thumbs/02.jpg" alt="" />
										<!-- End Linked Image -->

									</a>
									<!-- End Thumbnail Image -->

									<!-- Thumbnail Caption -->
									<div class="caption">
										<h3>
											<!-- Heading -->
											Magna etiam feugiat
											<!-- End Heading -->
										</h3>
										
										<p>
											<!-- Subheading -->
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											<!-- End Subheading -->
										</p>

										<ul class="actions fixed">
											<li><span class="button small">View</span></li>
										</ul>
									</div>
									<!-- Thumbnail Caption -->
								</article>
								<!-- End Gallery Image 2 -->

								<!-- Gallery Image 3 -->
								<article>
									<!-- Thumbnail Image -->
									<a href="images/gallery/fulls/03.jpg" class="image">

										<!-- End Linked Image -->
										<img src="images/gallery/thumbs/03.jpg" alt="" />
										<!-- End Linked Image -->

									</a>
									<!-- End Thumbnail Image -->

									<!-- Thumbnail Caption -->
									<div class="caption">
										<h3>
											<!-- Heading -->
											Magna etiam feugiat
											<!-- End Heading -->
										</h3>
										
										<p>
											<!-- Subheading -->
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											<!-- End Subheading -->
										</p>

										<ul class="actions fixed">
											<li><span class="button small">View</span></li>
										</ul>
									</div>
									<!-- Thumbnail Caption -->
								</article>
								<!-- End Gallery Image 3 -->

								<!-- Gallery Image 4 -->
								<article>
									<!-- Thumbnail Image -->
									<a href="images/gallery/fulls/04.jpg" class="image">

										<!-- End Linked Image -->
										<img src="images/gallery/thumbs/04.jpg" alt="" />
										<!-- End Linked Image -->

									</a>
									<!-- End Thumbnail Image -->

									<!-- Thumbnail Caption -->
									<div class="caption">
										<h3>
											<!-- Heading -->
											Magna etiam feugiat
											<!-- End Heading -->
										</h3>
										
										<p>
											<!-- Subheading -->
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											<!-- End Subheading -->
										</p>

										<ul class="actions fixed">
											<li><span class="button small">View</span></li>
										</ul>
									</div>
									<!-- Thumbnail Caption -->
								</article>
								<!-- End Gallery Image 4 -->

								<!-- Gallery Image 5 -->
								<article>
									<!-- Thumbnail Image -->
									<a href="images/gallery/fulls/05.jpg" class="image">

										<!-- End Linked Image -->
										<img src="images/gallery/thumbs/05.jpg" alt="" />
										<!-- End Linked Image -->

									</a>
									<!-- End Thumbnail Image -->

									<!-- Thumbnail Caption -->
									<div class="caption">
										<h3>
											<!-- Heading -->
											Magna etiam feugiat
											<!-- End Heading -->
										</h3>
										
										<p>
											<!-- Subheading -->
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											<!-- End Subheading -->
										</p>

										<ul class="actions fixed">
											<li><span class="button small">View</span></li>
										</ul>
									</div>
									<!-- Thumbnail Caption -->
								</article>
								<!-- End Gallery Image 5 -->

								<!-- Gallery Image 6 -->
								<article>
									<!-- Thumbnail Image -->
									<a href="images/gallery/fulls/06.jpg" class="image">

										<!-- End Linked Image -->
										<img src="images/gallery/thumbs/06.jpg" alt="" />
										<!-- End Linked Image -->

									</a>
									<!-- End Thumbnail Image -->

									<!-- Thumbnail Caption -->
									<div class="caption">
										<h3>
											<!-- Heading -->
											Magna etiam feugiat
											<!-- End Heading -->
										</h3>
										
										<p>
											<!-- Subheading -->
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											<!-- End Subheading -->
										</p>

										<ul class="actions fixed">
											<li><span class="button small">View</span></li>
										</ul>
									</div>
									<!-- Thumbnail Caption -->
								</article>
								<!-- End Gallery Image 6 -->

								<!-- Gallery Image 7 -->
								<article>
									<!-- Thumbnail Image -->
									<a href="images/gallery/fulls/07.jpg" class="image">

										<!-- End Linked Image -->
										<img src="images/gallery/thumbs/07.jpg" alt="" />
										<!-- End Linked Image -->

									</a>
									<!-- End Thumbnail Image -->

									<!-- Thumbnail Caption -->
									<div class="caption">
										<h3>
											<!-- Heading -->
											Magna etiam feugiat
											<!-- End Heading -->
										</h3>
										
										<p>
											<!-- Subheading -->
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											<!-- End Subheading -->
										</p>

										<ul class="actions fixed">
											<li><span class="button small">View</span></li>
										</ul>
									</div>
									<!-- Thumbnail Caption -->
								</article>
								<!-- End Gallery Image 7 -->

							</div>
						<!-- End Slideshow Gallery -->

					</section>
				<!-- ************** End Section Five ************** -->
			

				<!-- ************** Section Six - Contact Us ************** -->
					<section class="wrapper style1 align-center">
						<div class="inner medium">
							<h2>Get in touch</h2>
							<form method="post" name="contact_form.php" action="index.php">
								<div class="fields">
									<div class="field half">
										<label for="name">Name</label>
										<input type="text" name="name" id="name" value="" />
									</div>
									<div class="field half">
										<label for="email">Email</label>
										<input type="email" name="email" id="email" value="" />
									</div>
									<div class="field">
										<label for="message">Message</label>
										<textarea name="message" id="message" rows="6"></textarea>
									</div>
								</div>
								<ul class="actions special">
									<li><input class="primary" type="submit" name="submit" id="submit" value="Send Message" /></li>
								</ul>
							</form>

						</div>
					</section>
				<!-- ************** End Section Six - Contact Us ************** -->

				<!-- ************** Footer ************** -->
					<footer class="wrapper style1 align-center">
						<div class="inner">
							<ul class="icons">
								<li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon brands style2 fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
								<li><a href="#" class="icon style2 fa-envelope"><span class="label">Email</span></a></li>
							</ul>
							<p>&copy; First Capitol Restoration LLC</a>.</p>
						</div>
					</footer>
				<!-- ************** End Footer ************** -->

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

            <!-- Scripts -->
        <script language="JavaScript">
			

		</script>
	</body>
</html>



