<?php
header( 'Content-Type: application/xml' );
echo '<?xml version="1.0" encoding="UTF-8"?>';
/*echo '<?xml-stylesheet type="text/xsl" href="' . base_url() . 'assets/css/xml-sitemap.xsl"?>'; /*/
echo "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';
echo "\n";
    echo '<url>
        <loc>'.base_url().'</loc>
        <changefreq>Daily</changefreq>
        </url>';
    echo '<url>
        <loc>'.base_url().'about-us</loc>
        <changefreq>Daily</changefreq>
        </url>';
    echo '<url>
        <loc>'.base_url().'contact-us</loc>
        <changefreq>Daily</changefreq>
        </url>';
    echo '<url>
        <loc>'.base_url().'checkout</loc>
        <changefreq>Daily</changefreq>
        </url>';
    echo '<url>
        <loc>'.base_url().'cart</loc>
        <changefreq>Daily</changefreq>
        </url>';
        echo '<url>
        <loc>'.base_url().'userRegistrationuser</loc>
        <changefreq>Daily</changefreq>
        </url>';
    echo '<url>
        <loc>'.base_url().'userlogin</loc>
        <changefreq>Daily</changefreq>
        </url>';
    echo '<url>
        <loc>'.base_url().'login</loc>
        <changefreq>Daily</changefreq>
        </url>';
    echo '<url>
        <loc>'.base_url().'dashboard</loc>
        <changefreq>Daily</changefreq>
        </url>';
    echo '<url>
        <loc>'.base_url().'blogs</loc>
        <changefreq>Daily</changefreq>
        </url>';
  
  if(!empty($blogs)) { foreach($blogs as $blog) {
    echo '<url>
        <loc>'.base_url().'blog/'.$blog['title_slug'].'</loc>
        <changefreq>Daily</changefreq>
        </url>';
  }}
  echo '<url>
        <loc>'.base_url().'faqs</loc>
        <changefreq>Daily</changefreq>
        </url>';
  
  if(!empty($faqs)) { foreach($faqs as $faq) {
    echo '<url>
        <loc>'.base_url().'faqs/'.$faq['title_slug'].'</loc>
        <changefreq>Daily</changefreq>
        </url>';
  }}
  if(!empty($policies)) { foreach($policies as $policy) {
    echo '<url>
        <loc>'.base_url().'policy/'.$policy['title_slug'].'</loc>
        <changefreq>Daily</changefreq>
        </url>';
  }}
  echo '<url>
        <loc>'.base_url().'cigarbrand</loc>
        <changefreq>Daily</changefreq>
        </url>';
   if(!empty($displaybrands)) { foreach($displaybrands as $brands) {
    echo '<url>
        <loc>'.base_url().'brands/'.$brands['brand_slug'].'</loc>
        <changefreq>Daily</changefreq>
        </url>';
  }}
   echo '<url>
        <loc>'.base_url().'cigars</loc>
        <changefreq>Daily</changefreq>
        </url>';
  if(!empty($cigarnames)) { foreach($cigarnames as $cigars) {
    echo '<url>
        <loc>'.base_url().'product/'.$cigars['product_slug'].'</loc>
        <changefreq>Daily</changefreq>
        </url>';
  }}

  
echo '</urlset>';
?>