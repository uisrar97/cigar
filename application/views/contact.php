<section class="breadcrumnb">
    <div class="container">
        <ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="clearfix">
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="<?= base_url()?>" itemprop="item"><span itemprop="name">Home</span></a></li>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><span itemprop="name">Contact Us</span></li>
        </ol>
    </div>
</section>
<section style="padding: none;" class="products-section wow fadeInUp">
    <div class="container">
        <h1 class="page_heading mdi md-local-offer">Contact Us:</h1>
        <div class="contact-wraper">
            <form class="row" action="<?= base_url() ?>send-message" method="POST">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Your Name*" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address*" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="textarea-group">
                        <textarea class="form-textarea form-control" name="message" rows="5" placeholder="Your Message" id="message" required></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="button-contact-form">
                        <input type="submit" class="mailinglist-submit btn btn-default submit" value="Send Your Message" style="width: 15%; background-color: #502701C7; color: white;">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- </body>
</html> -->