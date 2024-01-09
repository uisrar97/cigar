<footer class="site-footer">
	<div class="container">
  	    <div class="row">
  		    <div class="col-md-8">
                <!-- <div class="visible-xs extrapages-shower">
                <a href="<?= base_url() ?>" role="button" data-toggle="collapse" class="collapsed">Pages</a>
                </div> -->
                <div id="FRAME_LINKS">
                    <h4><b>Mr Andersons Cigars</b></h4>
                    <br>
                    <ul id="extrapages" class="list-unstyled row extrapages">
                        <li class="col-sm-4"><a href="<?= base_url() ?>about-us" target="_self" class="menu-bottom"><i class="icon-play"></i> About Us</a></li>
                        <li class="col-sm-4"><a href="<?= base_url() ?>contact-us" class="menu" target="_self" class="menu-bottom"><i class="icon-play"></i> Contact Us</a></li>
                        <!-- <li class="col-sm-4"><a href="<?= base_url() ?>" target="_self" class="menu-bottom"><i class="icon-play"></i> My Account</a></li> -->
                        <li class="col-sm-4"><a href="<?= base_url() ?>brands" target="_self" class="menu-bottom"><i class="icon-play"></i> Cigar Brands</a></li>
                        <li class="col-sm-4"><a href="<?= base_url() ?>cigars" target="_self" class="menu-bottom"><i class="icon-play"></i> Cigars</a></li>
                        <!-- <li class="col-sm-4"><a href="<?= base_url() ?>" target="_self" class="menu-bottom"><i class="icon-play"></i> <b>Theme Style</b></a></li>
                        <li class="col-sm-4"><a href="<?= base_url() ?>" target="_self" class="menu-bottom"><i class="icon-play"></i> <b>Wishlist</b></a></li>
                        <li class="col-sm-4"><a href="<?= base_url() ?>" target="_self" class="menu-bottom"><i class="icon-play"></i> <b>Become an Affiliate</b></a></li>
                        <li class="col-sm-4"><a href="<?= base_url() ?>" target="_self" class="menu-bottom"><i class="icon-play"></i> <b>Product Index</b></a></li>
                        <li class="col-sm-4"><a href="<?= base_url() ?>" target="_self" class="menu-bottom"><i class="icon-play"></i> <b>Category Index</b></a></li> -->
                        <li class="col-sm-4"><a href="<?= base_url() ?>faqs" target="_self" class="menu-bottom"><i class="icon-play"></i> FAQs</a></li>
                    </ul>
                    <h4><b>Policies</b></h4>
                    <br>
                    <ul id="extrapages" class="list-unstyled row extrapages">
                        <?php
                            foreach ($policies as $val)
                            {?>
                                <li class="col-sm-4"><a href="<?= base_url() ?>policy/<?= $val['title_slug']?>" target="_self" class="menu-bottom"><i class="icon-play"></i> <?= $val['policy_name']?></a></li>
                        <?php    }?>
                        <!-- <li class="col-sm-4"><a href="<?= base_url() ?>terms-of-service" target="_self" class="menu-bottom"><i class="icon-play"></i> Terms of Service</a></li>
                        <li class="col-sm-4"><a href="<?= base_url() ?>integrity-policy" target="_self" class="menu-bottom"><i class="icon-play"></i> <b>GDRP or GDPR</b>/Integrity Policy</a></li>
                        <li class="col-sm-4"><a href="<?= base_url() ?>shipping-policy" target="_self" class="menu-bottom"><i class="icon-play"></i> Shipping Policy</a></li>
                        <li class="col-sm-4"><a href="<?= base_url() ?>return-policy" target="_self" class="menu-bottom"><i class="icon-play"></i> Return Policy</a></li>
                        <li class="col-sm-4"><a href="<?= base_url() ?>newsletter-policy" target="_self" class="menu-bottom"><i class="icon-play"></i> Newsletter Policy</a></li> -->
                    </ul>
                </div>
  		    </div>
            <div class="col-md-4">
                <div class="mailist-box ajax-mailinglist" data-callfront="mailinglist_callfront" data-callback="mailinglist_response">
                    <form method="post" name="mailing" action="" id="newsletter">
                        <p>Subscribe to our Newsletter</p>
                        <div class="mailinglist-form clearfix">
                            <input class="mailinglist-input form-control" type="email" name="email" placeholder="Enter your email address" autocomplete="off">
                            <button class="mailinglist-submit btn btn-default submit" type="submit" name="send" style="margin-top:0px;">
                                <span id="mailing-btn-txt"><i class="icon-right"></i></span>
                                <span id="mailing-btn-load" class="mailing-btn-load icon-spin2 animate-spin hidden"></span>
                            </button>
                        </div>
                        <div class="clearfix maillist-options">
                            <div class="subscribe">
                                <input id="list_subscribe" type="radio" name="subscribe" value="1" checked="checked">
                                <label for="list_subscribe">Subscribe</label>
                            </div>
                            <div class="subscribe">
                                <input id="list_unsubscribe" type="radio" name="subscribe" value="0">
                                <label for="list_unsubscribe">Unsubscribe</label>
                            </div>
                        </div>
                    </form>
                    <div id="mailinglist-response" class="mailinglist-response">
                        <div class="mailinglist-error hidden">
                            <span class="icon-attention"></span>
                            <span class="" icon-attention""=""></span>
                            <strong>Ooop!</strong> The email you entered isn't valid.
                        </div>
                        <div class="mailinglist-subscribed hidden">
                            <span class="icon-ok"></span>
                            <span class="icon-ok"></span>
                            <strong>WooHoo!</strong> You subscribed successfully.
                        </div>
                        <div class="mailinglist-unsubscribed hidden">
                            <span class="icon-ok"></span>
                            <span class="icon-ok"></span>
                            <strong>Ok!</strong> You're unsubscribed.
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                    <?php 
                    if(!empty($facebook_url) || !empty($twitter_url) || !empty($google_url) || !empty($instagram_url) || !empty($pinterest_url))
                    { ?>
                        <ul class="social-icons list-unstyled list-inline">
                            <?php if(!empty($facebook_url))
                            {?>
                                <li><a href="<?= base_url() ?>#" class="facebook" target="_blank" title="Like Us on Facebook"><span class="icon-facebook"></span></a></li>
                            <?php
                            }?>

                            <?php if(!empty($twitter_url))
                            {?>
                                <li><a href="<?= base_url() ?>#" class="twitter" target="_blank" title="Follow Us on Twitter"><span class="icon-twitter"></span></a></li>
                            <?php
                            }?>

                            <?php if(!empty($google_url))
                            {?>
                                <li><a href="<?= base_url() ?>#" class="gplus" target="_blank" title="Follow Us on Google+"><span class="icon-gplus"></span></a></li>
                            <?php
                            }?>

                            <?php if(!empty($instagram_url))
                            {?>
                                <li><a href="<?= base_url() ?>#" class="instagram" target="_blank" title="Follow Us on Instagram"><span class="icon-instagram"></span></a></li>
                            <?php
                            }?>

                            <?php if(!empty($pinterest_url))
                            {?>
                                <li><a href="<?= base_url() ?>#" class="pinterest" target="_blank" title="Follow Us on Pinterest"><span class="icon-pinterest"></span></a></li>
                            <?php
                            }?>
                            <!-- <li><a href="<?= base_url() ?>#" class="linkedin" target="_blank" title="Connect With Us on Linked In"><span class="icon-linkedin"></span></a></li> -->
                        </ul>
                    <?php } ?>
                </div>
            </div>
		</div>
		<div class="container copyright">
		    <div class="row">
		        <div class="col-sm-8">
		            <div class="copyright_txt">
		                <p><?php echo $getsettings['copyright'];?></p>
		            </div>
		        </div>
		        <div class="col-sm-4">
                    <div class="global-footer pull-right">
                        <img src="<?= base_url() ?>assets/images/3dcart/cards-cv.png" alt=" cards-cv.png">
                    </div>
                </div>
		    </div>
		</div>
    </div>
</footer>

<a href="#" class="scrollToTop"><i class="icon-angle-up icon-2x"></i> <span>TOP</span></a>
<nav id="mobile-menu" class="mobile-menu">
    <div class="mobile-menu-inner">
        <div class="mobile-menu-close">
            <a href="#"></a>
        </div>
        <div class="mobile-menu-widget">
            <h3>Menu Links</h3>
            <div id="mobile-menulinks"></div>
        </div>
        <div class="mobile-menu-widget">
            <h3>Categories</h3>
            <div id="mobile-categories"></div>
        </div>
    </div>
</nav>

<aside id="qv-modal" class="qv qv-modal modal" tabindex="-1" role="dialog" data-catalogid="" data-price="0" data-sku="" data-backdrop="true">
    <div class="modal-dialog" role="document">
        <div class="modal-vcenter">
            <div class="qv-loader">
                <span class="mailing-btn-load icon-spin2 animate-spin"></span>
            </div>
            <div class="product-item modal-content">
                <button type="button" class="qv-close close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <iframe id="qvIframe" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</aside>


<!-- <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title" id="resetPWLabel">Store Search</h4>
</div>
<div class="modal-body">
<div id="searchBox" class="searchBox">
<form method="get" name="searchForm" action="http://cigar-venue-preview-com.3dcartstores.com/search.asp">
<div class="search-form">
<input type="text" id="searchlight" name="keyword" value="" placeholder="Search" class="search-text form-control" />
<button type="submit" class="search-submit btn btn-default btn-inverse"><span class="icon-search"></span></button>
</div>
</form>
<div class="clear"></div>
</div>
</div>
</div>
</div>
</div> -->

<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">
<link rel="StyleSheet" href="<?= base_url() ?>assets/templates/common-core/lib/fontello/css/fontellocfc9.css?vcart=9.1.8" type="text/css" />
<link rel="StyleSheet" href="<?= base_url() ?>assets/templates/common-core/lib/fontello/css/animationcfc9.css?vcart=9.1.8" type="text/css" />
<link rel="stylesheet" href="<?= base_url() ?>assets/templates/common-core/lib/animate-me/animatecfc9.css?vcart=9.1.8" type="text/css" media="screen" />

<script src="<?= base_url() ?>assets/templates/common-core/lib/bootstrap/js/bootstrapcfc9.js?vcart=9.1.8"></script>
<script src="<?= base_url() ?>assets/templates/common-core/js/corecfc9.js?vcart=9.1.8"></script>
<script src="<?= base_url() ?>assets/templates/cigarvenue-core/js/maincfc9.js?vcart=9.1.8"></script>
<script src="<?= base_url()?>assets/snapwidget.com/js/snapwidget.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/templates/common-core/lib/flexslider/jquery.flexslider-mincfc9.js?vcart=9.1.8"></script>
<script type="text/javascript" src="<?= base_url()?>assets/cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

<script type="text/javascript" charset="utf-8">
    jQuery(function ()
    {
        jQuery('.homeCarousel').flexslider(
        {
            animation: jQuery(this).data('animation'),
            slideshowSpeed: jQuery(this).data('slideshowSpeed'),
            controlNav: false,
            keyboard: false
        });

        jQuery('#carousel-sellers').slick(
        {
            dots: false,
            infinite: false,
            speed: 300,
            appendArrows: jQuery('.TSnav'),
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: 
            [
                {
                    breakpoint: 1024,
                    settings:
                    {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings:
                    {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings:
                    {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>

<script type="text/javascript" charset="utf-8">
    jQuery(function ()
    {
        var $window = jQuery(window),
            win_height_padded = $window.height() * 1.1;
			$window.on('scroll', revealOnScroll);

        function revealOnScroll()
        {
            var scrolled = $window.scrollTop(),
            win_height_padded = $window.height() * 1.1;

            // Showed...
            $(".revealOnScroll:not(.animated)").each(function ()
            {
                var $this = $(this),
                offsetTop = $this.offset().top;

                if (scrolled + win_height_padded > offsetTop)
                {
                    if ($this.data('timeout'))
                    {
                        window.setTimeout(function ()
                        {
                            $this.addClass('animated ' + $this.data('animation'));
                            $this.removeClass('revealOnScroll');
                        }, 
                        parseInt($this.data('timeout'), 10));
                    } 
                    else
                    {
                        $this.addClass('animated ' + $this.data('animation'));
                        $this.removeClass('revealOnScroll');
                    }
                }
            });
            // Hidden...
            $(".revealOnScroll.animated").each(function (index)
            {
                var $this = $(this),
                offsetTop = $this.offset().top;
                if (scrolled + win_height_padded < offsetTop)
                {
                    $(this).removeClass('revealOnScroll animated');
                }
            });
        }
        revealOnScroll();
    });
    base_url = '<?=base_url()?>';
    $('#newsletter').on('submit',function(e) 
    {
        var postData=new FormData(this);
        e.preventDefault();
        e.stopImmediatePropagation();
        $.ajax({
            url : base_url+"news-letter",
            type: "POST",
            data : postData,
            dataType:"json",
            mimeType:"multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            async:true
        });
        $('#newsletter').trigger('reset');
    });
</script>


<link rel="stylesheet" href="<?= base_url() ?>assets/templates/common-html5/quicksearch/quicksearchcfc9.css?vcart=9.1.8" type="text/css" media="screen" />
<script type="text/javascript" src="<?= base_url() ?>assets/templates/common-html5/quicksearch/jquery.quicksearchcfc9.js?vcart=9.1.8"></script>
<script type="text/javascript">
    // jQuery(function () {
    //     jQuery('#searchlight').searchlight('search_quick.html');
    // });
</script>

<script type="text/javascript">var _cart_secure_url = "https://cigar-venue-preview-com.3dcartstores.com"</script><script>(new Image()).src = 'http://cigar-venue-preview-com.3dcartstores.com/3dvisit.asp'</script>