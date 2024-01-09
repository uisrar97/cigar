<style type="text/css">
  
  .owl-nav {
  	 margin-top: -7%;
    position: absolute;
    top:200px;
    width: 100%;
}

.owl-nav .owl-prev {
    left:-70px !important;
    position: absolute;
    outline: none;
}

.owl-nav i {
     
  font-size: 14px;
    border: 1px solid #000;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    padding-top: 13px;
}

.owl-nav .owl-next {
    right:-70px !important;
    position: absolute;
    outline: none;
}
.flex-direction-nav{
	display: none;
    }
    .flexslider{
    	margin-left: -3.5%;
    }
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    

<?php
  if(empty($_SESSION['loggedin']))
  {
?>
<div class="modal-popagewrp">
  <div id="myModal" class="modal" role="dialog">
    <div class="modal-dialog"> 
      <!-- Modal content-->
      <div class="modal-content" style="text-align: center">
        <div class="modal-header">
          <h4 class="modal-title">MR ANDERSONS CIGAR</h4>
        </div>
        <div class="modal-body">
          <div class="modal-text-loading">
            <div class="headingtop-modal">WELCOME</div>
            <form>
            <div style="font-size: 20px"> <strong> Are you 18 year old? </strong> </div>
              <div class="form-popup-button" style="margin-top: 10px;">
                <input type="button" style="color: white;background-color: #502701;" value="Yes" class="popup-yes-button btn-lg" id="yes-button" onclick="show_cart()">
                <input type="button" style="color:white ;background-color: #502701;background-border: #502701;" value="No" class="popup-no-button btn-lg" id="no-button" onclick="hide_cart()">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  }
?>
<!--loader-->
<div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
  <div class="modal-dialog modal-sm" role="document">
   
      <div class="modal-body">
        <div class="loader"></div>
      </div>
    </div>
  </div>
</div>
<!--loader end-->
<!-- Products Modal -->
<div class="modal fade" id="ProductsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
   	<div class="modal-content">
   		<div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
     		</button>
   		</div>
			<div class="modal-body">
     		<form action="<?= base_url() ?>addtocart" method="POST">
       			<div class="hidden_values">
              <input type="hidden" name="id" id="id" >
              <input type="hidden" name="image" id="imageInput" >
              <input type="hidden" name="name" id="name" >
              <input type="hidden" name="price" id="price" >
              <input type="hidden" name="brand" id="brand" >
					  </div>
        		<div class="product-item animated fadeIn" style="display: inline;">
          		<div class="row">
            		<div class="img col-md-6" style="width: 40%; display: inline-block;" >
            			<img src="" id="image" alt="" class="img-responsive">
          			</div> 
           			<div class="col-md-6" style="display: inline-block; float: right; ">
            			<h3 id="c_name" class="wrape_name" style="word-wrap: normal;width : 80%;overflow:hidden;display:inline-block;text-overflow: ellipsis;white-space: nowrap;"></h3>
            			<div class="price">
            				<span class="regular-price">Price: <p id="c_price" style="display: inline;"></p>.00 Kr</span><br> 
								  </div>
								  <h5>Brand: <p id="c_brand" style="display: inline;"></p></h5><br>
            				<div class="addToCartBlock sub-section">
          						<div class="qtybox-addcart form-group">
									    	<label>Quantity</label>
                        <label class="qty-input">
                          <input id="qty-0" type="text" name="qty-0" value="1" class="form-control">
                          <span class="qty-nav">
                            <button type="button" class="qty-up " data-target="#qty-0">+</button>
                            <button type="button" class="qty-down" data-target="#qty-0">-</button>
                          </span>
                        </label></br><br>
										    <button type='submit' id='Add' class='btn btn-default btn-inverse btn-addcart' ><i class='icon-basket'></i> Add to Cart</button> 
									    </div>
								    </div>
								  <a class="btn btn-link qv-moredetails icon-search "id="slugg"> More Details </a>
							  </div>
						  </div>
					  </div>
       		</form>
      	</div>
    </div>
	</div>
</div>
<!-- Products Model End -->

<section id="home" class="home-page-content page-content ">
  <section class="homepage-slider  wow fadeInUp">
    <div class="container">
      <div class="homeCarousel fullwidth-slider flexslider" data-animation="fade" data-slideshowspeed="2000">
   
        <ul class="slides">
          <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;"><a href="#"><img src="<?php echo base_url('admin/uploads/'. $getslider['image']);?>" alt="<?php echo  $getslider['title'];?>" draggable="false"></a></li>
         
        </ul>
       
      </div>
    </div>
  </section>
  <section style="padding: none;" class="products-section wow fadeInUp">

    <div class="container">
      <h2 class="page_heading">Featured Products</h2>
     <div class="carousel-wrap" data-aos="slide-up">
          <div class="owl-carousel">
          <?php 
            foreach ($featuredProducts as $key => $value)
            { 
             ?>
                <div class="item">
              
   
                  <div style=" border: 1px solid #ececec; text-align: center "class="img latest-painting-image" >
                    <a href="<?= base_url()?>product/<?= $value['product_slug']?>">
                      <img style="width:23%; margin-left: 40%;  " src="<?=  base_url() ?>admin/uploads/products/<?= $value['image'] ?>" alt="<?= $value['name'] ?>" class="img-responsive">
                    </a>
                    <button type="button" class="btn btn-primary model_b" id="<?= $value['id']?>"  onclick="myFunction('<?= $value['id']?>','<?= $value['image']?>','<?=ucwords($value['name'])?>', '<?=$value['price_cigar']?>','<?=ucwords($value['brand_name'])?>','<?= $value['product_slug']?>')">View Product</button>
                  </div>
                  <div class="name" style=" text-align: center;    color: #502701;">
                    <a  style="  color: #502701;"href="<?= base_url()?>product/<?= $value['product_slug']?>"><?= ucwords($value['name']) ?> </a>
                  </div>
                  <!--  <div class="reviews">
                    <span class="reviews-stars rating-0"></span> <span class="reviews-count">(0)</span>
                  </div> -->
                  <div class="price" style=" text-align: center;   color: #276658; margin-top: 8%">
                    <span class="regular-price" style=" text-align: center"><b><?= $value['price_cigar'].'.00' ?> Kr</b></span>
                  </div>
                  <div class="status" style=" text-align: center;    color: #502701; margin-top: 2%">
                    <span class="availability" > <?= ucwords($value['brand_name'])  ?></span>
                  </div>
                  <!-- <div>
                    <a href="<?= base_url()?>homepage/product_detail/<?= $value['product_slug']?>" class="add-to-cart btn btn-default">
                      <span class="buyitli">Select Options</span>
                      <span class="ajaxcart-loader icon-spin2 animate-spin"></span>
                      <span class="ajaxcart-added icon-ok"></span>
                    </a>
                  </div> -->
               
              </div>
                <?php
             
            }?>
        </div>
       
    </div>
    </div>

  </section>
  <section class="products-section wow fadeInUp">
    <div class=" container">
       <h2 class="page_heading">About us</h2>
      <div class="row">
        <div class="col-md-6">
        <h1>Om Mr Andersons </h1><br>
          <p> Mr Andersons Cigars har en vision om att vara er lokala tobakshandlare på nätet
                Med den snabbaste servicen och personlig service.<br>

                Uppfödd i en krögarfamilj så har jag ett brinnande intresse och passion för
                allt som sätter lite guldkant på tillvaron. Och från god mat och ädla
                drycker så var det ett naturligt steg att intressera sig för cigarrens
                magiska värld. Resan som började för cirka 18 år sedan på ett företags
                event med en inte så magisk upplevelse på grund av okunskap har utvecklats
                till att bli ett brinnande intresse och en vilja att sprida kunskap
                Och glädje om cigarren.<br>

                Finns det något bättre än efter en lång arbetsvecka sjunka ner i sin
                favoritfåtölj, snoppa en cigarr, hälla upp ett glas av något mörkt
                vällagrat och bara sitta och beundra de dansande rökslöjorna och den
                marmorerade askpelaren som bara växer.
                <br><b>
                Välkommen till Mr Andersons Cigars</b></p>


      </div>
        <div class="col-md-6" style="margin-top: 27px;">
  <img src="<?=  base_url() ?>assets/images/cigar.jpg" alt="cigar.jpg" class="img-responsive">

        </div>

      
      </div>
    </div>
  </section>
  <section class="products-section wow fadeInUp">
    <div class="container">
      <h2 class="page_heading">Our Products</h2>
      <div class="product-items product-items-4" data-itemsheight="498">
      <script class="slick-cloned" type="text/javascript"></script>
      <?php 
        foreach ($ourProducts as $key => $value) 
        {  ?>
          <div class="product-item animated fadeIn" data-catalogid="12" data-ajaxcart="1" data-addcart-callback="addcart_callback" data-animation="fadeIn" data-timeout="500" data-categoryid="0" >
            <div class="img">
              <a href="<?= base_url()?>product/<?= $value['product_slug']?>">
                <img src="<?=  base_url() ?>admin/uploads/products/<?= $value['image'] ?>" alt="<?= $value['name'] ?>" class="img-responsive">
              </a>
              <button type="button" class="btn btn-primary model_b" id="<?= $value['id']?>"  onclick="myFunction('<?= $value['id']?>','<?= $value['image']?>','<?=ucwords($value['name'])?>', '<?=$value['price_cigar']?>','<?=ucwords($value['brand_name'])?>','<?= $value['product_slug']?>')">View Product</button>
            </div>
            <div class="name">
              <a href="<?= base_url()?>product/<?= $value['product_slug']?>"><?= ucwords($value['name']) ?> </a>
            </div>
            <!--  <div class="reviews">
            <span class="reviews-stars rating-0"></span> <span class="reviews-count">(0)</span>
            </div> -->
            <div class="price">
              <span class="regular-price"><?= $value['price_cigar'].'.00' ?> Kr</span>
            </div>
            <div class="status">
              <span class="availability"> <?= ucwords($value['brand_name'])  ?></span>
            </div>
            <!-- <div>
            <a href="<?= base_url()?>homepage/product_detail/<?= $value['product_slug']?>" class="add-to-cart btn btn-default">
              <span class="buyitli">Select Options</span>
              <span class="ajaxcart-loader icon-spin2 animate-spin"></span>
              <span class="ajaxcart-added icon-ok"></span>
            </a>
            </div> -->
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <section class="category-footer ">
    <div class="container" style="
    padding-bottom: 2%";><div style="text-align: center;margin-top: -3%"><br></div><img src="assets/images/3dcart/footer-banner.jpg" alt="footer-banner.jpg" style="max-width:100%;"> </div>
  </section>
</section>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

<script>
  function hide_cart()
  {
    document.cookie="no=0";
    //document.cookie="yes=0";
    document.getElementById('Add').style.visibility = 'hidden';
    $.ajax(
    {
      type: "POST",
      url: "<?= base_url().'destroy-cart'?>",
      success: function(response)
      {
        var con = jQuery.parseJSON(response);
        if(con.res=="no")
        {
          alert("Something Went Wrong.");
        }
      }
    });
  }
  function show_cart()
  {
    document.cookie="no=1";
    //document.cookie="yes=1";
  }
  function myFunction(id,image, name, price, brand,slug){
    $("#loadMe").modal("show");
    $('#brand').val(brand);
    $('#imageInput').val(image);
    $('#name').val(name);
    $('#price').val(price);
    $('#id').val(id);
  	 
    $('#image').attr("src",'<?=base_url()?>admin/uploads/products/'+image);
    $('#image').attr("alt",name);
    $('#c_name').html(name);
    $('#c_price').html(price);
    $('#c_brand').html(brand);
    $('#slugg').attr('href','<?= base_url()?>product/'+slug);

    

setTimeout(function() {
      $("#loadMe").modal('hide');
      $("#ProductsModal").modal('show');
    }, 2000);

  }

</script>

<script type="text/javascript">
  $(window).on('load',function()
  {
    // if(empty($.cookie('no')))
    // {
      $('#myModal').modal(
      {
        backdrop:'static',
        keyboard:false,
        show: true
      });
    // }
    
  });
  $('#yes-button').on('click',function()
  {
    $('#myModal').modal('hide');
  });
  $('#no-button').on('click',function()
  {
    // window.open('','_parent',''); 
    // close();
    $('#myModal').modal('hide');
  });
</script>

<script>

$(function () {
    $('.qty-up').on('click',function(){
        var currentVal = parseInt($('#qty-0').val());
        if (!isNaN(currentVal)) {
            $('#qty-0').val(currentVal + 1);
        }

    });

     $('.qty-down').on('click',function(){
        var currentVal = parseInt($('#qty-0').val());
        if (!isNaN(currentVal) && currentVal >1 ) {
            $('#qty-0').val(currentVal - 1);
        }

    });

});


// function decrement_quantity(cart_id) {
//     var inputQuantityElement = $("#input-quantity-"+cart_id);
//     if($(inputQuantityElement).val() > 1) 
//     {
//     var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
//     save_to_db(cart_id, newQuantity);
//     }
//}
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
      items: 4
    },
    1000: {
      items: 4
    }
  }
})
</script> 