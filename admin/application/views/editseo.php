<div class="content-page">    
    <div class="content">    
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-6"> -->
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Edit SEO</h3></div>
                        <div class="panel-body">
                            <form enctype="multipart/form-data" accept-charset="utf-8" role="form" action="<?php echo base_url() ?>updateseo" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputBrandName1">Meta Title: </label>
                                    <input type="text" name="meta_title" class="form-control" id="exampleInputBrandName1" placeholder="Enter Meta Title" value="<?= $meta_title ?>">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBrandSlug1">Meta Description: </label>
                                    <textarea name="meta_description" class="form-control" id="exampleInputBrandSlug1" placeholder="Enter Meta Description" rows="5" required><?= $meta_description ?></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-purple waves-effect waves-light form-group">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>