
<style>  
div.bhoechie-tab-container{
  z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #ddd;
  margin-top: 20px;
  margin-left: 50px;
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
  color: #5A55A3;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{

}
div.bhoechie-tab-menu div.list-group>a.active:after{
  content: '';
  position: absolute;
  left: 100%;
  top: 50%;
  margin-top: -13px;
  border-left: 0;
  border-bottom: 13px solid transparent;
  border-top: 13px solid transparent;
  border-left: 10px solid #502701;
}

div.bhoechie-tab-content{
  background-color: #ffffff;
  /* border: 1px solid #eeeeee; */
  padding-left: 20px;
  padding-top: 10px;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}
</style>

<section style="padding: none;" class="products-section wow fadeInUp">


<div class="container">
    <div class="row">
        <h2 class="page_heading mdi md-local-offer"><?php if(isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) echo $_SESSION['first_name'].' '.$_SESSION['last_name'];?></h2>
         
            <div class="cal-md-12">
                      <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 >
                                        <a href="<?php echo base_url() ?>profile" style="color: #502701"><i class="fa fa-arrow-left" ></i>Back</a>
                                        
                                    </h3>
                                    <h3 class="text-center"><strong>Cigar Order Summary</strong> 
                                        
                                        
                                    </h3>
                                    <div class="row">
                                        <div class="box-body">
                                         
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Order Date</th>
                                                        <th>Transaction ID</th>
                                                        <th>Tracking ID</th>
                                                    </tr>
                                                    <tr>
                                                            <td><?php echo $displayorder2[0]['order_id'] ?></td>
                                                            
                                                            
                                                        <td><?php echo $displayorder2[0]['date'] ?></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                               
                                                   
                                                   
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <td><strong>Image</strong></td>
                                                    <td><strong>Item Name</strong></td>
                                                    <td><strong>Item Price</strong></td>
                                                    <td><strong>Item Quantity</strong></td>
                                                    <td><strong>Total</strong></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                   
                                                   foreach($displayorder2 as $getorders2) 
                                                   {
                                               ?>
                                                <tr>
                                                    <td width="20%">
                                                        <img src="<?php echo base_url().'admin/uploads/products/'.$getorders2['products_image']?>" alt="<?php echo $getorders2['products_name'];?>" style="width: 10%; height: 6%">
                                                    </td>
                                                    <td><?php echo ucwords($getorders2['products_name']);?></td>
                                                    <td><?php echo $getorders2['products_price'];?> Kr</td>
                                                    <td><?php echo $getorders2['products_quality'];?></td>
                                                    <td><?php echo ($getorders2['products_price']*$getorders2['products_quality']); 
                                                        
                                                    ?> Kr</td>
                                                </tr>
                                                <?php 
                                                }
                                            ?>
                                            </tbody>
                                            
                                        </table>
                                        <b><hr style="border: 1px solid;"></b>
                                        <table class="table table-condensed">
                                            <tbody>
                                                <tr>
                                                    <td class="highrow text-right"><strong>Subtotal</strong></td>
                                                    <td class="highrow text-center" style="width: 17%;"> <?php echo ($getorders2['products_price']*$getorders2['products_quality']);  ?> Kr</td>
                                                </tr>
                                                <tr>
                                                    <td class="emptyrow text-right"><strong>Shipping</strong></td>
                                                    <td class="emptyrow text-center"style="width: 17%;"><?php echo $getorders2['shipping_cost'];?> Kr</td>
                                                </tr>
                                                <tr>
                                                    <td class="emptyrow text-right"><strong>Grand Total</strong></td>
                                                    <td class="emptyrow text-center"style="width: 17%;"><?php echo $getorders2['order_total'];?> Kr</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
            </div>
						        
						    </div>
						  </div>
				
						</section>
						<script type="text/javascript">
						$(document).ready(function() {
						    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
						        e.preventDefault();
						        $(this).siblings('a.active').removeClass("active");
						        $(this).addClass("active");
						        var index = $(this).index();
						        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
						        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
						    });
						     $('#newpas, #confirmpassword').on('keyup', function () 
						        {
						            if ($('#newpas').val() == $('#confirmpassword').val())
						            {
						                $('#message').html('Matching').css('color', 'green');
						                $('.btn').attr("disabled", false);
						            }
						            else
						            {
						                $('#message').html('Not Matching').css('color', 'red');
						                $('.btn').attr("disabled", true);
						            }
						           
						        });
						});
						</script>
						