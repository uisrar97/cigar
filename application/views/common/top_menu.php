
<section class="navbar-wrapper hidden-xs hidden-sm">
	<div class="container">
		<nav class="navbar navbar-inverse navbar-static-top">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul id="categories" class="nav navbar-nav">
					<li class="">
						<a href="<?= base_url() ?>">Home</a>
						<ul class="dropdown-menu"></ul>
					</li>
					<!-- <li class="">
						<a href="<?= base_url() ?>best-seller">Best Sellers</a>
						<ul class="dropdown-menu"></ul>
					</li> -->
					<li class="dropdown">
						<a href="<?= base_url() ?>brands" data-toggle="dropdown" class="dropbtn">Cigar Brands</a>
						<div class="dropdown-content" style="width:900px;">
							<div class="row">
					 			<?php 
					 				$x=0;
									foreach ($displaybrands as $brands) 

									{
		        						$x++;
		         				?>
										<div class="col-md-4"> 
											<a href="<?= base_url() ?>brand/<?= $brands['brand_slug'] ?>" class="subcat"><?= ucwords($brands['brand_name']) ?></a>
		        						</div>
		        		 				<?php
		        		 					if($x == 9)
		        		 					{
		        		 						break;
		        		 					}
		        					}
		        						?>
	        				</div>
							<div class="view-all-buttons" style="background-color: #974a02"> 
								<a href="<?= base_url() ?>brands">View All Brands</a>
							</div>
						</div>
					</li>
					<!-- <li class="">
						<a href="<?= base_url() ?>">Accessories</a>
						<ul class="dropdown-menu"></ul>
					</li>
					<li class="">
						<a href="<?= base_url() ?>">Humidors</a>
						<ul class="dropdown-menu"></ul>
					</li>
					<li class="">
						<a href="<?= base_url() ?>">Cigarillos/Small cigars </a>
						<ul class="dropdown-menu"></ul>
					</li>
					<li class="">
						<a href="<?= base_url() ?>">Offers</a>
						<ul class="dropdown-menu"></ul>
					</li> -->
					<li class="dropdown">
						<a href="<?= base_url() ?>cigars" data-toggle="dropdown" class="dropbtn">Cigars</a>
						<div class="dropdown-content" style="width:900px;">
							<div class="row">
					 			<?php 
					 				$x=0;
									foreach ($cigarnames as $cigars) 
									{
										
		        						$x++;
		         				?>
										<div class="col-md-4"> 
											<a href="<?= base_url()?>product/<?= $cigars['product_slug']?>" class="subcat"><?= ucwords($cigars['name']) ?></a>
		        						</div>
		        		 		<?php
		        		 				if($x == 9)
		        		 				{
		        		 					break;
		        		 				}
		        					}
		        				?>
	        				</div>
							<div class="view-all-buttons" style="background-color: #974a02"> 
								<a href="<?= base_url() ?>cigars">View All Cigars</a>
							</div>
						</div>
					</li>
					<!-- <li class="">
						<a href="<?= base_url() ?>blogs">Blogs</a>
						<ul class="dropdown-menu"></ul>
					</li> -->
				</ul>
			</div>
		</nav>
	</div>
</section>
	