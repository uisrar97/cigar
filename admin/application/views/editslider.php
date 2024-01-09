            <div class="content-page">    
                <div class="content">    
                    <div class="container">
                        <div class="row">
                            <!-- <div class="col-md-6"> -->
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Edit Slider</h3></div>
                                    <div class="panel-body">
                                        <form enctype="multipart/form-data" accept-charset="utf-8" role="form" action="<?php echo base_url('updateslider/'.$getslider['id']); ?>" method="POST">
                                            
                                                                                            
                                            <div class="form-group">
                                                <label for="exampleInputTitle1">Title</label>
                                                <input type="text" name="title" class="form-control" id="exampleInputTitle1" placeholder="Enter Title" value="<?php echo ucwords($getslider['title']) ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputHeading1">Heading</label>
                                                <input type="text" name="heading" class="form-control" id="exampleInputHeading1" placeholder="Heading" value="<?php echo ucwords($getslider['heading']) ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputSubHeading1">Sub Heading</label>
                                                <input type="text" name="sub_heading" class="form-control" id="exampleInputSubHeading1" placeholder="Sub Heading" value="<?php echo ucwords($getslider['sub_heading']) ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="sliderimage">Image</label>
                                                <input class="form-control" id="sliderimage" type="file" name="image" >
                                            </div>
                                            <div class="col-md-6">
                                                <img style="width: 75px; height: 55px" id="image" src="<?php echo base_url('uploads/'. $getslider['image']);?>">
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $getslider['id'] ?>">
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

                                            $("#sliderimage").change(function () {
                                                readURL(this);
                                            });
                                        </script>
                                        <button type="submit" class="btn btn-purple waves-effect waves-light" name="save" value="upload" style="margin: 15px">Update</button>

                                    
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
            