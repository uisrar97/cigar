<div class="content-page">    
    <div class="content">    
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-6"> -->
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Blog</h3></div>
                        <div class="panel-body">
                            <form enctype="multipart/form-data" accept-charset="utf-8" role="form" action="<?php echo base_url() ?>saveblogs" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputTitle1">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputTitle1" placeholder="Enter Title" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDescription1">Description</label>
                                   <!--  <input type="text" name="description" class="form-control" id="exampleInputDescription1" placeholder="description"> -->
                                    <textarea name="description" id="content" class="form-control ckeditor" required></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputdate1">Date</label>
                                    <input type="date" name="date" class="form-control" id="exampleInputdate1" placeholder="Date">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="blogimage">Image</label>
                                    <input class="form-control" id="blogimage" type="file" name="image">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="featured" class="checkbox-primary checkbox-circle" id="exampleInputfeatured1">
                                    <label for="exampleInputfeatured1">Featured</label>
                                </div>
                                <button style="margin: 15px" type="submit" class="btn btn-purple waves-effect waves-light" name="save" value="upload">Submit</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
<script>
 CKEDITOR.replace( 'content', {
  height: 300,
  filebrowserUploadUrl: "<?php echo base_url() ?>ckblogupload"
 });
</script>