<div class="content-page">    
    <div class="content">    
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-6"> -->
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Add Brand</h3></div>
                        <div class="panel-body">
                            <form enctype="multipart/form-data" accept-charset="utf-8" role="form" action="<?php echo base_url() ?>savebrands" method="POST">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputBrandName1">Brand Name: </label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputBrandName1" placeholder="Enter Brand Name">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputBrandSlug1">Brand Slug: </label>
                                    <input type="text" name="brand_slug" class="form-control" id="exampleInputBrandSlug1" placeholder="Enter Brand Slug">
                                </div> -->
                                <div class="form-group col-md-6">
                                    <label for="exampleInputBrandSlug1">Image </label>
                                    <input class="form-control" id="productimage" type="file" name="image" >
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-purple waves-effect waves-light form-group" name="save" value="upload">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>