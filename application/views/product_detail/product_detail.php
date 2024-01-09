<section class="breadcrumnb">
	<div class="container">
		<ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="clearfix">
			<li itemprop="itemListElement" itemscope="" ><meta itemprop="position" content="1"><a href="<?= base_url()?>" itemprop="item"><span itemprop="name">Home</span></a></li>
			<li itemprop="itemListElement" itemscope="" ><meta itemprop="position" content="2"><a href="<?= base_url()?>brand/<?= $product_detail['brand_slug']  ?>" itemprop="item"><span itemprop="name"><?=  ucwords($product_detail['brand_name']) ?></span></a></li>
			<li itemprop="itemListElement" itemscope="" ><meta itemprop="position" content="10"><span itemprop="name"> <?= ucwords($product_detail['name']) ?></span></li>
		</ol>
	</div>
</section>

<!-- loader -->
<div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-body">
        	<div class="loader"></div>
    	</div>
    </div>
</div>
<!-- loader end -->

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
						<input type="hidden" name="id" id="m_id" >
						<input type="hidden" name="image" id="m_imageInput" >
						<input type="hidden" name="name" id="m_name" >
						<input type="hidden" name="price" id="m_price" >
						<input type="hidden" name="brand" id="m_brand" >
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
										<?php
											if($_COOKIE['no']=='0')
											{}
											elseif($_COOKIE['no']=='1')
											{
												echo "<button type='submit' id='Add' class='btn btn-default btn-inverse btn-addcart' ><i class='icon-basket'></i> Add to Cart</button>";
											}
										?> 
									</div>
								</div>
								<a class="btn btn-link qv-moredetails icon-search "id="slugg"   > More Details </a>
							</div>
						</div>
					</div>
       			</form>
      		</div>
    	</div>
	</div>
</div>
<!-- Product Modal End -->

<section id="listing" class="listing-page-content page-content" itemscope="" itemtype="http://schema.org/Product">
	<div class="container">
		<form enctype="multipart/form-data" method="post" action="<?= base_url() ?>addtocart" name="add" id="add">
			<input type="hidden" name="id" id="id" value="<?= $product_detail['id']?>">
			<input type="hidden" name="image" value="<?= $product_detail['image']?>">
			<input type="hidden" name="name" id="customPoints" value="<?= $product_detail['name']?>">
			<input type="hidden" name="size" id="size" value="">
			<input type="hidden" name="price" id="price" value="<?= $product_detail['price_cigar']?>">
			<input type="hidden" name="brand" id="brand" value="<?= $product_detail['brand_name']?>">
			<meta itemprop="brand" content="">
			<meta itemprop="mpn" content="">
			<div class="prev-next clearfix">
			</div>
			<div class="product-cols row">
				<div class="col-md-6">
					<div id="main-image" class="main-image text-center">
						<a href="<?= base_url() ?>admin/uploads/products/<?= $product_detail['image']?>" class="MagicZoomPlus" id="listing_main_image_link" data-options="zoomCaption: bottom;">
						<img style="width: 12%"alt="" src="<?= base_url() ?>admin/uploads/products/<?= $product_detail['image']?>" >
						</a>
						<div name="imagecaptiont" title="<?= $product_detail['name']?>" id="imagecaptiont" class="imagecaptiont"></div>
					</div>


					<div id="addl-images" class="addl-images addl-images-ready">
						<div class="flexslider">
							<ul class="slides">

							</ul>
						</div>
					</div>
					<div class="special-actions text-center">


					<!-- <span class="special-action addGiftRegistry">
					<button type="button" class="btn btn-link" onclick="javascript:add_giftregistry();"><i class="icon-gift"></i> Add to Gift Registry</button>
					</span>
					 -->

					<!-- <span class="special-action email_friend">
					<button type="button" class="btn btn-link" onclick="javascript:showRecFriend();"><i class="icon-paper-plane"></i> Email a friend</button>
					</span> -->
					<aside id="recommendafriend-modal" class="recommendafriend recommendafriend-modal modal text-left" tabindex="-1" role="dialog">
					<div class="modal-vcenter">
					<div class="modal-dialog" role="document">
					<div class="modal-content ajax-modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Email a Friend</h4>
					</div>
					<div class="modal-body">
					<p>Please complete the fields below to send your friend a link to this product. Your friend will receive an email from you with a link to our site.</p>
					<div class="row">
					<div class="col-md-6">
					<div class="form-group">
					<label for="visitorname" class="small-label">Your Name: <span class="required">*</span></label>
					<input type="text" class="form-control" id="visitorname" value="">
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
					<label for="visitormail" class="small-label">Your Email: <span class="required">*</span></label>
					<input type="text" class="form-control" id="visitormail" value="">
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
					<label for="friendname" class="small-label">Friend's Name: <span class="required">*</span></label>
					<input type="text" class="form-control" id="friendname" value="">
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
					<label for="friendmail" class="small-label">Friend's Email: <span class="required">*</span></label>
					<input type="text" class="form-control" id="friendmail" value="">
					</div>
					</div>
					<div class="col-md-12">
					<div class="form-group">
					<label for="message" class="small-label">Note to friend:: <span class="required">*</span></label>
					<textarea id="recommendafriend-message" rows="3" class="form-control"></textarea>
					</div>
					</div>

					<div class="col-md-6">
					<div class="form-group">



					<div id="recommendafriend-recaptchaRobot" class="recaptchaRobot" data-sitekey="6Lf9BBkUAAAAAJoQH1mGjLuPIra-ZcFwPoZfFtkJ" data-size="invisible" data-type="image" data-theme="light" data-callback="recommendaFriendRequest_invisible" data-widgetid="0"><div class="grecaptcha-badge" data-style="bottomright" style="width: 256px; height: 60px; display: block; transition: right 0.3s ease 0s; position: fixed; bottom: 14px; right: -186px; box-shadow: gray 0px 0px 5px;"><div class="grecaptcha-logo"><iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Lf9BBkUAAAAAJoQH1mGjLuPIra-ZcFwPoZfFtkJ&amp;co=ZmlsZTo.&amp;hl=en&amp;type=image&amp;v=xw1jR43fRSpRG88iDviKn3qM&amp;theme=light&amp;size=invisible&amp;cb=3258ybx3arw7" width="256" height="60" role="presentation" name="a-tpvux2338ypx" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><div class="grecaptcha-error"></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div></div>

					</div>
					</div>
					</div>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button id="recommendafriend_button" type="button" class="btn btn-default btn-inverse">Recommend!</button>
					</div>
					<div class="loading-overlay">
					<span class="modal-ajaxload icon-spin2 animate-spin"></span>
					</div>
					<div class="modal-response">
					<div class="modal-resout">
					<div class="modal-resin recommendafriend-item">
					<p>Thank you for recommending this product.</p>
					<div class="modal-resacts">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>
					</aside>


					</div>

					<div class="social-bookmarking">

					<script type="text/javascript" src="<?= base_url() ?>assets/s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5350364935e4f191"></script>
					<!-- <script type="text/javascript">
					  addthis.layers({
					    'theme' : 'transparent',
					    'share' : {
					      'position' : 'left',
					      'numPreferredServices' : 5
					    }   
					  });
					</script> -->
					</div>

					</div>
					<div class="col-md-6">
					<div class="product-details">


					<h1 itemprop="name" class="page_headers" style="font-weight: bold;"><?= ucwords($product_detail['name'])?></h1>
					<div class="product-reviews">





					<aside id="createreview-modal" class="createreview createreview-modal modal text-left" tabindex="-1" role="dialog">
					<div class="modal-vcenter">
					<div class="modal-dialog" role="document">
					<div class="modal-content ajax-modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Add Review</h4>
					</div>
					<div class="modal-body">
					<div class="row">
					<div class="col-md-12">
					<div class="form-group rating-label">
					<label for="" class="small-label">Your rating: <span class="required">*</span></label>
					</div>
					<span class="rating">
					<input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input" value="5">
					<label for="rating-input-1-5" class="rating-star"><i class="icon-star"></i></label>
					<input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input" value="4">
					<label for="rating-input-1-4" class="rating-star"><i class="icon-star"></i></label>
					<input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input" value="3">
					<label for="rating-input-1-3" class="rating-star"><i class="icon-star"></i></label>
					<input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input" value="2">
					<label for="rating-input-1-2" class="rating-star"><i class="icon-star"></i></label>
					<input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input" value="1">
					<label for="rating-input-1-1" class="rating-star"><i class="icon-star"></i></label>
					</span>
					</div>

					<div class="col-md-6">
					<div class="form-group">
					<label for="user_name" class="small-label">Name: <span class="required">*</span></label>
					<input type="text" class="form-control review-input" id="createreview-custName" name="createreview-custName" value="">
					</div>
					</div>


					<div class="col-md-6">
					<div class="form-group">
					<label for="createreview-custEmail" class="small-label">Email: <span class="required">*</span></label>
					<input type="text" class="form-control" id="createreview-custEmail" name="createreview-custEmail" value="">
					</div>
					</div>

					<div class="col-md-6">
					<div class="form-group">
					<label for="createreview-userCity" class="small-label">Location: <span class="required">*</span></label>
					<input type="text" class="form-control" id="createreview-userCity" name="createreview-userCity" value="">
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
					<label for="createreview-shorReview" class="small-label">Title: <span class="required">*</span></label>
					<input type="text" class="form-control" id="createreview-shorReview" name="createreview-shorReview" value="">
					</div>
					</div>
					<div class="col-md-12">
					<div class="form-group">
					<label for="createreview-longReview" class="small-label">Review: <span class="required">*</span></label>
					<textarea class="form-control" id="createreview-longReview" name="createreview-longReview" rows="3"></textarea>
					</div>
					</div>


					<div class="col-md-6">
					<div class="form-group">



					</div>
					</div>
					</div>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

					<button id="createreview_button" name="createreview_button" type="button" class="btn btn-default btn-inverse">Add Review</button>

					</div>
					<div class="loading-overlay">
					<span class="modal-ajaxload icon-spin2 animate-spin"></span>
					</div>
					<div class="modal-response">
					<div class="modal-resout">
					<div class="modal-resin review-item">
					<p>Thank you for submitting your review.</p>
					<div class="modal-resacts">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>
					</aside>

					</div>

					<div class="pricingBlock" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
					<meta itemprop="itemCondition" itemtype="http://schema.org/OfferItemCondition" content="http://schema.org/NewCondition">
					<meta itemprop="availability" content="InStock">
					<meta itemprop="priceCurrency" content="USD">
					<meta itemprop="url" itemtype="https://schema.org/url" content="http://cigar-venue-preview-com.3dcartstores.com/Nam-elit-agna-endrerit-_p_13.html">
					<meta itemprop="priceValidUntil" content="2050-12-31">


					<?php if(!empty($product_detail['price_cigar'])){ ?>
					<div class="yourprice price" style="margin-bottom:10px; font-weight: bold; font-size: 1.4em;">
					Price: 
					<span id="price" style="visibility: visible;"><?= $product_detail['price_cigar']?> Kr</span>
					<meta itemprop="price" content="100.00">
					</div>

					<?php } ?>

					<?php if(!empty($product_detail['price_package'])){ ?>
					<div class="yourprice price" style="margin-bottom:10px;">
					<strong>Per package:</strong>
					<span id="price" style="visibility: visible;"><?= $product_detail['price_package']?> Kr</span>
					<meta itemprop="price" content="100.00">
					</div>
					<?php } ?>


					</div>

					<!-- <div class="short-description" itemprop="description">Sample Product</div> -->

					<?php if(!empty($product_detail['type_name'])){ ?>
					<div class="product-id" style="margin-bottom:10px;"><strong>Package:</strong> <span id="product_id" itemprop="sku" style="visibility: visible;"> <?= ucwords($product_detail['type_name'])  ?></span></div>
					<?php } ?>

					<?php if(!empty($product_detail['brand_name'])){ ?>
					<div id="availabilityInfo" class="availabilityInfo">
					<span class="availability-header"><strong>Brand:</strong></span>

					<span id="availability" class="product_availability availability-item"> <?= ucwords($product_detail['brand_name']) ?></span>

					</div>
					<?php } ?>


					<div class="extrafieldsBlock">





					</div>



					<div id="divOptionsBlock" class="options sub-section">

					<!-- <div class="header">
					<h4 class="page_heading ">Choose Options</h4>
					</div> -->
					<div class="options-inner">

					<div class="opt-regular">

					<!-- <div class="opt-label">
					<label class="label">Color</label>

					<span class="required">*</span>


					</div>
					 -->

					<!-- <div class="opt-field">
					<div class="dropdownimage-format clearfix">
					<label class="pull-left dropdown-dd">
					<select name="option-di_14-13" onchange="validateValues(document.add,1);selectOption(this);" class="form-control customoption">

					<option value="58">Red </option>
					<option value="57">Purple </option>
					<option value="56">Green </option>

					</select>
					</label>
					<div class="dropdown-image pull-left"><img name="img_option-di_14-13" width="50" src="<?= base_url() ?>assets/images/default/red_umbrella.jpg"></div>
					</div>
					</div> -->
					</div>
					<!-- <input type="hidden" name="std_price" value="100.00">
					<input type="hidden" name="price_58" value="0">
					<input type="hidden" name="OptID_58" value="">
					<input type="hidden" name="image_58" value="assets/images/default/red_umbrella.jpg">
					<input type="hidden" name="required_field" value="option-di_14-13">
					<input type="hidden" name="price_57" value="0">
					<input type="hidden" name="OptID_57" value="">
					<input type="hidden" name="image_57" value="assets/images/default/purple_umbrella.jpg">
					<input type="hidden" name="price_56" value="0">
					<input type="hidden" name="OptID_56" value="">
					<input type="hidden" name="image_56" value="assets/images/default/green_umbrella.jpg"> -->
					<!-- <script type="text/javascript">var inventoryarray13= new Array();var idarray13= new Array();
					var aopricearray13= new Array();
					var gtinarray13 = new Array();
					</script> -->

					</div>

					</div>




					<div id="divWaitlist_AdvancedOptions" style="display:none;">
					<div class="waitinglist sub-section">
					<button id="waitinglist-btn" type="button" class="btn btn-default btn-inverse btn-addcart"><i class="icon-clipboard"></i> Put me on the Waiting List</button>
					</div>
					<aside id="waitinglist-modal" class="createreview createreview-modal modal text-left" tabindex="-1" role="dialog">
					<div class="modal-vcenter">
					<div class="modal-dialog" role="document">
					<div class="modal-content ajax-modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Put me on the waiting list</h4>
					</div>
					<div class="modal-body">
					<p>The item you are trying to purchase is currently out of stock.<br>Please enter your name, email, and phone number below.<br> We will contact you as soon as this product is available.</p>
					<div class="row">
					<div class="col-md-12">
					<div class="form-group">
					<label for="waitinglist-name" class="small-label">Name: <span class="required">*</span></label>
					<input type="text" class="form-control" id="waitinglist-name" value="">
					</div>
					</div>
					<div class="col-md-12">
					<div class="form-group">
					<label for="waitinglist-email" class="small-label">Email: <span class="required">*</span></label>
					<input type="text" class="form-control" id="waitinglist-email" value="">
					</div>
					</div>
					<div class="col-md-12">
					<div class="form-group">
					<label for="waitinglist-phone" class="small-label">Phone: <span class="required">*</span></label>
					 <input type="text" class="form-control" id="waitinglist-phone" value="">
					</div>
					</div>
					</div>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button id="waitinglist_button" type="button" class="btn btn-default btn-inverse">Submit</button>
					</div>
					<div class="loading-overlay">
					<span class="modal-ajaxload icon-spin2 animate-spin"></span>
					</div>
					<div class="modal-response">
					<div class="modal-resout">
					<div class="modal-resin review-item">
					<p id="waitinglist-response"></p>
					<div class="modal-resacts">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>
					</aside>
					</div>








					<div class="addToCartBlock sub-section">
					<div class="qtybox-addcart form-group">

					<label>Quantity</label>
					<label class="qty-input">
					<input id="qty-0" type="text" name="qty-0" value="1" class="form-control">
					<span class="qty-nav">
					<button type="button" class="qty-up " data-target="#qty-0">+</button>
					<button type="button" class="qty-down" data-target="#qty-0">-</button>
					</span>
					</label>

					<?php
					
					if($_COOKIE['no']=='0')
					{}
					elseif($_COOKIE['no']=='1')
					{
						echo "<button type='submit' id='Add' class='btn btn-default btn-inverse btn-addcart' ><i class='icon-basket'></i> Add to Cart</button>";
					}
					?>
					</div>
					</div>
					<div class="sub-section">

					</div>





					</div>
					</div>
					</div>

					<div id="rTabs" class="rTabs r-tabs">
<ul class="r-tabs-nav" style="border-bottom: 1px solid #c5b9b9;margin: 0; padding: 0;">

<li class="r-tabs-tab r-tabs-state-active"   style="background-color: #fff;margin-bottom: -1px;border-top: none;border-right: 1px solid #ececec; border-left: 1px solid #ececec;display: inline-block; margin: 0px;list-style: none; position: relative;
    top: 1px;
}">
	<a href="#tab-1" class="r-tabs-anchor" style="background: #000;margin-bottom: 1px;padding: 10px 15px;display: inline-block;text-decoration: none;color: #fff;font-weight: bold;color: #000;background-color: #fff;border-top: 1px solid #ececec;">Description</a></li>










</ul>
<div class="r-tabs-accordion-title r-tabs-state-active"><a href="#tab-1" class="r-tabs-anchor"></a></div>
<div id="tab-1" class="r-tabs-panel r-tabs-state-active" style="border-right: 1px solid #ececec;
    border-bottom: 1px solid #ececec;
    border-left: 1px solid #ececec;
    margin-bottom: 3px;
    min-height: 200px;
}">
<div class="item" itemprop="description" style="display: block;background: #fff;
    padding: 25px;">Features metal shaft and dark brown straight wooden handle. </div>
</div>










</div>

					<div class="relatedBlock sub-section">
					<div class="header">
					<h3 class="page_heading">Related Items</h3>
					</div>
					<div class="product-items product-items-4" data-itemsheight="498">

					<?php foreach ($relatedproducts as $key => $value) { ?>
					<div class="product-item animated fadeIn" data-catalogid="12" data-ajaxcart="1" data-addcart-callback="addcart_callback" data-animation="fadeIn" data-timeout="500" data-categoryid="0" style="height: 498px;">
						<div class="img">
						<a href="<?= base_url()?>product/<?= $value['product_slug']?>">
						<img src="<?= base_url() ?>admin/uploads/products/<?= $value['image']?>" alt="<?= ucwords($value['name'])?>" class="img-responsive">
						</a>
						<button type="button" class="btn btn-primary model_b" id="<?= $value['id']?>"  onclick="myFunction('<?= $value['id']?>','<?= $value['image']?>','<?=ucwords($value['name'])?>', '<?=$value['price_cigar']?>','<?=ucwords($value['brand_name'])?>','<?= $value['product_slug']?>')">View Product</button>
						</div>
						<div class="name">
						<a href="<?= base_url()?>product/<?= $value['product_slug']?>"> <?= ucwords($value['name'])?> </a>
						</div>
						
						<div class="price">

						<span class="regular-price"><?= $value['price_cigar']?> Kr</span>

						</div>
						<div class="status">

						<span class="availability"> <?= ucwords($value['brand_name']) ?></span>

						</div>

					<!-- 	<div class="action">
						<a href="Donec-eget-tellus-_p_12.html?quick=1&amp;item_id=12" class="add-to-cart btn btn-default">
						<span class="buyitlink-text">Select Options</span>
						<span class="ajaxcart-loader icon-spin2 animate-spin"></span>
						<span class="ajaxcart-added icon-ok"></span>
						</a>
						</div>
					 -->
					</div>

					<?php } ?>


					</div>
					</div>




					<!-- <div class="category_breadcrumbs sub-section">
					<div class="header">
					<h3 class="page_heading">Browse Similar Items</h3>
					</div>
					<ul class="clearfix list-unstyled">

					<li><a href="Cigar-Cutters_c_8.html">Cigar Cutters</a>&nbsp;&gt;&nbsp;<a href="Gold-Cutters_c_9.html">Gold Cutters</a></li>
					<li><a href="Cigar-Cutters_c_8.html">Cigar Cutters</a>&nbsp;&gt;&nbsp;<a href="Silver-Cutters_c_10.html">Silver Cutters</a></li>

					</ul>
					</div>
					 -->
</form>
</div>
</section>

<script>
	function myFunction(id,image, name, price, brand,slug)
	{
		$("#loadMe").modal("show");
		$('#m_brand').val(brand);
		$('#m_imageInput').val(image);
		$('#m_name').val(name);
		$('#m_price').val(price);
		$('#m_id').val(id);
		
		$('#image').attr("src",'<?=base_url()?>admin/uploads/products/'+image);
		$('#image').attr("alt",name);
		$('#c_name').html(name);
		$('#c_price').html(price);
		$('#c_brand').html(brand);
		$('#slugg').attr('href','<?= base_url()?>product/'+slug);
		
		setTimeout(function()
		{
			$("#loadMe").modal('hide');
			$("#ProductsModal").modal('show');
		}, 2000);
	}
</script>

<script>
	$(function ()
	{
		$('.qty-up').on('click',function()
		{
			var currentVal = parseInt($('#qty-0').val());
			if (!isNaN(currentVal))
			{
				$('#qty-0').val(currentVal + 1);
			}

		});

		$('.qty-down').on('click',function()
		{
			var currentVal = parseInt($('#qty-0').val());
			if (!isNaN(currentVal) && currentVal >1 )
			{
				$('#qty-0').val(currentVal - 1);
			}
		});
	});

	function decrement_quantity(cart_id)
	{
		var inputQuantityElement = $("#input-quantity-"+cart_id);
		if($(inputQuantityElement).val() > 1) 
		{
			var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
			save_to_db(cart_id, newQuantity);
		}
	}
</script>