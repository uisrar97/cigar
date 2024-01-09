

<header class="site-header">
	
	<div class="container">
		<div class="row">
			<div class="col-xs-3 visible-xs visible-sm text-left head-mobile-nav">
				<a id="mobile-menu-trigger" href="<?= base_url() ?>">
					<span class="icon-menu"></span>
				</a>
			</div>
			<div class="col-sm-7 col-xs-7">
				<div class="logo" style="margin-left:75%; ">
					<a href="<?= base_url() ?>" title="Sample Store"><img src="<?php echo base_url('admin/uploads/settings/'. $getsettings['header_logo']);?>" alt="<?=$getsettings['header_logo']?>"></a>
				</div>
			</div>
			
			<div class="col-md-5 full-width">
				<ul class="utils hidden-xs hidden-sm">
					<li class="dropdown">
						<a href="<?= base_url() ?>cart" data-toggle="dropdown" class="dropbtn">
							<i class="icon-basket"></i><?= $counter ?> Item(s)
							
						</a>
						<div class="dropdown-content" style="">
							<div class="row">
								<div class="col-md-4"> 
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Product</th>
												<th>Quantity</th>
												<th class="text-center">Price</th>
												<th class="text-center">Total</th>
												<th class="text-center"></th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<form action="<?= base_url() ?>updatecart" method="post" name="recalculate" id="recalculate" data-parsley-validate="">
                						<tbody>
											<?php if (empty($cartdata)) 
											{ ?>
												<td class="col-sm-8 col-md-4" colspan="6" style="text-align:center;">
													<div class="media">
														<div class="continue-shopping"><strong>Cart is Empty!</strong></div>
														<!-- <a href="<?= base_url() ?>product"> Continue Shopping</a> -->
													</div>
												</td>
												<?php 
												}
												else
												{ ?>
													<?php foreach ($cartdata as $key => $value) 
													{ ?>
														<tr>
															<td >
																<div class="media">
																	<div class="thumbnail pull-left"  style="margin-right:10px;">
																		<img  alt ="<?= ucwords($value['name']) ?>" class="media-object" src="<?= base_url() ?>admin/uploads/products/<?= $value['image']?>" style="width: 50px; height: 50px;">
																	</div>
																	<br>
																	<div class="media-body pull-left">
																		<h4 class="media-heading"><?= ucwords($value['name']) ?></h4>
																	</div>
																</div>
															</td>
															<td class="col-sm-1 col-md-1" style="text-align: center">
																<label class="qty-input">
																	<input id="qItem_<?= $value['id'] ?>" type="text" data-id="<?= $value['id']?>" name="cart[<?= $key ?>][qty]" value="<?= $value['qty'] ?>" class="form-control qty">
																	<span class="qty-nav">
																		<button id="up_<?= $key ?> " type="button" class="qty-up" onclick="increment_quantity(<?= $value['id'] ?>)" data-target="#qty-0">+</button>
																		<button id="down_<?= $key ?>" type="button" class="qty-down" onclick="decrement_quantity(<?= $value['id'] ?>)" data-target="#qty-0">-</button>
																	</span>
																</label>
															</td>
															<td id="price_<?= $value['id']?>" class="col-sm-2 col-md-2 text-center">
																<strong><?= $value['price'] ?> Kr</strong>
															</td>
															<td id="subtotal_<?= $value['id']?>" class="col-sm-1 col-md-1 text-center" colspan="2">
																<strong ><?= $value['subtotal'] ?> Kr</strong>
															</td>
															<td class="actions col-sm-1 col-md-1">
																<a href="<?= base_url('homepage/remove/'.$value['rowid']) ?>" style="background-color: #502701; color: #FFFFFF; padding: 6px 8px;">Remove</a>
															</td>
														</tr>
														<input type="hidden" name="cart[<?= $key ?>][rowid]" value="<?= $value['rowid'] ?>">
													<?php 
													}
												}
												?>
										</tbody>
										<?php if (!empty($cartdata)) 
										{ ?>
										<tfoot>
											<td colspan="6" style="text-align:right;">
												<input class="btn-sm btn-primary btn-checkout" type="submit" value="Update Cart" style="float:right;">
											<td>
										</tfoot>
										<?php }?>
										</form>
            						</table>
								</div>
							</div>
						</div>
					</li>
				</ul>
				<div id="FRAME_SEARCH">
					<div id="searchBox" class="searchBox">
					<form method="POST" name="searchForm" action="<?= base_url() ?>searchresult">
						<div class="search-form">
							<input  type="text" id="searchlight" name="keyword" value="" placeholder="Search" class="search-text form-control" required>
							<div id="livesearch"></div>
							<button type="submit" style="top: -10px;" class="search-submit btn btn-default"><span class="icon-search"></span></button>
						</div>
						<!-- <div class="searchlight-balloon" style="position: absolute; z-index: 1005; top: 40px;  left: 0px;">
							<div class="searchlight-results-wrapper" id="list" style="height: 100%;"></div>
						</div> -->
						<ul id="list"></ul>
					</form>
					<!-- 	<form>
					<div class="form-group">
					<button class="btnformtophead"> <img src=""> </button>
						<input type="text"  class="form-control searchArea" id="srch" name="srch" placeholder="Search for Products" >
						<div class="livesearch searchArea" style="width: 100%;max-height: 240px;overflow-y: scroll;" >
							<span >
								<h3 style="pointer-events:none;">Brands</h3>
								<a  class="pull-left search-results" style="border-bottom: 1px solid #ddd;">Mehran</a>
							</span>
							<div class="clearfix"></div>
							<a > <h3 style="pointer-events:none;text-align: center;">View All</h3></a> 
							<a href="javascript:void(0)">No Record Found</a> 
						</div>
					</div>
					</form> -->
				</div>
				<?php 
				if (!empty($this->cart->contents())) 
				{ ?>
					<div id="floating-cart" class="floating-cart" style="display: block;">
						<a href="<?= base_url() ?>cart">
							<span class="icon-basket cart-icon"></span>
							<span class="cart-details">
								<span class="minicart-items"><?= $counter ?></span> Item(s)
							</span>
						</a>
					</div>
				<?php } ?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</header>

<script type="text/javascript">
	$(function () 
	{
	    var minlength = 3;
	    $("#searchlight").keyup(function ()
		{
			var that = this,
	        value = $(this).val();
	        if (value.length >= minlength ) 
			{
				searchRequest = $.ajax(
				{
	                type: "GET",
	               	url: "<?= base_url() ?>seacrhlist",  
	                data: 
					{
	                    'keyword' : value
	                },
	                dataType: "text",
                	success: function(response)
					{
						var resp = jQuery.parseJSON(response);
						if (resp.condition == 'success')
						{
							$('#list').html('');
							$('#list').append(resp.data.list_view);
						}
					}
	            });
	        }
	    });
	});
</script>

<script type="text/javascript">
	function increment_quantity(id) 
	{
		var currentVal = parseInt($('#qItem_'+id).val());
			if (!isNaN(currentVal)) 
			{
				$('#qtyItem_'+id).val(currentVal + 1);
				$('#qItem_'+id).val(currentVal + 1);
			}
	}
	function decrement_quantity(id) 
	{
		var currentVal = parseInt($('#qItem_'+id).val());
			if (!isNaN(currentVal) && currentVal >1 ) 
			{
				$('#qtyItem_'+id).val(currentVal - 1);
				$('#qItem_'+id).val(currentVal - 1);
			}
	}
</script>