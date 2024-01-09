<div class="content-page">    
                <div class="content">    
                    <div class="container">
                        <div class="row">
                            <!-- <div class="col-md-6"> -->
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Edit Brand</h3></div>
                                    <div class="panel-body">
                                        <form enctype="multipart/form-data" accept-charset="utf-8" role="form" action="<?php echo base_url('updatebrand/'.$getbrand['id']); ?>" method="POST">                                                   
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputBrandName1">Brand Name: </label>
                                                <input type="text" name="brand_name" class="form-control" id="exampleInputBrandName1" placeholder="Brand Name" value="<?php echo ucwords($getbrand['brand_name']) ?>">
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="exampleInputBrandSlug1">Brand Slug: </label>
                                                <input type="text" name="brand_slug" class="form-control" id="exampleInputBrandSlug1" placeholder="Brand Slug" value="<?php echo $getbrand['brand_slug'] ?>">
                                            </div> -->
                                            <div class="col-md-5">
                                                <label for="productimage">Image</label>
                                                <input class="form-control" id="productimage" type="file" name="image" >
                                            </div>
                                            <div class="col-md-1">
                                                <img style="width: 75px; height: 55px" id="image" src="<?php echo base_url('uploads/brand/'.$getbrand['brand_image']);?>">
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-purple waves-effect waves-light" name="save" value="upload" >Update</button>
                                            </div>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
            