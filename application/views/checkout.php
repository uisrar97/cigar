<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
       
        <link rel="canonical" href="<?= base_url() ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <link rel="stylesheet" href="<?= base_url() ?>/assets/templates/common-core/lib/bootstrap/css/bootstrapcfc9.css" type="text/css" />
        <link rel="StyleSheet" href="<?= base_url() ?>/assets/templates/common-core/css/corecfc9.css" type="text/css" />
        <link rel="StyleSheet" href="<?= base_url() ?>/assets/templates/common-core/css/view_cart.css" type="text/css" />
        <link rel="StyleSheet" href="<?= base_url() ?>/assets/templates/common-core/css/cheackout.css" type="text/css" />
        <link rel="stylesheet" type="../cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" />
        <link rel="stylesheet" href="<?= base_url() ?>/assets/templates/common-core/lib/flexslider/flexslidercfc9.css" type="text/css" media="screen" />
        <script src="<?= base_url()?>assets/ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <style>
            .TSnav 
            {
                float:right;
                position: relative;
            }
            /* Arrows */
            .slick-prev,
            .slick-next
            {
                font-size: 0;
                line-height: 0;

                position: absolute;
                top: 0%;

                display: block;

                width: 20px;
                height: 20px;
                padding: 0;
                /*
                -webkit-transform: translate(0, -50%);
                -ms-transform: translate(0, -50%);
                transform: translate(0, -50%);
                */
                cursor: pointer;

                color: transparent;
                border: none;
                outline: none;
                background: transparent;
            }
            .slick-prev:hover,
            .slick-prev:focus,
            .slick-next:hover,
            .slick-next:focus
            {
                color: transparent;
                outline: none;
                background: transparent;
            }
            .slick-prev:hover:before,
            .slick-prev:focus:before,
            .slick-next:hover:before,
            .slick-next:focus:before
            {
                opacity: 1;
            }
            .slick-prev.slick-disabled:before,
            .slick-next.slick-disabled:before
            {
                opacity: .25;
            }

            .slick-prev:before,
            .slick-next:before
            {
                font-family: "fontello";
                font-size: 24px;
                line-height: 1;

                opacity: .75;
                color: #502701;

                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            .slick-prev
            {
                left: -40px;
            }
            [dir='rtl'] .slick-prev
            {
                right: -0px;
                left: auto;
            }
            .slick-prev:before
            {
                content: '\f104';
            }
            [dir='rtl'] .slick-prev:before
            {
                content: '\f105';
            }

            .slick-next
            {
                right: 0px;
            }
            [dir='rtl'] .slick-next
            {
                right: auto;
                left: -40px;
            }
            .slick-next:before
            {
                content: '\f105';
            }
            [dir='rtl'] .slick-next:before
            {
                content: '\f104';
            }

        </style>
        <link href='<?= base_url()?>assets/templates/common-core/lib/contentbuilder/minimalist-blocks/contentcfc9.css' rel='stylesheet' type='text/css' />
        <link rel="StyleSheet" href="<?= base_url() ?>/assets/templates/cigarvenue-core/css/defaultcfc9.css" type="text/css" />
    </head>
    <body>
        <section id="checkoutSinglePage" class="checkoutSinglePage-page-content checkout-page page-content">
            <div class="container">
                <div class="row">
                    <div class="content-area col-lg-12 clearfix">
                        <form action="<?= base_url()?>checked-out" novalidate method="POST" name="billing" id="billing">
                            <input type="hidden" name="tknio" value="N9n8rm+X89bpskLQ3K+yxEIeZmoRQvAj">
                            <?php 
                                if($total<800 && $total!=0)
                                {
                                    $shipping=49.00;
                                }
                                else
                                {
                                    $shipping=0.00;
                                }
                                $total+=$shipping;
                            ?>
                            <input type="hidden" name="grandtotal" value="<?= $total ?>"/>
                            <input type="hidden" name="shipping" value="<?= $shipping ?>"/>
                            <div id="ab-content" class="row ab-content">
                                <!-- <div id="checkout-logo" class="col-md-7 col-xs-12">
                                <div class="logo">
                                <a href="<?= base_url() ?>" title="Sample Store"><img src="<?= base_url() ?>assets/images/3dcart/logo.png" alt="Sample Store"></a>
                                </div>
                                </div> -->
                                <div id="checkout-right" class="col-md-5 col-xs-12 bg-alternative showcart-md col-height pull-right rightCol">
                                    <section class="row-full cart-toggle bg-alternative hidden-md hidden-lg">
                                        <div class="container">
                                            <div class="row">
                                            <!-- <div class="col-xs-12 text-right"><span class="pull-left"><h4 class="module-expand expanded" data-toggle="collapse" data-target="#chkShoppingCartCollapse"><i class="icon-basket"></i></h4></span> <h5 class="text-success cart-total cart-balance-item">$400.00</h5></div> -->
                                            </div>
                                        </div>
                                    </section>
                                    <div class="row hidden-xs order-summary-header">
                                        <div class="col-xs-6">
                                            <h3>Order Summary</h3>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <a href="<?= base_url() ?>cart">Edit Cart</a>
                                        </div>
                                    </div>
                                    <div id="chkShoppingCartCollapse" class="collapse in">
                                        <div id="chkShoppingCart" class="chkShoppingCart scrollbox scrollbox_delayed">
                                            <div class="scrollbox-content">
                                                <?php 
                                                    foreach ($cartdata as $key => $value)
                                                    {
                                                ?>
                                                        <div class="row cart-items">
                                                            <div class="main">
                                                                <div class="col-sm-2 col-xs-3 vcenter">
                                                                    <div class="product-image">
                                                                        <a href="Fusce-euismod-consequat-ante_p_19.html"><img  src="<?= base_url() ?>admin/uploads/products/<?= $value['image']  ?>" alt="<?= $value['name']  ?>" id="tl"></a>
                                                                        <!-- 	<span>2</span> -->
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-6 vcenter">
                                                                    <div class="product-name">
                                                                        <span><a href="Fusce-euismod-consequat-ante_p_19.html"><?= $value['name']  ?><br><b></a></span>
                                                                        <div class="base-price"><?=  $value['price'].'.00'   ?> Kr</div>
                                                                    </div>
                                                                </div>
		                                                        <div class="col-sm-2 col-xs-3 vcenter">
                                                                    <div class="product-info text-right"><?=  $value['subtotal'].'.00'  ?> Kr</div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
	                                                    </div>
                                                <?php 
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div id="total_div">
                                            <div class="row cart-tally">
                                                <?php 
                                                    if($total<800 && $total!=0)
                                                    {
                                                        $shipping=49.00;
                                                    }
                                                    else
                                                    {
                                                        $shipping=0.00;
                                                    }
                                                ?>
                                                <div class="col-xs-6 carttotal-label">Shipping</div>
                                                <div class="col-xs-6 carttotal-price" style="text-align:right;  margin-bottom:10px;"><?= $shipping ?>.00 Kr</div>
                                                <!-- <div id="divApplyCoupon" class="applyCoupon clearfix">
                                                <div class="coupon-header header col-sm-12">
                                                <h3 class="page_heading">Apply Coupon</h3>
                                                <div class="clearfix"></div>
                                                </div>
                                                <div class="coupon-field clearfix">
                                                <div class="col-sm-9">
                                                <div class="labelholder">
                                                <input id="coupon" placeholder="If you have a promotion code enter it here." onchange="clearContent(this);" maxlength="50" value="" name="coupon_code" class="txtBoxStyle form-control">
                                                </div>
                                                </div>
                                                <div class="col-sm-3 coupon-apply">
                                                <button type="button" onclick="applyCoupon(this.form.coupon_code.value);" class="btn btn-default form-control">Apply</button>
                                                </div>
                                                </div>
                                                <div name="divInvalidCoupon" id="divInvalidCoupon" style="display:none;" class="col-xs-12">
                                                <div class="alert alert-danger">Invalid Coupon</div>
                                                </div>
                                                <div class="coupon-applied col-xs-12"></div>`
                                                </div> -->

                                                <!-- <div class="clearfix total_div">
                                                <div class="total_items col-xs-6">Subtotal</div>
                                                <div class="total_subtotal col-xs-6 text-right">$400.00</div>
                                                </div> -->



                                                <!-- <div class="clearfix">
                                                <div class="total_cart-shipping col-xs-6">Shipping</div>
                                                <div class="total_shipping col-xs-6 text-right">$0.00</div>
                                                </div> -->

                                                <!-- <div class="clearfix total_div">
                                                <div class="total_cart-taxes col-xs-6">Taxes</div>
                                                <div class="total_taxes col-xs-6 text-right">$0.00</div>
                                                </div> -->
                                            </div>
                                            <?php
                                                if (!empty($cartdata))
                                                {
                                            ?>
                                                    <div class="row cart-grandtotal">
                                                        <div class="clearfix total_div remaining-balance">
                                                            <div class="total_cart-total col-xs-6">Total</div>
                                                            <div class="total_total col-xs-6 text-right total_due_amount"><?= $total.'.00' ?> Kr</div>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                                    <div class="row cart-grandtotal">
                                                        <div class="total_cart-total col-xs-6">Cart is Empty</div>
                                                    </div>
                                            <?php
                                                }
                                            ?>
                                            <input type="hidden" name="hdnBalance" id="hdnBalance" value="400.00">
                                        </div>
                                    </div>
                                </div>
                                <div id="checkout-left" class="col-md-7 col-xs-12 col-height leftCol" style="margin-top: 6%">
                                    <!-- <div class="quickpay checkout-section">
                                        <div class="row"></div>
                                    </div> -->
                                    <?php
                                        // if(empty($_SESSION['loggedin']))
                                        // {
                                    ?>
                                    <!-- <div class="createNewAccount">
                                        <div class="header clearfix">
                                            <h3 class="page_heading">Create New Account</h3>
                                        </div>
                                        <div class="row chkField">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="chkField col-xs-12 clearfix">
                                                        <label for="billing_email" class="validation-field labelholder has-labelholder" data-label="Email">
                                                            <input placeholder="Email" name="billing_email" type="email" id="billing_email"  value="" tabindex="1" maxlength="100" class="form-control txtBoxStyle" required="">
                                                            <span class="required-indicator"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="passwordFields" class="col-sm-6 password-fields" style="">
                                                <div class="row">
                                                    <div class="chkField col-xs-12 clearfix">
                                                        <label for="pass" class="validation-field labelholder has-labelholder" data-label="Password">
                                                            <input type="text" name="username" id="username" placeholder="Username" autocomplete="off" tabindex="3" class="form-control txtBoxStyle" [callfunctionverifystrongpass]="" required="">
                                                            <span class="required-indicator"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row"></div>
                                        <div class="row chkField">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="chkField col-xs-12 clearfix">
                                                        <label for="billing_email" class="validation-field labelholder has-labelholder" data-label="Email">
                                                            <input placeholder="Password" name="password" type="password" id="password"  value="" tabindex="1" minlength="8" class="form-control txtBoxStyle" required="">
                                                            <span class="required-indicator"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="passwordFields" class="col-sm-6 password-fields" style="">
                                                <div class="row">
                                                    <div class="chkField col-xs-12 clearfix">
                                                        <label for="pass" class="validation-field labelholder has-labelholder" data-label="Password">
                                                            <input type="password" id="confirmpassword" placeholder="Confirm Password" autocomplete="off" minlength="8" tabindex="3" class="form-control txtBoxStyle" [callfunctionverifystrongpass]="" required="">
                                                            <span class="required-indicator"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 password-fields">
                                                <span id='message'></span>
                                                <br>
                                                <br>
                                            </div>
                                            <div class="col-sm-12 password-fields">
                                                <p>Already have an account? <a href="<?= base_url() ?>Homepage/loginuser" >Sign In</a></p>
                                            </div>
                                        </div>
                                    </div> -->
                                    <?php
                                        //}
                                    ?>
                                    <!-- <div class="account_login account_login1 checkout-section">
                                    <div class="chkField">Shopped with us before? <a href="#" class="btn btn-link" data-toggle="modal" data-target="#loginModal">Log in to your account</a>
                                    </div>
                                    </div>-->
                                    <div id="billing_info" class="checkout-section">
                                        <div class="header clearfix">
                                            <h1 class="page_heading">Billing Information</h1>
                                        </div>
                                        <div class="row">
                                            <?php
                                                if(isset($_SESSION['guest']) && $_SESSION['guest']==1)
                                                {
                                            ?>
                                                    <div class="chkField col-sm-6 clearfix">
                                                        <label for="billing_firstname" class="validation-field labelholder has-labelholder" data-label="First Name">
                                                            <input name="billing_firstname" type="text" id="billing_firstname" placeholder="First Name" size="15" tabindex="6" maxlength="100" class="form-control txtBoxStyle" required="">
                                                            <span class="required-indicator"></span>
                                                        </label>
                                                    </div>
                                                    <div class="chkField col-sm-6 clearfix">
                                                        <label for="billing_lastname" class="validation-field labelholder has-labelholder" data-label="Last Name">
                                                            <input name="billing_lastname" type="text" id="billing_lastname" placeholder="Last Name" size="15" tabindex="7" maxlength="100" class="form-control txtBoxStyle" required="">
                                                            <span class="required-indicator"></span>
                                                        </label>
                                                    </div>
                                                    <div class="chkField col-sm-12 clearfix">
                                                        <label for="billing_email" class="validation-field labelholder has-labelholder" data-label="Last Name">
                                                            <input name="billing_email" type="email" id="billing_email" placeholder="Email"  class="form-control txtBoxStyle" required="">
                                                            <span class="required-indicator"></span>
                                                        </label>
                                                    </div>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                                    <div class="chkField col-sm-6 clearfix">
                                                        <label for="billing_firstname" class="validation-field labelholder has-labelholder" data-label="First Name">
                                                            <input name="billing_firstname" type="text" id="billing_firstname" value="<?php if(isset($_SESSION['first_name'])) echo $_SESSION['first_name'];?>" placeholder="First Name" size="15" tabindex="6" maxlength="100" class="form-control txtBoxStyle" required="" readonly>
                                                            <span class="required-indicator"></span>
                                                        </label>
                                                    </div>
                                                    <div class="chkField col-sm-6 clearfix">
                                                        <label for="billing_lastname" class="validation-field labelholder has-labelholder" data-label="Last Name">
                                                            <input name="billing_lastname" type="text" id="billing_lastname" value="<?php if(isset($_SESSION['last_name'])) echo $_SESSION['last_name'];?>" placeholder="Last Name" size="15" tabindex="7" maxlength="100" class="form-control txtBoxStyle" required="" readonly>
                                                            <span class="required-indicator"></span>
                                                        </label>
                                                    </div>
                                                    <div class="chkField col-sm-12 clearfix">
                                                        <label for="billing_email" class="validation-field labelholder has-labelholder" data-label="Last Name">
                                                            <input name="billing_email" type="email" id="billing_email" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'];?>" placeholder="Email"  class="form-control txtBoxStyle" required="" readonly>
                                                            <span class="required-indicator"></span>
                                                        </label>
                                                    </div>
                                            <?php
                                                }
                                            ?>
                                            <div class="chkField col-sm-12 clearfix">
                                                <label for="billing_company" class="validation-field labelholder has-labelholder" data-label="Company">
                                                    <input name="billing_company" type="text" id="billing_company" value="<?php if(isset($_SESSION['company'])) echo $_SESSION['company'];?>" placeholder="Company" size="25" tabindex="8" maxlength="255" class="form-control txtBoxStyle">
                                                </label>
                                            </div>
                                            <div class="chkField col-sm-8 clearfix">
                                                <label for="billing_address" class="validation-field labelholder has-labelholder" data-label="Address">
                                                    <input name="billing_address" type="text" id="billing_address" value="<?php if(isset($_SESSION['address'])) echo $_SESSION['address'];?>" placeholder="Address" size="25" tabindex="9" maxlength="255" class="form-control txtBoxStyle"  required="">
                                                    <span class="required-indicator"></span>
                                                </label>
                                            </div>
                                            <div class="chkField col-sm-4 clearfix">
                                                <label for="billing_address2" class="validation-field labelholder has-labelholder" data-label="Suite / Apt #">
                                                    <input name="billing_address2" type="text" id="billing_address2" value="<?php if(isset($_SESSION['apt'])) echo $_SESSION['apt'];?>" placeholder="Suite / Apt #" size="25" tabindex="10" maxlength="50" class="form-control txtBoxStyle">
                                                </label>
                                            </div>
                                            <div class="chkField col-sm-12 clearfix">
                                                <label for="billing_city" class="validation-field labelholder has-labelholder" data-label="City">
                                                    <input name="billing_city" type="text" id="billing_city" value="<?php if(isset($_SESSION['city'])) echo $_SESSION['city'];?>" placeholder="City" size="25" tabindex="11" maxlength="100" class="form-control txtBoxStyle"  required="">
                                                    <span class="required-indicator"></span>
                                                </label>
                                            </div>
                                            <div class="chkField col-sm-5 clearfix">
                                                <label for="billing_country" class="validation-field labelholder has-labelholder floating" data-label="Country">
                                                    <select name="billing_country"  tabindex="12" class="form-control txtBoxStyle" id="billing_country" required="">[CountryDropDown]
                                                        <option value="">Select Country</option>
                                                        <!-- <option value="AF">Afghanistan</option><option value="AX">Aland Islands</option><option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option>
                                                        <option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option>
                                                        <option value="AG">Antigua &amp; Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option>
                                                        <option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option>
                                                        <option value="AZ">Azerbaijan</option><option value="AP">Azores</option><option value="BS">Bahamas</option>
                                                        <option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option>
                                                        <option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option>
                                                        <option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option>
                                                        <option value="BO">Bolivia</option><option value="BL">Bonaire</option><option value="BA">Bosnia</option>
                                                        <option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option>
                                                        <option value="VG">British Virgin Islands</option><option value="BN">Brunei</option><option value="BG">Bulgaria</option>
                                                        <option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option>
                                                        <option value="CM">Cameroon</option><option value="CA">Canada</option><option value="IC">Canary Islands</option>
                                                        <option value="CV">Cape Verde Islands</option><option value="KY">Cayman Islands</option>
                                                        <option value="CF">Central African Republic</option><option value="TD">Chad</option>
                                                        <option value="GB-CHA">Channel Islands</option><option value="CL">Chile</option><option value="CN">China</option>
                                                        <option value="CX">Christmas Island</option><option value="CC">Cocos (keeling) Islands</option>
                                                        <option value="CO">Colombia</option><option value="CG">Congo</option><option value="CK">Cook Islands</option>
                                                        <option value="CR">Costa Rica</option><option value="CI">Cote Divoire</option><option value="HR">Croatia</option>
                                                        <option value="CU">Cuba</option><option value="CB">Curacao</option><option value="CY">Cyprus</option>
                                                        <option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option>
                                                        <option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option>
                                                        <option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equitorial Guinea</option>
                                                        <option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option>
                                                        <option value="FO">Faeroe Islands</option><option value="FK">Falkland Islands (Malvinas)</option>
                                                        <option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option>
                                                        <option value="GF">French Guiana</option><option value="PF">French Polynesia</option>
                                                        <option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option>
                                                        <option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option>
                                                        <option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option>
                                                        <option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option>
                                                        <option value="GT">Guatemala</option><option value="GG">Guernsey</option><option value="GN">Guinea</option>
                                                        <option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option>
                                                        <option value="HM">Heard Island and Mcdonald Islands</option><option value="HO">Holland</option>
                                                        <option value="VA">Holy See (Vatican City State)</option><option value="HN">Honduras</option>
                                                        <option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option>
                                                        <option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option>
                                                        <option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IM">Isle of Man</option>
                                                        <option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option>
                                                        <option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option>
                                                        <option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option>
                                                        <option value="KP">Korea, Democratic People's Republic of</option><option value="KR">Korea, Republic of</option>
                                                        <option value="KO">Kosrae</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option>
                                                        <option value="LA">Laos</option><option value="LV">Latvia</option><option value="LB">Lebanon</option>
                                                        <option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libyan Arab Jamahiriya</option>
                                                        <option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option>
                                                        <option value="MO">Macau</option><option value="MK">Macedonia, Republic of</option><option value="MG">Madagascar</option>
                                                        <option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option>
                                                        <option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option>
                                                        <option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option>
                                                        <option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia, Federated States of</option>
                                                        <option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option>
                                                        <option value="ME">Montenegro, Republic of</option><option value="MS">Montserrat</option><option value="MA">Morocco</option>
                                                        <option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option>
                                                        <option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option>
                                                        <option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option>
                                                        <option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option>
                                                        <option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="NB">Northern Ireland</option>
                                                        <option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option>
                                                        <option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PS">Palestinian Territory, Occupied</option>
                                                        <option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option>
                                                        <option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn Island</option>
                                                        <option value="PL">Poland</option><option value="PO">Ponape</option><option value="PT">Portugal</option>
                                                        <option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="RE">Reunion</option>
                                                        <option value="RO">Romania</option><option value="RT">Rota</option><option value="RU">Russia</option>
                                                        <option value="RW">Rwanda</option><option value="SS">Saba</option><option value="SP">Saipan</option>
                                                        <option value="SM">San Marino</option><option value="ST">Sao Tome and Principe</option><option value="SA">Saudi Arabia</option>
                                                        <option value="SF">Scotland</option><option value="SN">Senegal</option><option value="RS">Serbia, Republic of</option>
                                                        <option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option>
                                                        <option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option>
                                                        <option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="ES">Spain</option>
                                                        <option value="LK">Sri Lanka</option><option value="NT">St. Barthelemy</option><option value="SW">St. Christopher</option>
                                                        <option value="EU">St. Eustatius</option><option value="UV">St. John</option><option value="KN">St. Kitts &amp; Nevis</option>
                                                        <option value="LC">St. Lucia</option><option value="MB">St. Maarten</option><option value="SX">St. Maarten</option>
                                                        <option value="TB">St. Martin</option><option value="VL">St. Thomas</option>
                                                        <option value="VC">St. Vincent &amp; the Grenadines</option><option value="SD">Sudan</option>
                                                        <option value="SR">Suriname</option><option value="SZ">Swaziland</option> -->
                                                        <option value="SE" <?php if(isset($_SESSION['country']) && $_SESSION['country']=="SE") echo 'selected="selected"'; ?> >Sweden</option>
                                                        <!-- <option value="CH">Switzerland</option><option value="SY">Syrian Arab Republic</option><option value="TA">Tahiti</option>
                                                        <option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option>
                                                        <option value="TH">Thailand</option><option value="TL">Timor-Leste</option><option value="TI">Tinian</option>
                                                        <option value="TG">Togo</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option>
                                                        <option value="TU">Truk</option><option value="TN">Tunisia</option><option value="TR">Turkey</option>
                                                        <option value="TM">Turkmenistan</option><option value="TC">Turks &amp; Caicos Islands</option><option value="TV">Tuvalu</option>
                                                        <option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="UI">Union Island</option>
                                                        <option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option>
                                                        <option value="US">United States</option><option value="UY">Uruguay</option><option value="VI">US Virgin Islands</option>
                                                        <option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VE">Venezuela</option>
                                                        <option value="VN">Vietnam</option><option value="VR">Virgin Gorda</option><option value="WK">Wake Island</option>
                                                        <option value="WL">Wales</option><option value="WF">Wallis and Futuna</option><option value="EH">Western Sahara</option>
                                                        <option value="WS">Western Samoa</option><option value="YA">Yap</option><option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option> -->
                                                    </select>
                                                    <span class="required-indicator"></span>
                                                </label>
                                            </div>
                                            <div class="chkField col-sm-4 state-select clearfix">
                                                <label for="billing_state" class="validation-field labelholder has-labelholder floating" data-label="State">
                                                    <select name="billing_state" tabindex="13" class="form-control txtBoxStyle" id="billing_state" required="">
                                                        <option value="">Select State</option>
                                                        <!-- <option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option>
                                                        <option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option>
                                                        <option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District of Columbia</option>
                                                        <option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option>
                                                        <option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option>
                                                        <option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option>
                                                        <option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option>
                                                        <option value="PR">Puerto Rico</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
                                                        <option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option>
                                                        <option value="UT">Utah</option><option value="VT">Vermont</option><option value="VI">Virgin Islands</option>
                                                        <option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option>
                                                        <option value="WI">Wisconsin</option><option value="WY">Wyoming</option> -->
                                                        <option value="AG" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="AG") echo "selected='selected'"; ?>>Ångermanland</option>
                                                        <option value="BL" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="BL") echo "selected='selected'"; ?>>Blekinge</option>
                                                        <option value="BH" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="BH") echo "selected='selected'"; ?>>Bohuslän</option>
                                                        <option value="KO" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="KO") echo "selected='selected'"; ?>>Dalarna</option>
                                                        <option value="DL" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="DL") echo "selected='selected'"; ?>>Dalsland</option>
                                                        <option value="GT" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="GT") echo "selected='selected'"; ?>>Gotland</option>
                                                        <option value="GK" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="GK") echo "selected='selected'"; ?>>Gästrikland</option>
                                                        <option value="HA" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="HA") echo "selected='selected'"; ?>>Halland</option>
                                                        <option value="HG" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="HG") echo "selected='selected'"; ?>>Hälsingland</option>
                                                        <option value="HJ" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="HJ") echo "selected='selected'"; ?>>Härjedalen</option>
                                                        <option value="JA" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="JA") echo "selected='selected'"; ?>>Jämtland</option>
                                                        <option value="LP" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="LP") echo "selected='selected'"; ?>>Lappland</option>
                                                        <option value="MD" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="MD") echo "selected='selected'"; ?>>Medelpad</option>
                                                        <option value="NB" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="NB") echo "selected='selected'"; ?>>Norrbotten</option>
                                                        <option value="NA" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="NA") echo "selected='selected'"; ?>>Närke</option>
                                                        <option value="OL" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="OL") echo "selected='selected'"; ?>>Öland</option>
                                                        <option value="OG" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="OG") echo "selected='selected'"; ?>>Östergötland</option>
                                                        <option value="SN" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="SN") echo "selected='selected'"; ?>>Skåne</option>
                                                        <option value="SM" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="SM") echo "selected='selected'"; ?>>Småland</option>
                                                        <option value="SD" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="SD") echo "selected='selected'"; ?>>Södermanland</option>
                                                        <option value="UL" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="UL") echo "selected='selected'"; ?>>Uppland</option>
                                                        <option value="VR" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="VR") echo "selected='selected'"; ?>>Värmland</option>
                                                        <option value="VM" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="VM") echo "selected='selected'"; ?>>Västmanland</option>
                                                        <option value="VB" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="VB") echo "selected='selected'"; ?>>Västerbotten</option>
                                                        <option value="VG" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="VG") echo "selected='selected'"; ?>>Västergötland</option>
                                                    </select>
                                                    <span class="required-indicator"></span>
                                                </label>
                                            </div>
                                            <div class="chkField col-sm-3 clearfix">
                                                <label for="billing_zip" class="validation-field labelholder has-labelholder" data-label="Zip">
                                                    <input name="billing_zip" type="text" id="billing_zip" value="<?php if(isset($_SESSION['zip_code'])) echo $_SESSION['zip_code'];?>" placeholder="Zip" size="10" tabindex="14" maxlength="20" class="form-control txtBoxStyle"  required="">
                                                    <span class="required-indicator"></span>
                                                </label>
                                            </div>
                                            <div class="chkField col-sm-12 clearfix">
                                                <label for="billing_phone" class="validation-field labelholder has-labelholder" data-label="Phone">
                                                    <input name="billing_phone" type="text"  id="billing_phone" value="<?php if(isset($_SESSION['contact'])) echo $_SESSION['contact'];?>" placeholder="Phone" tabindex="15" maxlength="50" class="form-control txtBoxStyle" required="">
                                                </label>
                                            </div>
                                            <!-- <div class="chkField col-sm-12 clearfix">
                                               <div class="checkbox-format checkbox-format-checkout">
                                               <input type="checkbox" value="1" id="maillist" name="maillist" tabindex="16">
                                               <label for="maillist">Yes!, I would like to be notified of product updates.</label>
                                               </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div id="shipping_info" class="checkout-section">
                                        <div class="header clearfix">
                                            <h3 class="page_heading">Shipping Information</h3>
                                        </div>
                                        <div class="shipping_info-box">
                                            <div id="sameasbilling_box" class="sameasbilling_box">
                                                <label for="sameasbilling_radio" class="sameasbilling_radio">
                                                    <input type="radio" class="sameAsBilling" value="billing" name="sameasbilling_radio" id="sameasbilling_radio" tabindex="17" checked="checked">
                                                    <span>Same as billing address</span>
                                                </label>
                                                <!-- <input type="checkbox" value="billing" name="sameAsBilling" id="sameAsBilling"  checked="checked" style="display:none;"> -->
                                            </div>
                                            <div class="sameasbilling_box">
                                                <label for="notsameasbilling_radio" class="sameasbilling_radio">
                                                    <input type="radio" value="shipping" class="sameAsBilling" name="sameasbilling_radio" id="notsameasbilling_radio" tabindex="18">
                                                    <span>Use a different shipping address</span>
                                                </label>
                                                <div id="notsameasbilling_box" class="notsameasbilling_box clearfix" style="display:none;">
                                                    <div class="chkField col-sm-8 clearfix">
                                                        <label for="shipping_address" class="validation-field labelholder has-labelholder" data-label="Address">
                                                            <input name="shipping_address" type="text" id="shipping_address" value="" placeholder="Address" size="25" tabindex="23" maxlength="255" class="form-control txtBoxStyle" required="">
                                                            <span class="required-indicator"></span>
                                                        </label>
                                                    </div>
                                                    <div class="chkField col-sm-4 clearfix">
                                                        <label for="shipping_address2" class="validation-field labelholder has-labelholder" data-label="Suite / Apt #">
                                                            <input name="shipping_address2" type="text" id="shipping_address2" value="" placeholder="Suite / Apt #" size="25" tabindex="24" maxlength="50" class="form-control txtBoxStyle">
                                                        </label>
                                                    </div>
                                                    <div class="chkField col-sm-12 clearfix">
                                                        <label for="shipping_city" class="validation-field labelholder has-labelholder" data-label="City">
                                                            <input name="shipping_city" type="text" id="shipping_city" value="" placeholder="City" size="25" tabindex="25" maxlength="100" class="form-control txtBoxStyle"  required="">
                                                            <span class="required-indicator"></span>
                                                        </label>
                                                    </div>
                                                    <div class="chkField col-sm-5 clearfix">
                                                        <label for="shipping_country" class="validation-field labelholder has-labelholder floating" data-label="Country">
                                                            <select id="shipping_country" name="shipping_country" data-customerinfo_state="State" tabindex="26" class="form-control txtBoxStyle" required="required">
                                                                <option value="">Select Country</option>
                                                                <!-- <option value="AF">Afghanistan</option><option value="AX">Aland Islands</option><option value="AL">Albania</option>
                                                                <option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option>
                                                                <option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option>
                                                                <option value="AG">Antigua &amp; Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option>
                                                                <option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option>
                                                                <option value="AZ">Azerbaijan</option><option value="AP">Azores</option><option value="BS">Bahamas</option>
                                                                <option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option>
                                                                <option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option>
                                                                <option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option>
                                                                <option value="BO">Bolivia</option><option value="BL">Bonaire</option><option value="BA">Bosnia</option>
                                                                <option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option>
                                                                <option value="VG">British Virgin Islands</option><option value="BN">Brunei</option><option value="BG">Bulgaria</option>
                                                                <option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option>
                                                                <option value="CM">Cameroon</option><option value="CA">Canada</option><option value="IC">Canary Islands</option>
                                                                <option value="CV">Cape Verde Islands</option><option value="KY">Cayman Islands</option>
                                                                <option value="CF">Central African Republic</option><option value="TD">Chad</option>
                                                                <option value="GB-CHA">Channel Islands</option><option value="CL">Chile</option><option value="CN">China</option>
                                                                <option value="CX">Christmas Island</option><option value="CC">Cocos (keeling) Islands</option>
                                                                <option value="CO">Colombia</option><option value="CG">Congo</option><option value="CK">Cook Islands</option>
                                                                <option value="CR">Costa Rica</option><option value="CI">Cote Divoire</option><option value="HR">Croatia</option>
                                                                <option value="CU">Cuba</option><option value="CB">Curacao</option><option value="CY">Cyprus</option>
                                                                <option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option>
                                                                <option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option>
                                                                <option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equitorial Guinea</option>
                                                                <option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option>
                                                                <option value="FO">Faeroe Islands</option><option value="FK">Falkland Islands (Malvinas)</option>
                                                                <option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option>
                                                                <option value="GF">French Guiana</option><option value="PF">French Polynesia</option>
                                                                <option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option>
                                                                <option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option>
                                                                <option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option>
                                                                <option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option>
                                                                <option value="GT">Guatemala</option><option value="GG">Guernsey</option><option value="GN">Guinea</option>
                                                                <option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option>
                                                                <option value="HM">Heard Island and Mcdonald Islands</option><option value="HO">Holland</option>
                                                                <option value="VA">Holy See (Vatican City State)</option><option value="HN">Honduras</option>
                                                                <option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option>
                                                                <option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option>
                                                                <option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IM">Isle of Man</option>
                                                                <option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option>
                                                                <option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option>
                                                                <option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option>
                                                                <option value="KP">Korea, Democratic People's Republic of</option><option value="KR">Korea, Republic of</option>
                                                                <option value="KO">Kosrae</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option>
                                                                <option value="LA">Laos</option><option value="LV">Latvia</option><option value="LB">Lebanon</option>
                                                                <option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libyan Arab Jamahiriya</option>
                                                                <option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option>
                                                                <option value="MO">Macau</option><option value="MK">Macedonia, Republic of</option><option value="MG">Madagascar</option>
                                                                <option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option>
                                                                <option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option>
                                                                <option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option>
                                                                <option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia, Federated States of</option>
                                                                <option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option>
                                                                <option value="ME">Montenegro, Republic of</option><option value="MS">Montserrat</option><option value="MA">Morocco</option>
                                                                <option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option>
                                                                <option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option>
                                                                <option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option>
                                                                <option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option>
                                                                <option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="NB">Northern Ireland</option>
                                                                <option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option>
                                                                <option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PS">Palestinian Territory, Occupied</option>
                                                                <option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option>
                                                                <option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn Island</option>
                                                                <option value="PL">Poland</option><option value="PO">Ponape</option><option value="PT">Portugal</option>
                                                                <option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="RE">Reunion</option>
                                                                <option value="RO">Romania</option><option value="RT">Rota</option><option value="RU">Russia</option>
                                                                <option value="RW">Rwanda</option><option value="SS">Saba</option><option value="SP">Saipan</option>
                                                                <option value="SM">San Marino</option><option value="ST">Sao Tome and Principe</option><option value="SA">Saudi Arabia</option>
                                                                <option value="SF">Scotland</option><option value="SN">Senegal</option><option value="RS">Serbia, Republic of</option>
                                                                <option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option>
                                                                <option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option>
                                                                <option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="ES">Spain</option>
                                                                <option value="LK">Sri Lanka</option><option value="NT">St. Barthelemy</option><option value="SW">St. Christopher</option>
                                                                <option value="EU">St. Eustatius</option><option value="UV">St. John</option><option value="KN">St. Kitts &amp; Nevis</option>
                                                                <option value="LC">St. Lucia</option><option value="MB">St. Maarten</option><option value="SX">St. Maarten</option>
                                                                <option value="TB">St. Martin</option><option value="VL">St. Thomas</option>
                                                                <option value="VC">St. Vincent &amp; the Grenadines</option><option value="SD">Sudan</option>
                                                                <option value="SR">Suriname</option><option value="SZ">Swaziland</option> -->
                                                                <option value="SE">Sweden</option>
                                                                <!-- <option value="CH">Switzerland</option><option value="SY">Syrian Arab Republic</option><option value="TA">Tahiti</option>
                                                                <option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option>
                                                                <option value="TH">Thailand</option><option value="TL">Timor-Leste</option><option value="TI">Tinian</option>
                                                                <option value="TG">Togo</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option>
                                                                <option value="TU">Truk</option><option value="TN">Tunisia</option><option value="TR">Turkey</option>
                                                                <option value="TM">Turkmenistan</option><option value="TC">Turks &amp; Caicos Islands</option><option value="TV">Tuvalu</option>
                                                                <option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="UI">Union Island</option>
                                                                <option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option>
                                                                <option value="US">United States</option><option value="UY">Uruguay</option><option value="VI">US Virgin Islands</option>
                                                                <option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VE">Venezuela</option>
                                                                <option value="VN">Vietnam</option><option value="VR">Virgin Gorda</option><option value="WK">Wake Island</option>
                                                                <option value="WL">Wales</option><option value="WF">Wallis and Futuna</option><option value="EH">Western Sahara</option>
                                                                <option value="WS">Western Samoa</option><option value="YA">Yap</option><option value="YE">Yemen</option>
                                                                <option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option> -->
                                                            </select>
                                                            <span class="required-indicator"></span>
                                                        </label>
                                                    </div>
                                                    <div class="chkField col-sm-4 state-select clearfix">
                                                        <label for="shipping_state" class="validation-field labelholder has-labelholder floating" data-label="State">
                                                            <select id="shipping_state" name="shipping_state" tabindex="13" class="form-control txtBoxStyle" required="">
                                                                <option value="">Select State</option>
                                                                <!-- <option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option>
                                                                <option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option>
                                                                <option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District of Columbia</option>
                                                                <option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option>
                                                                <option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option>
                                                                <option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option>
                                                                <option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option>
                                                                <option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option>
                                                                <option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option>
                                                                <option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option>
                                                                <option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option>
                                                                <option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option>
                                                                <option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option>
                                                                <option value="PR">Puerto Rico</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
                                                                <option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option>
                                                                <option value="UT">Utah</option><option value="VT">Vermont</option><option value="VI">Virgin Islands</option>
                                                                <option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option>
                                                                <option value="WI">Wisconsin</option><option value="WY">Wyoming</option> -->
                                                                <option value="AG">Ångermanland</option><option value="BL">Blekinge</option><option value="BH">Bohuslän</option>
                                                                <option value="KO">Dalarna</option><option value="DL">Dalsland</option><option value="GT">Gotland</option>
                                                                <option value="GK">Gästrikland</option><option value="HA">Halland</option><option value="HG">Hälsingland</option>
                                                                <option value="HJ">Härjedalen</option><option value="JA">Jämtland</option><option value="LP">Lappland</option>
                                                                <option value="MD">Medelpad</option><option value="NB">Norrbotten</option><option value="NA">Närke</option>
                                                                <option value="OL">Öland</option><option value="OG">Östergötland</option><option value="SN">Skåne</option>
                                                                <option value="SM">Småland</option><option value="SD">Södermanland</option><option value="UL">Uppland</option>
                                                                <option value="VR">Värmland</option><option value="VM">Västmanland</option><option value="VB">Västerbotten</option>
                                                                <option value="VG">Västergötland</option>
                                                            </select>
                                                            <span class="required-indicator"></span>
                                                        </label>
                                                    </div>
                                                    <div class="chkField col-sm-3 clearfix">
                                                        <label for="shipping_zip" class="validation-field labelholder has-labelholder" data-label="Zip">
                                                            <input name="shipping_zip" type="text" id="shipping_zip" value="" placeholder="Zip" size="10" tabindex="28" maxlength="20" class="form-control txtBoxStyle"  required="">
                                                            <span class="required-indicator"></span>
                                                        </label>
                                                    </div>
                                                    <div class="chkField col-sm-12 clearfix">
                                                        <label for="shipping_phone" class="validation-field labelholder has-labelholder" data-label="Phone">
                                                            <input name="shipping_phone" type="text"  id="shipping_phone" value="" placeholder="Phone" tabindex="29" maxlength="50" class="form-control txtBoxStyle" required="">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="customGateway dpm-provider">
                                        <h4>
                                        <label for="offline-42">
                                        <input onclick="javascript:checkoutSwitch(false);controlDivPayment('42-custom');" id="offline-42" name="payment" type="radio" value="offline-42" checked="">
                                        Money Order
                                        </label>
                                        </h4>
                                        <div class="clear"></div>
                                        <div id="divPaymentOption42-custom" name="divPaymentOption" style="">
                                        <div class="payment-desc"></div>
                                        <div class="payment-type">Money Order</div>

                                        <div class="clear"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>-->
                                </div>
                                <input type="hidden" name="hdn3dCCFKey" id="hdn3dCCFKey" value="wtcyqiwxz1kCu8O1a2vngV+eIX8bO5+QLu9AQHj5bU4=">
                            </div>
                            <div id="divCheckoutComments" class="checkout-section">
                                <div class="header clearfix">
                                    <h3 class="page_heading">Comments</h3>
                                </div>
                                <div class="chkComments clearfix">
                                    <label for="comment">Please provide us with any additional information which may help complete your order.</label>
                                    <textarea  name="comment" class="form-control txtBoxStyle" cols="55" rows="5"></textarea>
                                </div>
                            </div>
                            <div id="spanCheckout" class="checkout-section clearfix">
                                <a href="<?= base_url() ?>cart" class="btn btn-link"><i class="icon-left"></i> Return to Cart</a>
                                <div class="pull-right">
                                    <?php
                                        if(empty($_SESSION['loggedin']))
                                        {
                                    ?>
                                            <button type="submit"  class="btn btn-lg btn-primary" id="submit-button" disabled><i class="icon-basket"></i> Check out</button>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                            <button type="submit"  class="btn btn-lg btn-primary" id="submit-button"><i class="icon-basket"></i> Check out</button>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div id="divCheckout" name="divCheckout" class="alert alert-success" style="display:none;">
                                <strong>Processing...</strong>
                            </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $('input[name="sameasbilling_radio"]:radio').change(function ()
                {
                    var selected_radio_value = $("input[name=sameasbilling_radio]:checked").val();
                    if(selected_radio_value == 'billing'){
                    $('#notsameasbilling_box').hide();
                    $('#sameAsBilling').val('billing');
                    }
                    if(selected_radio_value == 'shipping'){
                    $('#notsameasbilling_box').show();
                    $('#sameAsBilling').val('shipping');
                    }
                });
                $('#password, #confirmpassword').on('keyup', function () 
                {
                    if ($('#password').val() == $('#confirmpassword').val())
                    {
                        $('#message').html('Matching').css('color', 'green');
                        $('.btn').attr("disabled", false);
                        
                    }
                    else
                    {
                        $('#message').html("Passwords Don't Match").css('color', 'red');
                        $('.btn').attr("disabled", true);
                    }
                });
	        });
        </script>
    </body>
</html>