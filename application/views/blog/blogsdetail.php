<script class="slick-cloned" type="text/javascript"></script>
<section id="viewcart" class="viewcart-page-content page-content" style="min-height: 625px !important;">
<section class="breadcrumnb">
        <div class="container">
            <ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="clearfix">
                <li itemprop="itemListElement" itemscope="" ><a href="<?= base_url()?>" itemprop="item"><span itemprop="name">Home</span></a></li>
                <li itemprop="itemListElement" itemscope=""><a href="<?= base_url()?>blogs" itemprop="item"><span itemprop="name">Blogs</span></li>
                <li itemprop="itemListElement" itemscope="" ><span><?= ucwords($blogs['title']) ?></span></li>
            </ol>
        </div>
    </section>
<?php {
 ?>
					<section class="products-section wow fadeInUp" >
						<div class="container">
                            <h1 class="page_heading"><a style="color: #502701;" href="#"><?= ucwords($blogs['title']) ?> </a></h1>
							<div class="row" style=" margin-left: 82px;">
								<div class="cal-md-12"> <img style="height: 500px; margin-top:5%" alt="<?= $blogs['title'] ?>" src="<?=  base_url() ?>admin/uploads/blogs/<?= $blogs['image'] ?>" class="img-responsive">
								</div>
							</div>
						</div>
							</section>

					<section class="products-section wow fadeInUp">
							<div class="container">
							    <div class="row">
							    	<div class="cal-md-12">
                                  
                                    <div class="price">
		                                  <span class="regular-price"><?= $blogs['description'] ?></span>
                                    </div>
                                </div>
                            </div>
						</div>
                </section>

<?php } ?>



<section class="category-footer">
<div class="container"><div style="text-align: center;"><br></div><img src="<?= base_url()?>assets/images/3dcart/footer-banner.jpg" alt="Footer Banner" style="max-width:100%;"> </div>
</section>

</section>

<script type="text/javascript">
    $(window).on('load',function()
    {
        $('#myModal').modal({
            backdrop:'static',
            keyboard:false
        });
    });
    $('#yes-button').on('click',function()
    {
        $('#myModal').modal('hide');
    });
    $('#no-button').on('click',function()
    {
        window.open('','_parent',''); 
     	close();
    });
</script>


