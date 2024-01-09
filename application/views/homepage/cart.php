<!--loader-->
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
											<input id="qty-x" type="text" name="qty-0" value="1" class="form-control">
											<span class="qty-nav">
												<button type="button" class="qty-upx" data-target="#qty-x">+</button>
												<button type="button" class="qty-downx" data-target="#qty-x">-</button>
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

<section id="viewcart" class="viewcart-page-content page-content" style="min-height: 625px !important;">
    <section class="breadcrumnb">
        <div class="container">
            <ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="clearfix">
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="<?= base_url()?>" itemprop="item"><span itemprop="name">Home</span></a></li>
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><span itemprop="name">Shopping Cart</span></li>
            </ol>
        </div>
    </section>
    <section class="page_header">
        <div class="container">
            <h1 class="page_heading">Shopping Cart</h1>
        </div>
    </section>
    <section class="cart-details">
        <form action="<?= base_url() ?>updatecart" method="post" name="recalculate" id="recalculate" data-parsley-validate="">
            <div class="container">
                <div class="row">
                    <div class="cart-left col-lg-9 col-md-8">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (empty($cartdata))
                                    {
                                ?>
                                        <td class="col-sm-8 col-md-4" colspan="5" style="text-align: center;">
                                            <div class="media">
                                                <div class="continue-shopping"><strong>Cart is Empty!</strong>
                                                <!-- <a href="<?= base_url() ?>product"> Continue Shopping</a> -->
                                            </div>
                                        </td>
                                        <!-- </div> -->
                                <?php
                                    }
                                    else
                                    {
                                        foreach ($cartdata as $key => $value)
                                        {
                                ?>
                                            <tr>
                                                <td class="col-sm-8 col-md-4">
                                                    <div class="media">
                                                        <div class="thumbnail pull-left"  style="margin-right:31px;">
                                                            <img class="media-object" src="<?= base_url() ?>admin/uploads/products/<?= $value['image']?>" alt ="<?= $value['name'] ?>" style="height: 53px;margin: -12%;">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><?= $value['name'] ?></h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-1 col-md-1" style="text-align: center">
                                                    <label class="qty-input">
                                                        <input id="qtyItem_<?= $value['id'] ?>" type="text" data-id="<?= $value['id']?>" name="cart[<?= $key ?>][qty]" value="<?= $value['qty'] ?>" class="form-control qty">
                                                        <span class="qty-nav">
                                                            <button id="up_<?= $key ?> " type="button" class="qty-up" onclick="increment_quantity(<?= $value['id'] ?>)" data-target="#qty-0">+</button>
                                                            <button id="down_<?= $key ?>" type="button" class="qty-down" onclick="decrement_quantity(<?= $value['id'] ?>)" data-target="#qty-0">-</button>
                                                        </span>
                                                    </label>
                                                </td>
                                                <td id="price_<?= $value['id']?>" class="col-sm-1 col-md-1 text-center">
                                                    <strong><?= $value['price'] ?> Kr</strong>
                                                </td>
                                                <td id="subtotal_<?= $value['id']?>" class="col-sm-1 col-md-1 text-center">
                                                    <strong><?= $value['subtotal'] ?> Kr</strong>
                                                </td>
                                                <td class="actions col-sm-1 col-md-1">
                                                    <a href="<?= base_url('homepage/remove/'.$value['rowid']) ?>" class="on-default remove-row"><i class="fa fa-trash-o"></i><input class="btn-md btn-primary btn-checkout" type="button" value="Remove" style="float:right"></a>
                                                </td>
                                            </tr>
                                            <input type="hidden" name="cart[<?= $key ?>][rowid]" value="<?= $value['rowid'] ?>">
                                <?php 
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                        <?php
                            if (!empty($cartdata))
                            {
                        ?>
                                <div class="left-subtotal summary-totals">
                                    <input class="btn-lg btn-primary btn-checkout" type="submit" value="Update Cart" style="float:right">
                                    <span class="summary-totals-colors"> </span>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div id="cart-right" class="cart-right col-lg-3 col-md-4 "style="border:1px solid #dddddd;">
                        <div id="cart-box" class="cart-box ">
                            <div class="cart-box-sticky">
                                <div class="order-summary">
                                    <h4 style=" margin: 16px 42px 29px;text-transform: uppercase;font-weight: 600;line-height: 1;;">Order Summary</h4>
                                </div>
                                <div class="row subtotal-details carttotal-cols">
                                    <!-- <?php foreach ($cartdata as $key => $value) { ?>
                                    <div class="col-xs-6 carttotal-label">Subtotal</div>
                                    <div class="col-xs-6 carttotal-price">$<?= $total.'.00' ?></div>
                                    <?php } ?> -->
		                            <div class="col-xs-6 carttotal-label">Subtotal</div>
		                            <div class="col-xs-6 carttotal-price" style="margin-bottom:10px;"><?= $total.'.00' ?> Kr</div>
                                    <?php 
                                        if($total<800 && $total!=0)
                                        {
                                            $shipping=49.00;
                                        }
                                        else
                                        {
                                            $shipping=0.00;
                                        }
                                    ?>
                                    <div class="col-xs-6 carttotal-label">Shipping</div>
                                    <div class="col-xs-6 carttotal-price" style="margin-bottom:10px;"><?= $shipping ?>.00 Kr</div>
                                    <div class="col-xs-6 carttotal-label">Discount</div>
                                    <div class="col-xs-6 carttotal-price" style="margin-bottom:10px;">0.00 Kr</div>
                                </div>
                                <?php 
                                    $total+=$shipping;
                                ?>
                                <div class="row total-details carttotal-cols">
                                    <div class="col-xs-6 carttotal-label" style="text-transform: uppercase;font-weight: 600;">Total</div>
                                    <div class="col-xs-6 carttotal-price" style="text-transform: uppercase;font-weight: 600;"><?= $total.'.00' ?> Kr</div>
                                </div>
                                <?php 
                                    $cartdata['total']=$total;
                                    // print_r($cartdata);
                                    // exit;
                                ?>
                                <div class="checkout-btns">
                                    <?php
                                    //print_r($cartdata);
                                        if ($cartdata['total']==0)
                                        {}
                                        else
                                        {
                                            if(empty($_SESSION['loggedin']) && $cartdata['total']!=0)
                                            {
                                    ?>
                                                <a href="<?= base_url() ?>login" class="btn btn-primary btn-checkout" style="margin: 16px 42px 29px; ">Proceed to Checkout</a>
                                    <?php
                                            }
                                            else
                                            {
                                    ?>
                                                <a href="<?= base_url() ?>checkout" class="btn btn-primary btn-checkout" style="margin: 16px 42px 29px; ">Proceed to Checkout</a>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                            <!-- <div class="coupons-area cart-detail-item">
                                    <h4 class="module-expand" data-target="#apply-coupon">Apply Coupon</h4>
                                    <div id="apply-coupon" class="module-content">
                                        <div class="coupon-msg">If you have a promotion code enter it here.</div>
                                            <div class="apply-cupon clearfix">
                                                <input id="coupon_code" type="text" name="coupon_code" class="form-control" data-parsley-maxlength="50" data-parsley-errors-messages-disabled="">
                                                <button type="submit" class="btn btn-default">Apply</button>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div id="shipping" class="ShipQuote cart-detail-item">
                                            <h4 class="module-expand" data-target="#ShipQuote-module">Calculate Shipping</h4>
                                            <div id="ShipQuote-module" class="module-content">
                                                <div class="cdi-msg">Enter zip code to calculate shipping.</div>
                                                    <div class="zip-code clearfix">
                                                        <input type="text" name="shipping_zip" value="" class="form-control" id="calculate_shipping_zip">
                                                        <button type="button" class="btn btn-default" id="calculate_button_go">Calculate</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div> -->
                            <div class="continue-shopping"  style="margin: 0px 42px ; ">
                                <a href="<?= base_url() ?>product-list"><i class="icon-left" ></i > Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <section class="recommended">
        <div class="relatedBlock sub-section container">
            <div class="header">
                <h4 class="page_heading">Recommended Products</h4>
            </div>
		    <div class="product-items product-items-4" data-itemsheight="498">
                <?php
                    if(!empty($recommendedProducts))
                    {
                        foreach ($recommendedProducts as $key => $value)
                        {                    
                ?>
                        <div class="product-item animated fadeIn" data-catalogid="12" data-ajaxcart="1" data-addcart-callback="addcart_callback" data-animation="fadeIn" data-timeout="500" data-categoryid="0" style="height: 498px;">
                            <div class="img">
                                <a href="<?= base_url()?>product/<?= $value['product_slug']?>">
                                    <img src="<?= base_url() ?>admin/uploads/products/<?= $value['image']?>" alt="<?= $value['name']?> " class="img-responsive">
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
                            <!-- <div class="action">
                                <a href="Donec-eget-tellus-_p_12.html?quick=1&amp;item_id=12" class="add-to-cart btn btn-default">
                                    <span class="buyitlink-text">Select Options</span>
                                    <span class="ajaxcart-loader icon-spin2 animate-spin"></span>
                                    <span class="ajaxcart-added icon-ok"></span>
                                </a>
                            </div> -->
	                    </div>
                <?php
                        }
                    }
                    else
                    {
                ?>
                        <div class="media col-sm-8 col-md-4">
                            <div class="continue-shopping"><strong>Add a Product to Cart!</strong>
                                <!-- <a href="<?= base_url() ?>product"> Continue Shopping</a> -->
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>
	    </div>
    </section>
</section>

<script type="text/javascript">

    function myFunction(id,image, name, price, brand,slug)
    {
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
    

        setTimeout(function()
        {
            $("#loadMe").modal('hide');
            $("#ProductsModal").modal('show');
        }, 2000);
    }

    function increment_quantity(id)
    {
        var currentVal = parseInt($('#qtyItem_'+id).val());
        if (!isNaN(currentVal))
        {
            $('#qtyItem_'+id).val(currentVal + 1);
            $('#qItem_'+id).val(currentVal + 1);
        }
    }
    function decrement_quantity(id)
    {
        var currentVal = parseInt($('#qtyItem_'+id).val());
        if (!isNaN(currentVal) && currentVal >1 )
        {
            $('#qtyItem_'+id).val(currentVal - 1);
            $('#qItem_'+id).val(currentVal - 1);
        }
    }
    $(function ()
	{
		$('.qty-upx').on('click',function()
		{
			var currentVal = parseInt($('#qty-x').val());
			if (!isNaN(currentVal))
			{
				$('#qty-x').val(currentVal + 1);
			}

		});

		$('.qty-downx').on('click',function()
		{
			var currentVal = parseInt($('#qty-x').val());
			if (!isNaN(currentVal) && currentVal >1 )
			{
				$('#qty-x').val(currentVal - 1);
			}
		});
	});

// $(function () {
//     $('.qty-up').on('click',function(){
//         var currentVal = parseInt($('#qty-0_<?= $key?>').val());
//         if (!isNaN(currentVal)) {
//             $('#qty-0_<?= $key?>').val(currentVal + 1);
//         }
//        // var total = currentVal * (document).getElementById("price_<?= $value['id']?>").value();
//        // $('#subtotal_<?= $value['id']?>').html(total);
//     });

//      $('.qty-down').on('click',function(){
//         var currentVal = parseInt($('#qty-0_<?= $key?>').val());
//         if (!isNaN(currentVal) && currentVal >1 ) {
//             $('#qty-0_<?= $key?>').val(currentVal - 1);
//         }

//     });

// });

// $(function () {
//   $('.qty-up').on('click',function(){

// 		var id = $(".qty").attr("data-id");
//         var currentVal = parseInt($('#qtyItem_'+id).val());
//         if (!isNaN(currentVal)) {
//             $('#qtyItem_'+id).val(currentVal + 1);
//         }

//     });

//      $('.qty-down').on('click',function(){
//      	var id = $(".qty").attr("data-id");
//         var currentVal = parseInt($('#qtyItem_'+id).val());
//         if (!isNaN(currentVal) && currentVal >1 ) {
//               $('#qtyItem_'+id).val(currentVal - 1);
//         }

//     });

// });
</script>