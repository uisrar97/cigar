<div class="content-page">    
    <div class="content">    
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-6"> -->
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Edit Type</h3></div>
                        <div class="panel-body">
                            <form enctype="multipart/form-data" accept-charset="utf-8" role="form" action="<?php echo base_url('updatetype/'.$gettype['id']); ?>" method="POST">                                                   
                                <div class="form-group">
                                    <label for="exampleInputTypeName1">Type Name: </label>
                                    <input type="text" name="type_name" class="form-control" id="exampleInputTypeName1" placeholder="type Name" value="<?php echo ucwords($gettype['type_name']) ?>">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputTypeSlug1">Type Slug: </label>
                                    <input type="text" name="type_slug" class="form-control" id="exampleInputTypeSlug1" placeholder="type Slug" value="<?php echo $gettype['type_slug'] ?>">
                                </div> -->
                            <button type="submit" class="btn btn-purple waves-effect waves-light" name="save" value="upload" >Update</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>            
            