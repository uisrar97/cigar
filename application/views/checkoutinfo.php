 
  <link href="<?php echo base_url() ?>admin/assets/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<!--   <link href="<?php echo base_url() ?>admin/assets/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() ?>admin/assets/css/material-design-iconic-font.min.css" rel="stylesheet"> -->
  <style type="text/css">
  	.wgr-icon {
    display: inline-block;
    height: 55px;
    width: 55px;
    margin-top: 8px;
    margin-bottom: 8px;
    margin-right: 15px;
    border-radius: 50%;
    background: #fff;
    -webkit-box-shadow: 0 1px 3px rgba(0,0,0,.25);
    box-shadow: 0 1px 3px rgba(0,0,0,.25);
    text-align: center;
    line-height: 55px;
}
  </style>

        <div class="container">
         <div class="row">
            <div class="col-md-6"  >
                <div style="padding: 3%;background-color: lightgray;">
                <div class="page area-container" style="" >
             <div class="scrollbox-content">
                <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Order Summery</h1>
                <?php foreach ($cartdata as $key => $value) { ?>
                         <div class="row cart-items">
                           <div class="main">
                             <div class="col-sm-2 col-xs-3 vcenter">
                                <div class="product-image">
                                <a href=""><img alt="<?= $value['name']  ?>" src="<?= base_url() ?>admin/uploads/products/<?= $value['image']  ?>"  style="width: 12%"id="tl"></a>
                             </div>
                            </div>
                    <div class="col-sm-8 col-xs-6 vcenter">
                        <div class="product-name">
                            <span><b><?= $value['name']  ?></b></span>
                                 <div class="base-price"><?=  $value['price'].'.00'   ?> Kr</div>
                                </div>
                            </div>
                        <div class="col-sm-2 col-xs-3 vcenter">
                            <div class="product-info text-right"><?=  $value['subtotal'].'.00'  ?> Kr</div>
                         </div>
                        <div class="clearfix"></div>
                     </div>
                </div>
                <hr>
                        <?php } ?>
         <div id="total_div">
           <div class="row cart-tally">
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
         <div class="col-xs-6 carttotal-price" style="text-align:right;  margin-bottom:10px;"><?= $shipping ?>.00 Kr</div>

                        </div>
                    </div>
                        <?php if (!empty($cartdata)) { ?>
                    <div class="row cart-grandtotal">
                        <div class="clearfix total_div remaining-balance">
                           <div class="total_cart-total col-xs-6">Total</div>
                              <div class="total_total col-xs-6 text-right total_due_amount"><?= $total.'.00' ?> Kr</div>

                        </div>
                        <div style="margin-top: 7%;">
                        </div>
                        </div>
                        <?php } else { ?>
                        <div class="row cart-grandtotal">
                            <div class="total_cart-total col-xs-6">Cart is Empty</div>
                        </div>
                        <?php } ?>

                        </div>
                        </div>

</div>

      
            <div class="header" >
                <h4 class="page_heading" style="    margin-top: 10%">Recommended Products</h4>
            </div>
          <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th class="text-center">Price</th>
                            
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                <?php
                    if(!empty($recommendedProducts))
                    {
                        foreach ($recommendedProducts as $key => $value)
                        {          
                ?>

                      <tbody>
                        <form action="<?= base_url() ?>addtocart" method="POST">
                                    <input type="hidden" name="id" id="id" value="<?= $value['id']?>" >
                                  <input type="hidden" name="image" id="imageInput" value="<?= $value['image']?>" >
                                  <input type="hidden" name="name" id="name"  value="<?= $value['name']?>">
                                  <input type="hidden" name="price" id="price" value="<?= $value['price_cigar']?>" >
                                  <input type="hidden" name="brand" id="brand" value="<?= $value['brand_name']?>" >
                                     <input id="" type="hidden" name="qty-0" value="1" class="form-control">
                                              
                          <tr>
                                                <td class="col-sm-3 col-md-3">
                                                    <div class="media">
                                                        <div class="thumbnail pull-left"  style="margin-right:31%;">
                                                            <img class="media-object" src="<?= base_url() ?>admin/uploads/products/<?= $value['image']?>"alt="$value['name']" style="height: 53px;margin: -12%;">
                                                        </div>
                                                        
                                                    </div>
                                                </td>
                                                <td class="col-sm-3 col-md-3" >
                                                  <div class="media-body">
                                                           <b> <p class="media-heading"style="font-size: 85%;"><?= ucwords($value['name'])?></p></b>
                                                        </div>
                                                </td>
                                                <td  class="col-sm-3 col-md-3 text-center">
                                                    <strong><?= $value['price_cigar'] ?> Kr</strong>
                                                </td>
                                                <td  class="col-sm-3 col-md-3 text-center">
                                                     <button type='submit' id='Add' class='btn btn-default btn-inverse btn-addcart' ><i class='icon-basket'></i> Add to Cart</button>
                                                     
                                                </td>
                                            </tr>
                                        </form>
                      </tbody>
                  
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
                </table><hr>
            </div>



      
        <div class="col-md-6"  >

        <!-- <form class="form-signin"> -->
        <?php
			if(empty($_SESSION['loggedin']))
			{
		?>
                <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
            
                <input type="text" id="inputEmail" name="email" class="form-control" placeholder="Email or Username" required autofocus="">
                <input type="password" name="password" id="loginpassword" class="form-control" placeholder="Password" required>
                
                <button class="btn btn-block" type="submit" style="color: #ffffff; background-color: #502701; border-color: #502701;" onclick="view_message()"><i class="fas fa-sign-in-alt"></i> Sign in</button>
                 <hr>
              <a href="<?= base_url() ?>guest-checkout"Style="color: #502701;    margin-left: 41%;">Proceed As Guest</a>
               
        <?php
            }
        ?>
           
            <!-- </form> -->

            </div>
        </div>
          </div>
           <div class="container">
         <div class="row">

      <div class="col-md-12" style="background: lightgray;">
    
       
</div>

        </div>
       </div>
       <div class="container">
         <div class="row">
           <div calss="col-md-12">

		    <table border="0" cellpadding="0" cellspacing="0">
		    	<tbody>
		    		<div class="col-md-3" >
		    		<tr>
		    			<td>
		    				<i class="wgr-icon fa fa-truck" style="color:rgb(85, 85, 85);font-size:30px;"></i>
		    			</td>
		    			<td>
		    				<h4>
		    						<font style="vertical-align: inherit;">Free shipping</font>
		    			</h4>
		    				<p>
		    					
		    						<font style="vertical-align: inherit;">Valid for all orders over SEK 749.</font>
		    				
		    				</p>
		    			</td>
		    		
		    	</div>
		    	<div class="col-md-3" >
		    		
		    			<td>
		    				<i class="wgr-icon fa fa-clock-o" style="color:rgb(85, 85, 85);font-size:30px;"></i>
		    			</td>
		    			<td>
		    				<h4>
		    					
		    						<font style="vertical-align: inherit;">Fast deliveries</font>
		    					
		    				</h4>
		    				<p>
		    					
		    						<font style="vertical-align: inherit;">The order will be shipped within 24h (Mon-Thu)</font>
		    					
		    				</p>
		    			</td>
		    		
		    	</div>
		    	<div class="col-md-3" >
		    		
		    			<td>
		    				<i class="wgr-icon fa fa-undo" style="color:rgb(85, 85, 85);font-size:30px;"></i>
		    			</td>
		    			<td>
		    				<h4>
		    					
		    						<font style="vertical-align: inherit;">Secure purchase</font>
		    					
		    				</h5>
		    				<p>
		    					
		    						<font style="vertical-align: inherit;">We do not hesitate about returns or complaints.</font>
		    					
		    				</p>
		    			</td>
		    		
		    	</div>
		    	<div class="col-md-3" >
		    		
		    			<td>
		    				<i class="wgr-icon fa fa-exclamation-triangle" style="color:rgb(85, 85, 85);font-size:30px;"></i>
		    			</td>
		    			<td>
		    				<h4>
		    					<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Age limit 18 years</font>
		    				</font>
		    			</h4>
		    			<p>
		    				
		    					<font style="vertical-align: inherit;">18-year limit for shopping in our store</font>
		    				</font>
		    			</p>
		    		</td>
		    	</tr>
		    </div>
		     </tbody>
		 </table>
		   </div>
    </div>
</div>
    <script>
	function view_message()
    {
		var email = $('#inputEmail').val();
		var pass = $('#loginpassword').val();
		// alert(email);
		// alert(pass);
        $.ajax(
        {
            type: "POST",
            url: "<?= base_url().'validate'?>",  
            data: {
                'email' : email,
				'password' : pass
            },
            success: function(response)
            {
                var con = jQuery.parseJSON(response);
                   
                if(con.res=="yes")
                {
                    location.href='<?= base_url()."checkout"?>';
                }
                else
                {
                    alert("Wrong Email or Password.");
                }
            }
        });
    }
</script>
