 <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    


                <div class="wraper container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center" style="background-image:url('<?= base_url() ?>uploads/profile/backgroundimage.jpg')">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">

                                    <img src="<?php echo base_url()?>/uploads/profile/<?= $getprofile['profile_image']?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    <h3 class="text-white"><?php echo ucwords($getprofile['first_name']) ?> <?php echo ucwords($getprofile['last_name']) ?></h3>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    <div class="row user-tabs">
                        <div class="col-lg-6 col-md-9 col-sm-9">
                            <ul class="nav nav-tabs tabs">
                            <li class="active tab">
                                <a href="#home-2" data-toggle="tab" aria-expanded="false" class="active"> 
                                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                    <span class="hidden-xs">About Me</span> 
                                </a> 
                            </li> 
                            <li class="tab" > 
                                <a href="#settings-2" data-toggle="tab" aria-expanded="false"> 
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                                    <span class="hidden-xs">Settings</span> 
                                </a> 
                            </li> 
                        <div class="indicator"></div></ul> 
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12"> 
                        
                        <div class="tab-content profile-tab-content"> 
                            <div class="tab-pane active" id="home-2"> 
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Personal Information</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                <div class="about-info-p">
                                                    <strong>Full Name</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php echo ucwords($getprofile['first_name']) ?> <?php echo ucwords($getprofile['last_name']) ?></p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Mobile</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php echo $getprofile['contact'] ?></p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Email</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php echo $getprofile['email'] ?></p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Address</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php echo ucwords($getprofile['address']) ?></p>
                                                </div>
                                            </div> 
                                        </div>
                                        <!-- Personal-Information -->

                                     

                                    </div>


                                    

                                </div>
                            </div> 
                            <div class="tab-pane" id="settings-2">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Edit Profile</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <form enctype="multipart/form-data" role="form" action="<?php echo base_url('updateprofile/'. $getprofile['id']);?>" method="POST" >
                                            <div class="form-group">
                                                <label for="FirstName">First Name</label>
                                                <input type="text" value="<?php echo ucwords($getprofile['first_name']) ?>" id="FirstName" class="form-control" name="first_name" placeholder="First Name" >
                                            </div>
                                            <div class="form-group">
                                                <label for="LastName">Last Name</label>
                                                <input type="text" value="<?php echo ucwords($getprofile['last_name']) ?>" id="LastName" class="form-control" name="last_name" placeholder="Last Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="Email">Email</label>
                                                <input type="email" value="<?php echo $getprofile['email'] ?>" id="Email" class="form-control" name="email" placeholder="Email" >
                                            </div>
                                            <div class="form-group">
                                                <label for="Username">Username</label>
                                                <input type="text" value="<?php echo $getprofile['username'] ?>" id="Username" class="form-control" name="username">
                                            </div>
                                            <div class="form-group">
                                                <label for="Password">Password</label>
                                                <input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control" name="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="Contact">Contact</label>
                                                <input type="text" placeholder="(123) 456 789" id="Contact" class="form-control" name="contact" value="<?php echo $getprofile['contact'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Address">Address</label>
                                                <input type="text" placeholder="address" value="<?php echo ucwords($getprofile['address']) ?>" id="Address" class="form-control" name="address">
                                            </div>

                                            <div class="col-sm-3">
                                                <label for="profileimage">Profile Image</label>
                                                <input type="file" id="profileimage" class="form-control" name="profile_image">
                                            </div>
                                            <div class="col-md-3">
                                                <img alt="profile-image" style="width: 70px; margin-top: 15px" id="image" src="<?php echo base_url('uploads/profile/'. $getprofile['profile_image']);?>" />
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

                                            $("#profileimage").change(function () {
                                                readURL(this);
                                            });
                                            </script>
                                            <div class="clearfix">
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $getprofile['id'] ?>">
                                            <button style="margin-top: 15px;" class="btn btn-primary waves-effect waves-light w-md" type="submit">Update</button>
                                        </form>

                                    </div> 
                                </div>
                                <!-- Personal-Information -->
                            </div> 
                        </div> 
                    </div>
                    </div>
                </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>

            </div>