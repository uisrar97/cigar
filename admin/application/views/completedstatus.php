<script src="<?= base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/datatables/dataTables.bootstrap.js"></script>
<div class="content-page">   
    <div class="content">   
        <div class="container"> 
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 >
                                        <a href="<?php echo base_url() ?>completed_orders"><i class="fa fa-arrow-left"></i>Back</a>
                                        
                                    </h3>
                                    <h3 class="text-center"><strong>Cigar Order Summary</strong> 
                                     
                                        
                                    </h3>
                                    <div class="row">
                                        <div class="box-body">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Status</th>
                                                        <th>Order Date</th>
                                                        <th>Transaction ID</th>
                                                        <th>Tracking ID</th>
                                                    </tr>
                                                    <tr>
                                                            <td><?php echo $getorder['id'] ?></td>
                                                            <input type="hidden" id="id" name="id" value="<?php echo $getorder['id']; ?>">
                                                            <td>
                                                                <div class="col-md-6">
                                                                    <select class="form-control" onchange="changestatus()" id="order_status" name="order_status" >
                                                                        <option value="">Select Status</option>
                                                                        <option value="0">Pending</option>
                                                                        <option value="1">Completed</option>
                                                                        <option value="2">Cancelled</option>
                                                                      
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        <td><?php echo $getorder['date'] ?></td>
                                                        <td>61384698438</td>
                                                        <td>n/a</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th style="width: 200px;">Customer Name</th>
                                                            <td><?php echo ucwords($getorder['user_first_name']); echo " "; echo ucwords($getorder['user_last_name']);?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Customer Company</th>
                                                            <td><?php echo ucwords($getorder['company']) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Customer Email</th>
                                                            <td><?php echo $getorder['email'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Customer Phone</th>
                                                            <td><?php echo $getorder['shipping_phone'] ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th class="text-center">Billing Address</th>
                                                            <th class="text-center">Shipping Address</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table class="table table-bordered">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>Address</th>
                                                                            <td><?php echo ucwords($getorder['user_address']);?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>City</th>
                                                                            <td><?php echo ucwords($getorder['user_city']);?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>State</th>
                                                                            <td><?php echo ucwords($getorder['state']);?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Zip</th>
                                                                            <td><?php echo $getorder['user_zip_code'];?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Country</th>
                                                                            <td><?php echo ucwords($getorder['user_country']);?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td>
                                                                <table class="table table-bordered">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>Address</th>
                                                                            <td><?php echo ucwords($getorder['shipping_street_address']);?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>City</th>
                                                                            <td><?php echo ucwords($getorder['shipping_city']);?></td>
                                                                        </tr>
                                                                    <tr>
                                                                        <th>State</th>
                                                                        <td><?php echo ucwords($getorder['shipping_state']);?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Zip</th>
                                                                        <td><?php echo $getorder['shipping_zip'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Country</th>
                                                                        <td><?php echo ucwords($getorder['shipping_country']);?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
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
                                                    $gtotal=0;
                                                    foreach($getorder2 as $getorders2) 
                                                    {
                                                ?>
                                                <tr>
                                                    <td width="20%">
                                                        <img src="<?php echo base_url().'uploads/products/'.$getorders2['products_image']?>" style="width: 50%;"  width="80px" height="50px">
                                                    </td>
                                                    <td><?php echo ucwords($getorders2['products_name']);?></td>
                                                    <td><?php echo $getorders2['products_price'];?> Kr</td>
                                                    <td><?php echo $getorders2['products_quality'];?></td>
                                                    <td><?php echo ($getorders2['products_price']*$getorders2['products_quality']); 
                                                        $gtotal+= $getorders2['products_price']*$getorders2['products_quality'];
                                                    ?> Kr</td>
                                                </tr>
                                            </tbody>
                                            <?php 
                                                }
                                            ?>
                                        </table>
                                        <b><hr style="border: 1px solid;"></b>
                                        <table class="table table-condensed">
                                            <tbody>
                                                <tr>
                                                    <td class="highrow text-right"><strong>Subtotal</strong></td>
                                                    <td class="highrow text-center" style="width: 17%;"><?php echo $gtotal; ?> Kr</td>
                                                </tr>
                                                <tr>
                                                    <td class="emptyrow text-right"><strong>Shipping</strong></td>
                                                    <td class="emptyrow text-center"style="width: 17%;"><?php echo $getorder['shipping_cost'];?> Kr</td>
                                                </tr>
                                                <tr>
                                                    <td class="emptyrow text-right"><strong>Grand Total</strong></td>
                                                    <td class="emptyrow text-center"style="width: 17%;"><?php echo $getorder['order_total'];?> Kr</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- CUSTOM JS -->
<script type="text/javascript">
    $(document).ready(function() 
    {
        $('#datatable').dataTable();
       /* $("#status").change(function () 
        {
            alert("ygbnh");
            $.ajax(
            {
                type: "Post",
                url: "<?= base_url() ?>Welcome/updateorderstatus",  
                data: {
                    'id' : id,
                    'status':status
                },
                dataType: "text",
                success: function(response)
                {}
            });
        }*/
   
    });

     function changestatus() {
        var id=$('#id').val();
        var order_status=$('#order_status').val();
        $.ajax({
                type: "POST",
                url: "<?= base_url().'update_status'?>",  
                data: {
                    'id' : id,
                    'order_status':order_status
                },
                dataType: "text",
                success: function(response)
                {
                    var resp = jQuery.parseJSON(response);
                    if(resp.condition == 'success')
                    {
                        Swal.fire(
                            'Congratulations!',
                            'Order status Updated  Successfully',
                            'success'
                        )
                    }
                }
            });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>