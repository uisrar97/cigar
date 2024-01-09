      <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="<?php echo base_url()?>/uploads/profile/<?= $getprofile['profile_image']?>" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo ucwords($this->session->userdata('first_name')).' '.ucwords($this->session->userdata('last_name'));?><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url() ?>profile"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="<?= base_url() ?>logout"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?php echo base_url() ?>dashboard" class="waves-effect"><i class="md md-dashboard"></i><span> Dashboard </span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>settings" class="waves-effect"><i class="md md-settings"></i><span> Settings </span></a>
                            </li>
                             <li>
                                <a href="<?php echo base_url() ?>seo" class="waves-effect"><i class="fa fa-cogs" aria-hidden="true"></i><span> Seo </span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>homepagelisting" class="waves-effect"><i class="fa fa-home"></i><span> Homepage </span></a>
                            </li> 
                            <li>
                                <a href="<?php echo base_url() ?>products" class="waves-effect"><i class="md md-wallet-giftcard"></i><span> Products </span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>brands" class="waves-effect"><i class="mdi md-local-offer"></i><span> Brands </span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>packagetype" class="waves-effect"><i class="mdi md-domain"></i><span> Package Type </span></a>
                            </li>
                            <li>
                                <a  class="waves-effect"><i class="md md-assignment"></i> <span> Orders </span></a>

                                <ul>
                                    <li>
                                        <a href="<?php echo base_url() ?>pending_orders" class="waves-effect"><i class="md md-assignment"></i> <span> Pending </span>
                                        </a>

                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>completed_orders" class="waves-effect"><i class="md md-assignment"></i> <span> Completed </span>
                                        </a>

                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>cancelled_orders" class="waves-effect"><i class="md md-assignment"></i> <span>Canceled </span>
                                        </a>

                                    </li>
                                </ul>

                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>policies" class="waves-effect"><i class="fa fa-clipboard"></i> <span> Policies </span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>faqs" class="waves-effect"><i class="fa fa-question-circle"></i> <span> FAQs </span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>contact" class="waves-effect"><i class="fa fa-envelope"></i> <span> Support Messages </span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>blogs" class="waves-effect"><i class="md md-wrap-text"></i> <span> Blogs </span></a>
                            </li>
                           
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 