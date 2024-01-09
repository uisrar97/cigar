            <div class="content-page">    
                <div class="content">    
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="<?php echo base_url() ?>dashboard">Mr Andersons Cigar - Admin</a></li>
                                    <li class="active">Settings</li>
                                </ol>
                            </div>
                        </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Settings</h3></div>
                                    <div class="panel-body">
                                        <form enctype="multipart/form-data" accept-charset="utf-8" role="form" action="<?php echo base_url() ?>savesettings" method="POST">
                                            <div class="col-md-6">
                                                <label for="exampleInputAppName1">Application Name</label>
                                                <input type="text" name="appName" class="form-control" id="exampleInputAppName1" placeholder="Enter Application Name" value="<?php echo $getsettings['application_name'] ?>">
                                            </div>
                                            <!-- <div class="col-md-6">
                                                <label for="exampleInputTitle1">Site Title</label>
                                                <input type="text" name="sitetitle" class="form-control" id="exampleInputTitle1" placeholder="Enter Site Title" value="<?php echo $getsettings['site_title'] ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputHomeTitle1">Home Title</label>
                                                <input type="text" name="hometitle" class="form-control" id="exampleInputHomeTitle1" placeholder="Enter Home Title" value="<?php echo $getsettings['home_title']  ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputSiteDescription1">Site Description</label>
                                                <input type="text" name="sitedescription" class="form-control" id="exampleInputSiteDescription1" placeholder="Enter Site Description" value="<?php echo $getsettings['site_description'] ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputKeywords1">Keywords</label>
                                                <input type="text" name="keywords" class="form-control" id="exampleInputKeywords1" placeholder="Enter Keywords" value="<?php echo $getsettings['keywords'] ?>">
                                            </div> -->
                                            <div class="col-md-6">
                                                <label for="exampleInputFacebookUrl1">Facebook URL</label>
                                                <input type="text" name="facebookurl" class="form-control" id="exampleInputFacebookUrl1" placeholder="Enter Facebook URL" value="<?php echo $getsettings['facebook_url'] ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputTwitterUrl1">Twitter URL</label>
                                                <input type="text" name="twitterurl" class="form-control" id="exampleInputTwitterUrl1" placeholder="Enter Twitter URL" value="<?php echo $getsettings['twitter_url'] ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputGoogleUrl1">Google URL</label>
                                                <input type="text" name="googleurl" class="form-control" id="exampleInputGoogleUrl1" placeholder="Enter Google URL" value="<?php echo $getsettings['google_url'] ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputInstagramUrl1">Instagram URL</label>
                                                <input type="text" name="instagramurl" class="form-control" id="exampleInputInstagramUrl1" placeholder="Enter Instagram URL" value="<?php echo $getsettings['instagram_url'] ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputPinterestUrl1">Pinterest URL</label>
                                                <input type="text" name="pinteresturl" class="form-control" id="exampleInputPinterestUrl1" placeholder="Enter Pinterest URL" value="<?php echo $getsettings['pinterest_url']?>">
                                            </div>
                                            <!-- <div class="col-md-6">
                                                <label for="exampleInputLinkedinUrl1">LinkedIn URL</label>
                                                <input type="text" name="linkedinurl" class="form-control" id="exampleInputLinkedinUrl1" placeholder="Enter LinkedIn URL" value="<?php echo $getsettings['linkedin_url'] ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputVkUrl1">VK URL</label>
                                                <input type="text" name="vkurl" class="form-control" id="exampleInputVkUrl1" placeholder="Enter VK URL" value="<?php echo $getsettings['vk_url'] ?>">
                                            </div> -->
                                            <div class="col-md-6">
                                                <label for="exampleInputOubn1">Optional URL Button Name</label>
                                                <input type="text" name="oubn" class="form-control" id="exampleInputOubn1" placeholder="Enter Optional URL Button Name" value="<?php echo $getsettings['optional_url_button_name'] ?>">
                                            </div> 
                                            <div class="col-md-6">
                                                <label for="exampleInputAboutFooter1">About Footer</label>
                                                <input type="text" name="aboutfooter" class="form-control" id="exampleInputAboutFooter1" placeholder="Enter About Footer" value="<?php echo $getsettings['about_footer'] ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputContextText1">Contact Text</label>
                                                <input type="text" name="contacttext" class="form-control" id="exampleInputContactText1" placeholder="Enter Contact Text" value="<?php echo $getsettings['contact_text'] ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputContactAddress1">Contact Address</label>
                                                <input type="text" name="address" class="form-control" id="exampleInputContactAddress1" placeholder="Enter Contact Address" value="<?php echo $getsettings['contact_address'] ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputContactEmail1">Contact Email</label>
                                                <input type="text" name="email" class="form-control" id="exampleInputContactEmail1" placeholder="Enter Contact Email" value="<?php echo $getsettings['contact_email'] ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputContactPhone1">Contact Phone</label>
                                                <input type="text" name="phone" class="form-control" id="exampleInputContactPhone1" placeholder="Enter Contact Phone" value="<?php echo $getsettings['contact_phone'] ?>">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="exampleInputcopyright1">Copyright</label>
                                                <input type="text" name="copyright" class="form-control" id="exampleInputcopyright1" placeholder="Enter Copyright" value="<?php echo $getsettings['copyright'] ?>">
                                            </div>
                                            <div class="col-md-3">
                                                   <label for="headerlogo">Header Logo</label>
                                                    <input class="form-control" value="<?php echo base_url('uploads/settings/'. $getsettings['header_logo']);?>" id="headerlogo" type="file" name="header_logo" >
                                            </div>

                                            <div class="col-md-3">
                                                <img style="width: 70px; margin-top: 15px" id="headerlogo" src="<?php echo base_url('uploads/settings/'. $getsettings['header_logo']);?>" />
                                            </div>
                                            <script type="text/javascript">
                                            function readURL(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function (e) {
                                                        $('#header_logo').attr('src', e.target.result);
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                            $("#headerlogo").change(function () {
                                                readURL(this);
                                            });
                                        </script>
                                            <!--<div class="col-md-3">
                                                   <label for="footerlogo">
                                                        Footer Logo
                                                    </label>
                                                    <input class="form-control" id="footerlogo" type="file" name="footer_logo" value="<?php echo $getsettings['footer_logo'] ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <img style="width: 70px; margin-top: 15px" id="footerimage" src="<?php echo base_url('uploads/settings/'. $getsettings['footer_logo']);?>" />
                                            </div> -->
                                            <div class="clearfix">
                                                
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $getsettings['id'] ?>">
                                            <button style="margin-top: 10px" type="submit" class="btn btn-purple waves-effect waves-light" name="save" value="upload">Update</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                    </div>
                </div>
            </div>