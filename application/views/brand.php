
                        <section style="padding: none;" class="products-section wow fadeInUp">
              <div class="container">

              <h1 class="page_heading mdi md-local-offer">All Brands</h1>

              <div class="product-items product-items-4" >

              <script class="slick-cloned" type="text/javascript"></script>
              <?php foreach ($brand as $key => $value) { 
                ?>
                <div class="product-item animated fadeIn" data-catalogid="12" data-ajaxcart="1" data-addcart-callback="addcart_callback" data-animation="fadeIn" data-timeout="500" data-categoryid="0" >
                <div class="img"><a href="<?=  base_url() ?>brand/<?= $value['id']?>">
               <a  href="<?= base_url() ?>brand/<?= $value['brand_slug'] ?>" > <img style="width: 100%; height: 100%;" alt ="<?= $value['brand_name'] ?>" src="<?=  base_url() ?>admin/uploads/brand/<?= $value['brand_image'] ?>" alt="<?= $value['brand_image'] ?>" class="img-responsive"></a>
                </a>
                  </div>
                  <div class="name">
                 <a style="color: black" href="<?= base_url() ?>brand/<?= $value['brand_slug'] ?>" ><?= ucwords($value['brand_name']) ?> </a>
                  </div>
                 <!--   <div class="reviews">
                  <span class="reviews-stars rating-0"></span> <span class="reviews-count">(0)</span>
                  </div> -->
                  
                  
                

                  <!-- <div>
                  <a href="<?= base_url()?>homepage/product_detail/<?= $value['product_slug']?>" class="add-to-cart btn btn-default">
                    <span class="buyitli">Select Options/span>
                    <span class="ajaxcart-loader icon-spin2 animate-spin"></span>
                    <span class="ajaxcart-added icon-ok"></span>
                  </a>
                  </div> -->
                </div>

              <?php } ?>



              </div>


              </div>
              </section>





              <section class="category-footer">
              <div class="container"><div style="text-align: center;"><br></div><img src="assets/images/3dcart/footer-banner.jpg" alt="footer-banner.jpg" style="max-width:100%;"> </div>
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


