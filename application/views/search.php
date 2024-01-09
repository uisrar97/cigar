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


<section style="padding: none;" class="products-section wow fadeInUp">
    <div class="container">
        <h2 class="page_heading mdi md-local-offer">Search Result for: '<?= $keyword?>'</h2>
        <div class="product-items product-items-4" >
            <!-- <script class="slick-cloned" type="text/javascript"></script> -->
            <?php 
            
            if(!empty($brands))
            {?>
                <h4 style="margin-left: 16px;"><strong>Brands</strong></h4>
                <?php foreach ($brands as $key => $value) 
                {?>
                    <div class="product-item animated fadeIn" data-catalogid="12" data-ajaxcart="1" data-addcart-callback="addcart_callback" data-animation="fadeIn" data-timeout="500" data-categoryid="0" >
                        <div class="img">
                            <a href="<?= base_url() ?>brand/<?= $value['brand_slug'] ?>" >
                                <img style="width: 100%; height: 100%;" alt="<?= $value['brand_name'] ?>" src="<?=  base_url() ?>admin/uploads/brand/<?= $value['brand_image'] ?>" class="img-responsive"></a>
                            </a>
                        </div>
                        <div class="name">
                            <a style="color: black" href="<?= base_url() ?>brand/<?= $value['brand_slug'] ?>" ><?= ucwords($value['brand_name']) ?> </a>
                        </div>
                    </div>
            <?php } 
            }?>
        </div>
        <br>
        <div class="product-items product-items-4" >
            <!-- <script class="slick-cloned" type="text/javascript"></script> -->
            <?php 
            if(!empty($products))
            {?>
                <h4 style="margin-left: 16px;"><strong>Products</strong></h4>
                <?php foreach ($products as $key => $value) 
                {?>
                    <div class="product-item animated fadeIn" data-catalogid="12" data-ajaxcart="1" data-addcart-callback="addcart_callback" data-animation="fadeIn" data-timeout="500" data-categoryid="0" >
                        <div class="img">
                            <a href="<?= base_url()?>product/<?= $value['product_slug']?>">
                                <img src="<?=  base_url() ?>admin/uploads/products/<?= $value['image'] ?>" alt="<?= ucwords($value['name']) ?>" class="img-responsive">
                            </a>
                            <button type="button" class="btn btn-primary model_b" id="<?= $value['id']?>"  onclick="myFunction('<?= $value['id']?>','<?= $value['image']?>','<?=ucwords($value['name'])?>', '<?=$value['price_cigar']?>','<?=ucwords($value['brand_name'])?>','<?= $value['product_slug']?>')">View Product</button>
                        </div>
                        <div class="name">
                            <a style="color: black" href="<?= base_url() ?>product/<?= $value['product_slug'] ?>" ><?= ucwords($value['name']) ?> </a>
                        </div>
                        <div class="price">
                            <span class="regular-price"><?= $value['price_cigar'].'.00' ?> Kr</span>
                        </div>
                        <div class="status">
                            <span class="availability"> <?= ucwords($value['brand_name'])  ?></span>
                        </div>
                    </div>
            <?php } 
            }?>
        </div>
    </div>
</section>
<section class="category-footer">
    <div class="container"><div style="text-align: center;"><br></div><img src="assets/images/3dcart/footer-banner.jpg" alt="" style="max-width:100%;"> </div>
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
		$('#c_price').html("$"+price);
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
</script>

<script type="text/javascript">
    $(window).on('load',function()
    {
        $('#myModal').modal
        ({
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