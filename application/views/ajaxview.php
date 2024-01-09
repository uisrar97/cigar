
<div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-body">
        	<div class="loader"></div>
    	</div>
    </div>
</div>

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
							<a class="btn btn-link qv-moredetails icon-search "id="slugg"   > More Details </a>
						</div>
					</div>
				</div>
       		</form>
      	</div>
    </div>
	</div>
</div>
<!-- Products Modal End -->


<?php foreach ($sorting as $key => $value) {


   ?>
<div class="product-item animated fadeIn" data-catalogid="12" data-ajaxcart="1" data-addcart-callback="addcart_callback" data-animation="fadeIn" data-timeout="500" data-categoryid="9" style="height: 499px;">
    <div class="img">
    <a href="http://demo.webmatech.com/cigar/homepage/product_detail/prensado-robusto">
    <img src="http://demo.webmatech.com/cigar/assets/images/3dcart/image.jpg" alt="<?= $value['name'] ?>" class="img-responsive">
    </a>

    <button class="quickview" data-toggle="modal">Quick View</button>

    </div>
    <div class="name">
    <a href="http://demo.webmatech.com/cigar/homepage/product_detail/prensado-robusto"> <?= ucwords($value['name']) ?></a>
    </div>
    </div>
    <div class="price">
    <span class="regular-price"><?= $value['price_cigar'] ?> Kr</span>
    </div>

 	<div class="status">
    	<span class="availability">Alec Bradley</span>
    </div> 



<?php } ?>
<script>
  function myFunction(id,image, name, price, brand,slug)
  	{
		$("#loadMe").modal("show");
		$('#brand').val(brand);
		$('#imageInput').val(image);
		$('#name').val(name);
		$('#price').val(price);
		$('#id').val(id);
		
		$('#image').attr("src", '<?=base_url()?>admin/uploads/products/'+image);
    	$('#image').attr("alt",name);
		$('#c_name').html(name);
		$('#c_price').html(price);
		$('#c_brand').html(brand);
    	$('#slugg').attr("href","<?= base_url()?>product/"+slug);

		setTimeout(function() 
		{
			$("#loadMe").modal('hide');
			$("#ProductsModal").modal('show');
		}, 2000);
	}

</script>