
<?php

include "config.php";

$webpage = "SELECT * FROM webpage";

$boxitems = "SELECT * FROM boxitems";

$galleryimages = "SELECT * FROM galleryimages WHERE active = 1";

$result1 = $conn->query($webpage);
$result2 = $conn->query($boxitems);
$result3 = $conn->query($galleryimages);

// Code to send emails //

$path = 'C:/Users/halford/Documents/Projects/Andrew/irstCapitolRestoration_Webpage' . $IDN . '/list.txt';
$contents = file_get_contents($path);
$lines = explode("\n", $contents);


$errors = '';
$myemail = 'hampalford@gmail.com';
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

$to = $myemail;

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

		
	</style>
	<body class="is-preload">
			<div id="wrapper" class="divided">
			<?php
    foreach ($lines as $line)
    {
?>
    <a>
        <!-- DIV inside A? Okay! -->
        <div id="conto">
            <?php echo trim($line); ?>
        </div>
    </a>
<?php
    }
?>

				<!-- ************** Banner ************** -->
				<section class="banner onload-image-fade-in onload-content-fade-right invert style5  image-position-center orient-left content-align-center" style="padding:2em 3em">
					<div class="content" >
						<img src="images/<?php echo $result1[0]['bannertext']; ?>" style="height:18em;width:18em;border-radius: 100%;" alt="">

				
						<p class="major">
							
							<?php echo $result1[0]['bannertext']; ?>
					
						</p>
						<ul class="actions stacked">
							<li><a href="#first" class="button primary large wide smooth-scroll-middle">Get In Touch</a></li>
						</ul>
					</div>
					<div class="image">
						<img src="images/banner-background.jpg" alt="">
					</div>
				</section>
				<!-- ************** End Banner ************** -->

					<!-- ************** Section One ************** -->
					<section class="wrapper style1 align-center">
						<div class="inner" style="width:75rem;">
							<!-- Heading Area -->

							<h2>
								<!-- Title -->
								Items
								<!-- End Title -->
							</h2>
							<p>
								<!-- Subtitle -->
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dui turpis, cursus eget orci amet aliquam congue semper. Etiam eget ultrices risus nec tempor elit.
								Lorem ipsum dolor sit amet, consectetur adipiscing elit.
								<!-- End Subtitle -->
							</p>

							<!-- End Heading Area -->

							<!-- Box Items Area -->

							<div class="items style1 small onscroll-fade-in">

								<!-- Box 1 -->
								<section>
									<span class="icon style2 major fa-gem"></span>
									<h3>
										<!-- Heading -->
										One
										<!-- End Heading -->
									</h3>
									<p>
										<!-- Subheading -->
										Lorem ipsum dolor sit amet, consectetur adipiscing elit
										<!-- End Subheading -->
									</p>
								</section>
								<!-- End Box 1 -->

								<!-- Box 2 -->
								<section>
									<span class="icon style2 major fa-gem"></span>
									<h3>
										<!-- Heading -->
										Two
										<!-- End Heading -->
									</h3>
									<p>
										<!-- Subheading -->
										Lorem ipsum dolor sit amet, consectetur adipiscing elit
										<!-- End Subheading -->
									</p>
								</section>
								<!-- End Box 2 -->

								<!-- Box 3 -->
								<section>
									<span class="icon style2 major fa-gem"></span>
									<h3>
										<!-- Heading -->
										Three
										<!-- End Heading -->
									</h3>
									<p>
										<!-- Subheading -->
										Lorem ipsum dolor sit amet, consectetur adipiscing elit
										<!-- End Subheading -->
									</p>
								</section>
								<!-- End Box 3 -->

								<!-- Box 4 -->
								<section>
									<span class="icon style2 major fa-gem"></span>
									<h3>
										<!-- Heading -->
										Four
										<!-- End Heading -->
									</h3>
									<p>
										<!-- Subheading -->
										Lorem ipsum dolor sit amet, consectetur adipiscing elit
										<!-- End Subheading -->
									</p>
								</section>
								<!-- End Box 4 -->
								
								
							</div>
						</div>
					</section>
				<!-- ************** End Section One ************** -->

				<!-- ************** Section Two ************** -->
					<section class="spotlight style1 orient-right content-align-left image-position-center onscroll-image-fade-in" id="first">
						<div class="content">
							
							<h2>
								<!-- Heading -->
								Magna etiam feugiat
								<!-- End Heading -->
							</h2>
							
							<p>
								<!-- Subheading -->
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id ante sed ex pharetra lacinia sit 
								amet vel massa. Donec facilisis laoreet nulla eu bibendum. Donec ut ex risus. Fusce lorem lectus,
								 pharetra pretium massa et, hendrerit vestibulum odio lorem ipsum dolor sit amet.
								<!-- End Subheading -->
							</p>
							
							<ul class="actions stacked">
								<li><a href="#contactform" class="button">Learn More</a></li>
							</ul>
						</div>

						<div class="image">

							<!-- Image -->
							<img src="images/work4.jpg" alt="" />

						</div>
					</section>
				<!-- ************** End Section Two ************** -->

				<!-- ************** Section Three ************** -->
					<section class="spotlight style1 orient-left content-align-left image-position-center onscroll-image-fade-in">
						<div class="content">
							
							<h2>
								<!-- Heading -->
								Magna etiam feugiat
								<!-- End Heading -->
							</h2>
							
							<p>
								<!-- Subheading -->
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id ante sed ex pharetra lacinia sit 
								amet vel massa. Donec facilisis laoreet nulla eu bibendum. Donec ut ex risus. Fusce lorem lectus,
								 pharetra pretium massa et, hendrerit vestibulum odio lorem ipsum dolor sit amet.
								<!-- End Subheading -->
							</p>
							
							<ul class="actions stacked">
							<li><a href="#contactform" class="button">Learn More</a></li>
							</ul>
						</div>
						<div class="image">

							<!-- Image -->
							<img src="images/work7.jpg" alt="" />

						</div>
					</section>
				<!-- ************** End Section Three ************** -->

				<!-- ************** Section Four ************** -->
					<section class="spotlight style1 orient-right content-align-left image-position-center onscroll-image-fade-in">
						<div class="content">
							
							<h2>
								<!-- Heading -->
								Magna etiam feugiat
								<!-- End Heading -->
							</h2>
							
							<p>
								<!-- Subheading -->
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id ante sed ex pharetra lacinia sit 
								amet vel massa. Donec facilisis laoreet nulla eu bibendum. Donec ut ex risus. Fusce lorem lectus,
								 pharetra pretium massa et, hendrerit vestibulum odio lorem ipsum dolor sit amet.
								<!-- End Subheading -->
							</p>
							
							<ul class="actions stacked">
							<li><a href="#contactform" class="button">Learn More</a></li>
							</ul>
						</div>
						<div class="image">

							<!-- Image -->
							<img src="images/work5.JPG" alt="" />

						</div>
					</section>
				<!-- ************** End Section Four ************** -->

				<!-- ************** Section Five ************** -->
					<section class="wrapper style1 align-center">

						<!-- Heading -->
						<div class="inner">
							<h2>
								<!-- Title -->
								Magna etiam feugiat
								<!-- End Title -->
							</h2>
							
							<p>
								<!-- Subtitle -->
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id ante sed ex pharetra lacinia sit 
								amet vel massa. Donec facilisis laoreet nulla eu bibendum. Donec ut ex risus. Fusce lorem lectus,
								 pharetra pretium massa et, hendrerit vestibulum odio lorem ipsum dolor sit amet.
								<!-- End Subtitle -->
							</p>					
						</div>
						<!-- End Heading -->

						<!-- Slideshow Gallery -->
							<div class="gallery style2 medium lightbox onscroll-fade-in">

								<!-- Gallery Image 1 -->
								<article>
									<!-- Thumbnail Image -->
									<a href="images/gallery/fulls/01.jpg" class="image">

										<!-- End Linked Image -->
										<img src="images/gallery/thumbs/01.jpg" alt="" />
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



