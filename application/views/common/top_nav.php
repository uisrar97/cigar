<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<!-- <style>
.dropdown-toggle:hover{text-decoration: none; color: #502701;}
</style> -->

<section class="top-nav hidden-xs hidden-sm">
		<div class="container">
		<div class="row">
		<div class="col-sm-8">
		<div id="FRAME_MENU">
		<nav id="menulinks-outer" class="menulinks">

		<ul id="menulinks" class="clearfix">

		<!-- <li><a href="<?= base_url() ?>" class="menu" target="_self">Home</a></li> -->
		<li><a href="<?= base_url() ?>about-us" class="menu" target="_self">About Us</a></li>
		<!-- <li><a href="<?= base_url() ?>" class="menu" target="_self">Gift Registry</a></li> -->
		<li><a href="<?= base_url() ?>contact-us" class="menu" target="_self">Contact Us</a></li>
		<li><a href="<?= base_url() ?>blogs" class="menu" target="_self">Blog</a></li>

		</ul></nav>
		</div>
		</div>
		<div class="col-sm-4">
		<div class="useraccount clearfix">
		<ul class="clearfix">
               
		<?php
			if(empty($_SESSION['loggedin']))
			{
		?>
				<li><a href="<?= base_url() ?>userlogin" class="menu" target="_self">Sign In</a></li> 
				<li><a href="<?= base_url() ?>register" class="menu" target="_self">Register</a></li>
		<?php
			}
			else
			{
		?>
				<li class="dropdown w3-dropdown-click">
					<button class="btn dropdown-toggle" type="button" data-toggle="dropdown" style="margin-top:-7px; font-size: 12px; padding: 6px 10px; background-color: white;"><?php if(isset($_SESSION['first_name'])) echo $_SESSION['first_name'];?>
						<span class="caret"></span>
					</button>
						<ul class="dropdown-menu" style="min-width: 100px; padding: 10px;">
							<li style="border-right: none;"><a href="<?= base_url() ?>profile" class="menu" target="_self">Dashboard</a></li>
							<hr style="margin-bottom:0px;">
							<li><a href="<?= base_url() ?>logout" class="menu" target="_self">Logout</a></li>
						</ul>
				</li>
		<?php
			}
		?>
		</ul>
		</div>
		</div>


		<!-- <li><a href="<?= base_url() ?>"><span class="icon-login"></span>Login</a> or <a href="<?= base_url() ?>">Register</a></li> -->

		</ul>
		</div>
		</div>
		</div>
		</div>
	</section>
	<script>
		function myFunction1()
		{
			var x = document.getElementById("Demo");
			if (x.className.indexOf("w3-show") == -1)
			{
				x.className += " w3-show";
			}
			else
			{ 
				x.className = x.className.replace(" w3-show", "");
			}
		}
	</script>
	<script>
    $('.owl-carousel').owlCarousel({
  loop: true,
  margin:55,
  nav: true,
  navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 3
    },
    1000: {
      items: 3
    }
  }
})
</script> 