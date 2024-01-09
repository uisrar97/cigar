            <div class="content-page">    
                <div class="content">    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Add Product</h3></div>
                                    <div class="panel-body">
                                        <form enctype="multipart/form-data" accept-charset="utf-8" role="form" action="<?php echo base_url() ?>saveproducts" method="POST">
                                            <div class="col-md-6">
                                                <label for="exampleInputBrand1">Brand Name: </label>
                                                <select class="form-control" id="exampleInputBrand1" name="brandid">
                                                    <?php 
                                                    foreach ($brands as $value) {
                                                     ?>
                                                    <option value="<?php echo $value['id'] ?>" ><?php echo ucwords($value['brand_name']) ?></option>
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
                                                    <option value="<?php echo $pt['id'] ?>"><?php echo ucwords($pt['type_name']) ?></option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputProductName1">Product Name: </label>
                                                <input type="text" name="name" class="form-control" id="exampleInputProductName1" placeholder="Product Name">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputPricePerPackage1">Price per Package: </label>
                                                <input type="text" name="price_package" class="form-control" id="exampleInputPricePerPackage1" placeholder="Price Per Package">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputPricePerCigar1">Price per Cigar: </label>
                                                <input type="text" name="price_cigar" class="form-control" id="exampleInputPricePerCigar1" placeholder="Price Per Cigar">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputNumberOfPackaging1">Number of Packaging: </label>
                                                <input type="text" name="number_of_packaging" class="form-control" id="exampleInputNumberOfPackaging1" placeholder="Number of Packaging">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputQuantityOrdered1">Quantity Ordered: </label>
                                                <input type="text" name="quantity_ordered" class="form-control" id="exampleInputQuantityOrdered1" placeholder="Quantity Ordered">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputOrderValue1">Order Value: </label>
                                                <input type="text" name="order_value" class="form-control" id="exampleInputOrderValue1" placeholder="Order Value">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="productimage">
                                                    Image
                                                </label>
                                                <input class="form-control" id="productimage" type="file" name="image" >
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="checkbox checkbox-primary checkbox-circle">
                                                <input id="checkbox-9" type="checkbox" name="featured">
                                                <label for="checkbox-9">
                                                    Featured
                                                </label>
                                            </div>
                                            <div class="clearfix"></div>
                                            <button type="submit" class="btn btn-purple waves-effect waves-light form-group" name="save" value="upload">Submit</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>