<section id="viewcart" class="viewcart-page-content page-content" style="min-height: 625px !important;">
					<section class="breadcrumnb">
					        <div class="container">
					            <ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="clearfix">
					                <li itemprop="itemListElement" itemscope="" ><a href="<?= base_url()?>" itemprop="item"><span itemprop="name">Home</span></a></li>
					                <li itemprop="itemListElement" itemscope=""> <span itemprop="name">Blogs</span></li>
					                  
					            </ol>
					        </div>
					    </section>
					    <section style="padding: none;" class="products-section wow fadeInUp">
					    	<div class="container" style="word-wrap: break-word;">
					    		
					    			<h1 class="page_heading" style="    margin-bottom: 4%;">Our Blogs</h1>
					    		<?php foreach ($blogs as $key => $value) {  ?>
					    			<div class="col-md-12" style="margin-bottom: 4%">
								<div class="col-md-4">
									<div class="img">
										<a href="<?=  base_url() ?>Homepage/blogdetail/<?= $value['title_slug']?>">
											<img style="width: 100%; height: 100%;" alt="<?= $value['title'] ?>" src="<?=  base_url() ?>admin/uploads/blogs/<?= $value['image'] ?>" class="img-responsive">
										</a>
								</div>
								</div>
								<div class="col-md-8">
									<div class="name">
									<b><h1 style="margin-bottom: 0%;"><?= ucwords($value['title']) ?> </h1></b></div>
									<div class="status" style="margin-bottom: 2%;">
										<span class="availability"> 
											<?php
							                    $date = $value['date'];
							                    $newDate = strtotime($date);
							                    $showDate = date('M d, Y', $newDate);
												echo $showDate;
										
											?>
										</span>
									</div>
									<div class="description">
										<span class="availability"> 
											<?= ucwords(word_limiter(strip_tags($value['description'], 'p'), 100))

											 ?>
										</span>
										<div class="post-readmore">
                                  <a href="<?=  base_url() ?>blog/<?= $value['title_slug']?>" class="btn btn-default">Read More</a>
                                     </div>
									</div>
								</div>
								<hr>
								
							</div>

							
							<?php } ?>

							</div>
					    </section>
  


                  			




							<section class="category-footer">
							<div class="container"><div style="text-align: center;"><br></div><img src="assets/images/3dcart/footer-banner.jpg" alt="Footer Banner" style="max-width:100%;"> </div>
							</section>

							</section>

							<script type="text/javascript">
							    $(window).on('load',function(){
							        $('#myModal').modal({
							            backdrop:'static',
							            keyboard:false
							        });
							    });
							    $('#yes-button').on('click',function(){
							        $('#myModal').modal('hide');
							    });
							    $('#no-button').on('click',function(){
							        window.open('','_parent',''); 
							     	close();
								});
							</script>


