<div class="content-page">    
    <div class="content">    
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Edit Product</h3></div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" accept-charset="utf-8" role="form" action="<?php echo base_url('updateproduct/'.$getproduct['id']); ?>" method="POST">
                                    <div class="col-md-6">
                                        <label for="exampleInputBrand1">Brand Name: </label>
                                        <select class="form-control" id="exampleInputBrand1" name="brandid" >
                                            <?php 
                                            foreach ($brands as $value) {
                                             ?>
                                            <option value="<?php echo $value['id'] ?>" <?php if ($value['id'] == $getproduct['brand_id']) : ?> selected<?php endif; ?>><?php echo ucwords($value['brand_name']) ?></option>
                                          <?php
                                      }
                                      ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="exampleInputType1">Package Type: </label>
                                        <select class="form-control" id="exampleInputType1" name="packagetype">
                                            <?php 
                                            foreach ($package as $pt) {
                                             ?>
                                            <option value="<?php echo $pt['id'] ?>" <?php if ($pt['id'] == $getproduct['package_type_id']) : ?> selected<?php endif; ?>><?php echo ucwords($pt['type_name']) ?></option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputProductName1">Product Name: </label>
                                        <input type="text" name="name" class="form-control" id="exampleInputProductName1" placeholder="Product Name" value="<?php echo ucwords($getproduct['name']) ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputPricePerPackage1">Price per Package: </label>
                                        <input type="text" name="price_package" class="form-control" id="exampleInputPricePerPackage1" placeholder="Price Per Package" value="<?php echo $getproduct['price_package'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputPricePerCigar1">Price per Cigar: </label>
                                        <input type="text" name="price_cigar" class="form-control" id="exampleInputPricePerCigar1" placeholder="Price Per Cigar" value="<?php echo $getproduct['price_cigar'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputNumberOfPackaging1">Number of Packaging: </label>
                                        <input type="text" name="number_of_packaging" class="form-control" id="exampleInputNumberOfPackaging1" placeholder="Number of Packaging" value="<?php echo $getproduct['number_of_packaging'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputQuantityOrdered1">Quantity Ordered: </label>
                                        <input type="text" name="quantity_ordered" class="form-control" id="exampleInputQuantityOrdered1" placeholder="Quantity Ordered" value="<?php echo $getproduct['quantity_ordered'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputOrderValue1">Order Value: </label>
                                        <input type="text" name="order_value" class="form-control" id="exampleInputOrderValue1" placeholder="Order Value" value="<?php echo $getproduct['order_value'] ?>">
                                    </div>
                                    <div class="col-md-3">
                                       <label for="productimage">
                                            Image
                                        </label>
                                        <input class="form-control" id="productimage" type="file" name="image" >
                                    </div>
                                    <div class="col-md-3" style="top:10px">
                                        <img style="height: 70px" id="image" src="<?php echo base_url('uploads/products/'. $getproduct['image']);?>">
                                    </div>
                                            <script type="text/javascript">
                                            function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                                reader.onload = function (e) {
                                                    $('#image').attr('src', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                            }
                                            $("#productimage").change(function () {
                                                readURL(this);
                                            });
                                            </script>
                                        
                                    <input type="hidden" name="id" value="<?php echo $getproduct['id'] ?>">
                                    </div>
                            
                                    
                                    <div class="clearfix"></div>
                                    <div class="checkbox checkbox-primary checkbox-circle " style="margin-left: 15px;">
                                        <?php if ($getproduct['featured']) { ?>
                                        <input id="checkbox-9" type="checkbox" name="featured" value="<?php echo $getproduct['featured'] ?>" checked="checked">     
                                        <?php } else {
                                        ?>
                                        <input id="checkbox-9" type="checkbox" name="featured" value="<?php echo $getproduct['featured'] ?>" >
                                    <?php }
                                    ?>
                                        <label for="checkbox-9">
                                            Featured
                                        </label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button style="margin:10px;" type="submit" class="btn btn-purple waves-effect waves-light " name="save" value="upload">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>