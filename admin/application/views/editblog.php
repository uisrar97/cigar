            <div class="content-page">    
                <div class="content">    
                    <div class="container">
                        <div class="row">
                            <!-- <div class="col-md-6"> -->
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Edit Blog</h3></div>
                                    <div class="panel-body">
                                        <form enctype="multipart/form-data" accept-charset="utf-8" role="form" action="<?php echo base_url('updateblog/'.$getblogs['id']); ?>" method="POST">       
                                            <div class="form-group">
                                                <label for="exampleInputTitle1">Title</label>
                                                <input type="text" name="title" class="form-control" id="exampleInputTitle1" placeholder="Enter Title" value="<?php echo ucwords($getblogs['title']) ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputDescription1">Description</label>
                                                <!-- <input type="text" name="description" class="form-control" id="exampleInputDescription1" value=""> -->
                                                <textarea name="description" id="content" class="form-control ckeditor" placeholder="Description" required><?php echo $getblogs['description'] ?></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputdate1">Date</label>
                                                <input type="date" name="date" class="form-control" id="exampleInputdate1" placeholder="Date" value="<?php echo $getblogs['date'] ?>">
                                            </div>
                                            <div class="col-md-5">
                                                <label for="blogimage">Image</label>
                                                <input class="form-control" id="blogimage" type="file" name="image" >
                                            </div>
                                            <div class="col-md-1">
                                                <img style="width: 75px; height: 55px" id="image" src="<?php echo base_url('uploads/blogs/'. $getblogs['image']);?>">
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $getblogs['id'] ?>">
                                    
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

                                                $("#blogimage").change(function () {
                                                    readURL(this);
                                                });
                                            </script>
                                            <div class="checkbox checkbox-primary checkbox-circle col-md-6" style="margin-left: 15px;">
                                                <?php if ($getblogs['featured']) { ?>
                                                <input id="checkbox-9" type="checkbox" name="featured" value="<?php echo $getblogs['featured'] ?>" checked="checked">     
                                                <?php } else {
                                                ?>
                                                <input id="checkbox-9" type="checkbox" name="featured" value="<?php echo $getblogs['featured'] ?>" >
                                                <?php }
                                                ?>
                                                <label for="checkbox-9">Featured</label>
                                            </div>
                                            
                                                <div class="col-md-6">
                                            <button type="submit" class="btn btn-purple waves-effect waves-light form-group" name="save" value="upload" style="margin: 15px">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div><!-- panel-body -->
                             <!--</div> panel -->
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