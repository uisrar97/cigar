            <div class="content-page">    
                <div class="content">    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Slider</h3></div>
                                    <div class="panel-body">
                                        <form enctype="multipart/form-data" accept-charset="utf-8" role="form" action="<?php echo base_url() ?>savedata" method="POST">
                                            
                                                                                            
                                            <div class="form-group">
                                                <label for="exampleInputTitle1">Title</label>
                                                <input type="text" name="title" class="form-control" id="exampleInputTitle1" placeholder="Enter Title">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputHeading1">Heading</label>
                                                <input type="text" name="heading" class="form-control" id="exampleInputHeading1" placeholder="Heading">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputSubHeading1">Sub Heading</label>
                                                <input type="text" name="sub_heading" class="form-control" id="exampleInputSubHeading1" placeholder="Sub Heading">
                                            </div>
                                            <div class="form-group">
                                                <label for="sliderimage">Image</label>
                                                <input class="form-control" id="sliderimage" type="file" name="image">
                                            </div>
                                            <button type="submit" class="btn btn-purple waves-effect waves-light" name="save" value="upload">Submit</button>
                                    
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>