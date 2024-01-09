<div class="content-page">    
    <div class="content">    
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-6"> -->
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Add Package Type</h3></div>
                        <div class="panel-body">
                            <form enctype="multipart/form-data" accept-charset="utf-8" role="form" action="<?php echo base_url() ?>savetype" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputTypeName1">Type Name: </label>
                                    <input type="text" name="type_name" class="form-control" id="exampleInputTypeName1" placeholder="Type Name">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputTypeSlug1">Type Slug: </label>
                                    <input type="text" name="type_slug" class="form-control" id="exampleInputTypeSlug1" placeholder="Type Slug">
                                </div> -->
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