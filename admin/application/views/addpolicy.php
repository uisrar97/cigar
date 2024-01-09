<div class="content-page">    
    <div class="content">    
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Add Policy</h3></div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" accept-charset="utf-8" role="form" action="<?php echo base_url() ?>savepolicy" method="POST">
                                    <div class="col-md-12">
                                        <label for="exampleInputProductName1">Policy Name: </label>
                                        <input type="text" name="policy_name" class="form-control" id="exampleInputProductName1" placeholder="Policy Name" required>
                                    </div>

                                    <div class="col-md-12"><br></div>
                                    
                                    <div class="col-md-12">
                                        <label for="exampleInputProductName1">Policy Content: </label>
                                        <textarea id="content" class="form-control" name="content" required></textarea>
                                    </div>
                                    
                                    <div class="col-md-12"><br></div>
                                    
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-purple waves-effect waves-light form-group" name="save" value="upload">Submit</button>
                                    </div>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
<script>
 CKEDITOR.replace( 'content', {
  height: 300,
  filebrowserUploadUrl: "<?php echo base_url() ?>ckpolicyupload"
 });
</script>