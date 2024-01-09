
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


<section id="category" class="category-page-content page-content">
	<div class="container">
		<div class="row">
			<aside id="leftBar" class="col-md-3 hidden-sm hidden-xs">
				<?php
					$link = current_url();
					$cunrrent_url = explode('/',$link);
				?>
				<?php 
					function searchForId($id, $array)
					{
						foreach ($array as $key => $val)
						{
							if ($val['brand_slug'] === $id)
							{
			           			return $val['brand_slug'];
			       			}
			   			}
						return null;
					}
					if(isset($cunrrent_url[6]))
					{
						$brandslug = searchForId($cunrrent_url[6], $displaybrands);
					}
				?>

				<!-- <div id="modNewReleases" class="sidebar-widget">
					<h4 class="widget-header">New Releases</h4>
					<div class="widget-body">
					<div class="new-release-item new-releases-item-first product-item">
					<div class="row">
					<div class="col-xs-4">
					<div class="img"><a href=""><img src="<?= base_url() ?>assets/images/3dcart/thumbnails/img8_thumbnail.jpg" alt="Fusce euismod consequat ante" class="img-responsive"></a></div>
					</div>
					<div class="col-xs-8">
					<div class="info">
					<div class="name"><a href="" class="link">Fusce euismod consequat ante</a></div>

					<div class="price">
					<span class="regular-price">$100.00</span>
					</div>

					<div class="reviews">
					<span class="reviews-stars rating-0"></span> <span class="reviews-count">(0)</span>
					</div>

					</div>
					</div>
					</div>
					</div>

					<div class="new-release-item product-item">
					<div class="row">
					<div class="col-xs-4">
					<div class="img"><a href=""><img src="<?= base_url() ?>assets/images/3dcart/thumbnails/img7_thumbnail.jpg" alt="Sit voluptatem accusantium " class="img-responsive"></a></div>
					</div>
					<div class="col-xs-8">
					<div class="info">
					<div class="name"><a href="" class="link">Sit voluptatem accusantium </a></div>

					<div class="price">
					<span class="regular-price">$100.00</span>
					</div>

					<div class="reviews">
					<span class="reviews-stars rating-0"></span> <span class="reviews-count">(0)</span>
					</div>

					</div>
					</div>
					</div>
					</div>
					<div class="new-release-item product-item">
					<div class="row">
					<div class="col-xs-4">
					<div class="img"><a href=""><img src="<?= base_url() ?>assets/images/3dcart/thumbnails/img6_thumbnail.jpg" alt="Unde omnis iste natus" class="img-responsive"></a></div>
					</div>
					<div class="col-xs-8">
					<div class="info">
					<div class="name"><a href="" class="link">Unde omnis iste natus</a></div>

					<div class="price">
					<span class="regular-price">$100.00</span>
					</div>

					<div class="reviews">
					<span class="reviews-stars rating-0"></span> <span class="reviews-count">(0)</span>
					</div>

					</div>
					</div>
					</div>
					</div>
					</div>
				</div> -->
				<div id="brand" class="sidebar-widget">
					<h4 class="widget-header">Brands</h4>
					<div class="widget-body">
						<ul class="sidebarUL" style="list-style: none" class="" id="cigarcollections" name="brand_name">
							<?php 
								foreach ($displaybrands as $brands)
								{
							?>
									<li><a style="color: black" href="<?= base_url() ?>brands/<?= $brands['brand_slug'] ?>" class="subcat"><?php echo ucwords($brands['brand_name']) ?></a></li>
							<?php
								}
							?>
						</ul>
					</div>
				</div>

				<div id="modPrice" class="sidebar-widget">
					<h4 class="widget-header">Browse by Price</h4>
					<div class="widget-body">
						<ul class="sidebarUL">
							<!--style="<?= ($cunrrent_url[6] == '0-25' || $cunrrent_url[9] == '0-25' && isset($cunrrent_url[9]) ) ? 'color: red' : 'ammar'; ?>" -->
							<li onclick="browsebyeprice('0','25')" ><a>0 Kr - 24.99 Kr</a></li>
							<li onclick="browsebyeprice('25','50')"><a>25 Kr - 49.99 Kr</a></li>
							<li onclick="browsebyeprice('50','10000')"><a>Over 50 Kr</a></li>
						</ul>
					</div>
				</div>
			</aside>
			<div class="col-md-9 cat-items-grid">
				<section class="breadcrumnb">
					<ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="clearfix">
						<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><meta itemprop="position" content="1">
							<a href="<?= base_url()?>" itemprop="item"><span itemprop="name">Home</span></a>
						</li>
						<!-- <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><meta itemprop="position" content="1"><a href="#" itemprop="item"><span itemprop="name">Cigar Cutters</span></a></li>
						<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><meta itemprop="position" content="2"><a href="#" itemprop="item"><span itemprop="name">Gold Cutters</span></a>
						</li> -->
					</ol>
				</section>
				<section class="page_header">
					<h1 class="page_heading"> <?= $heading ?> </h1>
				</section>
				<section class="category-products">
					<form action="http://cigar-venue-preview-com.3dcartstores.com/view_category.asp?cat=9" method="post" name="frmsortby" id="frmsortby">
						<div class="row">
							<div class="col-sm-6">
								<h2 class="titles">Products [<?= $total_products ?>]</h2>
							</div>
							<div class="col-sm-6">
								<div class="sort-by">
									<span>Sort by:</span>
									<!-- <?= (isset($cunrrent_url[5]) && $cunrrent_url[5] == 'price' ) ?   'selected' : ''; ?> -->
									<select onchange="sorting()"  id="sortby" name="sortby">
										<option  value="0" >Default</option>
										<option data-value="price"  value="asc" <?= (isset($cunrrent_url[7]) && $cunrrent_url[7] == 'price' && $cunrrent_url[8] == 'asc' ) ? 'selected' : ''; ?> >Price: Low to High</option>
										<option data-value="price" <?= (isset($cunrrent_url[7]) && $cunrrent_url[7] == 'price' && $cunrrent_url[8] == 'desc' ) ? 'selected' : ''; ?> value="desc">Price: High to Low</option>
										<option data-value="name" <?= (isset($cunrrent_url[7]) && $cunrrent_url[7] == 'name' && $cunrrent_url[8] == 'asc' ) ? 'selected' : ''; ?> value="asc">Name(A-Z)</option>
										<option data-value="name" <?= (isset($cunrrent_url[7]) && $cunrrent_url[7] == 'name' && $cunrrent_url[8] == 'desc' ) ? 'selected' : ''; ?> value="desc">Name(Z-A)</option>
										<option data-value="date" <?= (isset($cunrrent_url[7]) && $cunrrent_url[7] == 'date' && $cunrrent_url[8] == 'desc' ) ? 'selected' : ''; ?> value="desc">Newest</option>
									</select>
								</div>
							</div>
						</div>
						<div class="category-actions clearfix">
							<div class="paging"></div>
						</div>
					</form>

					<div class="product-items product-items-4" id="productitems" data-itemsheight="498">
						<?php 
							foreach ($products as $key => $value)
							{
						?>
								<div class="product-item animated fadeIn" data-id="12" data-ajaxcart="1" data-addcart-callback="addcart_callback" data-animation="fadeIn" data-timeout="500" data-categoryid="9" style="height: 498px;">
									<div class="img">
										<a href="<?= base_url()?>product/<?= $value['product_slug']?>">
											<img src="<?= base_url() ?>admin/uploads/products/<?= $value['image']?>" alt="<?=ucwords($value['name'])?>" class="img-responsive">
										</a>
										<button type="button" style="left: 16%;" class="btn btn-primary model_b" id="<?= $value['id']?>"  onclick="myFunction('<?= $value['id']?>','<?= $value['image']?>','<?=ucwords($value['name'])?>', '<?=$value['price_cigar']?>','<?=ucwords($value['brand_name'])?>','<?= ucwords($value['product_slug'])?>')">View Product</button>
									</div>
									<div class="name">
										<a href="<?= base_url()?>product/<?= $value['product_slug']?>"> <?= ucwords($value['name'])?></a>
									</div>
									<div class="price">
										<span class="regular-price"><?= $value['price_cigar']?> Kr</span>
									</div>
									<div class="status">
										<span class="availability"><?= ucwords($value['brand_name']) ?></span>
									</div>
								</div>
						<?php  
							}
						?>
					</div>
					<!-- </div> -->
					<div class="bottom_breadcrumb">
						<div class="paging"></div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<input type="hidden" name="brand_id" value="<?= $brand_id?>" id="brand_id">
	<input type="hidden" value="<?= $total_products?>" id="total_products">
	<div class="loaderr" id="loadMee" style="display: none;"></div>
</section>

<script type="text/javascript">
	var allow_scroll = 'yes';
   	var last_id = 20;
	$(document).scroll(function()
	{
		var sheight = 88;
		var t_products = $('#total_products').val();
		//alert(t_products);
        // console.log($(document).scrollTop());
        //   console.log($(window).height());
        //  console.log($(document).height());
        if($(document).scrollTop() + $(window).height() >= $(document).height() - sheight)
		{
			
			if( t_products >= last_id)
			{
				if (allow_scroll == "yes")
				{
					$('#loadMee').show();
					allow_scroll = "no";
					loadmoredata();
				}
			}
			
        }
	});
   	function loadmoredata()
   	{
		var brand_id = $("#brand_id").val();

	   	$.ajax(
		{
			type: "POST",
			url: "<?= base_url() ?>brandcigars",  
			data:
			{
				'last_id':last_id,
				'brand_id':brand_id
			},
			cache: false,
			success: function(response)
			{
				var resp = jQuery.parseJSON(response);
				// console.log(resp.data);
			    if (resp.condition == 'success')
				{
					
					$("#loadMee").hide();
			    	allow_scroll = 'yes';
					last_id += 20;
					$('#productitems').append(resp.data.product_view);
				}
				// else if (resp.condition == 'complete')
				// {
				// 	$("#loadMee").modal("hide");
			    // 	allow_scroll = 'no';
				// }
				else
				{

					alert('something went wrong');
				}
			}
		});
	}
	
	function sorting()
	{
		var sortby = $("#sortby").find(':selected').data('value');
		var orderby = $('#sortby').val();
		location.assign("<?= base_url() ?><?= $cunrrent_url[4] ?>/sort-by/"+sortby+"/"+orderby);
	}
	// <?= (!empty($brandslug))?$brandslug.'/':'' ?>

	function browsebyeprice(start,end)
	{
		var pricelimit = [start, end]
		// var sortby = $("#sortby").find(':selected').data('value');
		// var orderby = $('#sortby').val();
		location.assign("<?= base_url() ?><?= (isset($cunrrent_url[4]))?$cunrrent_url[4].'/':'';?><?= (isset($cunrrent_url[5]) && $cunrrent_url[5] == 'sort-by')?$cunrrent_url[5].'/':'';?><?= (isset($cunrrent_url[6]) && ($cunrrent_url[6] == 'price' || $cunrrent_url[6] == 'name' || $cunrrent_url[6] == 'date' ))?$cunrrent_url[6].'/':'';?><?= (isset($cunrrent_url[7]))?$cunrrent_url[7].'/':'';?>"+start+'-'+end);
	}
</script>
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
		$('#image').attr("alt", name);
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