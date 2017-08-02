<?xml version = ″1.0″?>
<!DOCTYPE html PUBLIC ″-//w3c//DTD XHTML 1.1//EN″ “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns = ″http://www.w3.org/1999/xhtml″>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="resources/CCF.ico">
	<link href="materialize/css/materialize.css" rel="stylesheet">
	<script src="jquery-3.2.1.min.js"></script>
	<script src="materialize/js/materialize.js"></script>
	<script src="universal.js"></script>
	<link href="universal.css" rel="stylesheet">

	<!-- for alerts -->
	<script src="alerts/dist/sweetalert-dev.js"></script>
	<link rel="stylesheet" type="text/css" href="alerts/dist/sweetalert.css">
	<title>Christ's Commission Fellowship</title>

	<style>
		::selection {
			background-color: #16A5B8;
			color: #fff;
		}

		div {
			display: block;
			font-family: ;
		}

		.container {
			margin: 0 auto;
			max-width: 1280px;
			width: 80%;
		}

		#logo {
			margin-top: 10px;
		}

		/*
		colors in materliaze:
		#ee6e73
		colors for ccf:
		#16A5B8
		#777
		*/
		nav ul a:hover {
			background-color: transparent;
		}

		nav {
			position: fixed;
			top: 0;
			color: #777;
			background-color: #fff;
			width: 100%;
			height: 97px;
			line-height: 97px;
			z-index: 2;
			transition: background-color 0.3s, box-shadow 0.3s; /* for transition purposes */
		}

		 /*Note: for rectangle background in navbar same sa original site
		.nav-container-transition {
			padding: 0 40;
			background-color: rgba(233, 233, 233, 0.4);
			transition: all 0.3s;
		}*/

		.transition {
			background-color: transparent;
			box-shadow: none;
			transition: background-color 0.3s;
		}

		header a.transition {
			color: #fff;
			transition: color 0.3s;
		}

		header a.transition:hover {
			color: rgba(233, 233, 233, 0.7);
			transition: color 0.3s;
		}

		li a:hover {
			color: #16A5B8;
			transition: color 0.3s;
		}

		/* ===== FONTS =====*/
		@font-face {
			font-family: proxima-nova;
			src: url(ccf-fonts/proxima/PROXIMANOVA-BOLD.OTF);
			font-weight: bold;
		}

		@font-face {
			font-family: proxima-nova-extrabold;
			src: url(ccf-fonts/proxima/PROXIMANOVA-EXTRABOLD.OTF);
			font-weight: 800;
		}
		/* ===== END ===== */

		nav ul li a {
			font-family: proxima-nova;
			color: #777;
			font-size: 13px;
		}

		.cover, .cover span {
			margin-top: 120px;
			font-family: proxima-nova-extrabold;
			font-size: 5rem;
			font-weight: 800;
			line-height: 4rem;
			color: #fff;
		}

		.cover-content, .cover-content span {
			font-family: sans-serif;
			font-size: 1.4rem;
			color: #fff;
		}

		.parallax-container {
			height: 100%;
			/*background-color: rgba(216, 216, 216, 0.48); /* fading opacity filter effect*/
		}

		.parallax-container img {
			width: 100%;
		}
		/* ===== FOOTER ===== */
		.page-footer {
			background-color: #16A5B8;
		}

		p.footer-cpyrght {
			font-family: sans-serif;
			color: #fff;
		}
		/* ===== END ===== */

		/* ===== appearance class ===== */
		.hide {
			display: none;
		}

		.show {
			display: inline;
		}
		/* ===== END ===== */
	</style>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.parallax').parallax();
		});

		// navbar initial state
		$(document).ready(function() {
			$('nav').addClass('transition');
			//$('nav div.container').addClass('nav-container-transition'); // Note: for rectangle background in navbar same sa original site
			$('header a').addClass('transition');
			$('header ul').addClass('transition');
			/* code for hiding dropdown links 
			$('a.dropdown-button').hide();
			$('ul.dropdown-content').hide();
			$('.dropdown-button').dropdown('close');
			*/
			$('header > a').addClass('transition');
			$('nav a img').attr('src', "resources/CCF Logos8.png");
		});

		// navbar scroll state
		window.addEventListener("scroll", function() {
			if(window.scrollY > 10) {
				$('nav').removeClass('transition');
				//$('nav div.container').removeClass('nav-container-transition'); // Note: for rectangle background in navbar same sa original site
				$('header a').removeClass('transition');
				$('header ul').removeClass('transition');
				/* code for showing dropdown links
				$('a.dropdown-button').show(300);
				*/
				$('header > a').removeClass('transition');
				$('nav a img').attr('src', "resources/CCF Logos6.png");
			}
			else {
				$('nav').addClass('transition');
				//$('nav div.container').addClass('nav-container-transition'); // Note: for rectangle background in navbar same sa original site
				$('header a').addClass('transition');
				$('header ul').addClass('transition');
				/* code for hiding dropdown links 
				$('a.dropdown-button').hide();
				$('ul.dropdown-content').hide();
				$('.dropdown-button').dropdown('close');
				*/
				$('header > a').addClass('transition');
				$('nav a img').attr('src', "resources/CCF Logos8.png");
			}
		}, false);
	</script>

	<header class="top-nav">
		<nav style="margin-bottom: 50px;" class="transition">
			<div class="container nav-container-transition">
			    <div class="nav-wrapper">
			      	<a href="index.php" class="brand-logo"><img src="resources/CCF Logos8" id="logo"/></a>
			      	<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li><a href="events.php" class="transition">EVENTS</a></li>
						<li><a href="" class="transition">ABOUT US</a></li>
						<li><a href="login.php" class="transition">LOGIN</a></li>
			     	 </ul>
			    </div>
			</div>
		</nav>
	</header>

	<body>
		<div id="response"></div>
		<div class="parallax-container">
			<p class="cover center"> <!-- always enclose span tag -->
				<span>Y O U <br></span>
				<span>HAVE <br></span>
				<span>Y O U <br></span>
				<span>C A N <br></span>
				<br>
				<span>#GoServe</span>
				<p class="cover-content center">
					<span>Make the most out of every opportunity that the Lord gives you to volunteer where you can and while you can.</span>
				</p>
			</p>
			<div class="parallax">
				<img src="resources/GoServe2017_Background-04-1.jpg">
			</div>
		</div>
		<div class="section white">
			<div class="row container">
				<h2 class="header">Parallax</h2>
				<p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
			</div>
		</div>
	</body>

	<main>
	</main>

	<footer class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col 16 s8">
					<img src="resources/CCF Logos7.png" />
				</div>
				<div class="col 14 offset-12 s4">
					<p class="footer-cpyrght">
						Christ's Commission Fellowship © 2016 <br>
						All Rights Reserved.
					</p>
				</div>
			</div>
		</div>
	</footer>
	<script>
		// cover transition
		$(document).ready(function() {
			var cover = $(".parallax-container span");
			var ticker = 0;
			cover.hide();
			cover.each(function(i) { //3
				if(i%2==0) {
					ticker += 1000;
					$(this).delay(ticker).fadeIn(500); //1800
				}
				else {
					ticker += 400;
					$(this).delay(ticker).fadeIn(500); //1800
				}
			});
		});
	</script>
</html>