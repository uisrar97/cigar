

<ul id="list" style="list-style:none;margin-left: -39px !important;    box-shadow: 0 0 5px 0;margin-top: 2px;    padding-left: 10px;    padding-bottom: 10px; padding-top: 10px;">

<?php foreach ($products as $key => $value) { ?>

	<a href="<?= base_url() ?>product/<?= $value['product_slug'] ?>" style="text-decoration:none" ><li style="color:#000;padding:5px 0;" ><?php echo  $value['name'] ?></li></a>	

<?php } ?>
<?php foreach ($brands as $key => $value) { ?>

	<a href="<?= base_url() ?>brand/<?= $value['brand_slug']  ?>" style="text-decoration:none"  ><li style="color:#000;padding:5px 0;" ><?php echo  $value['brand_name'] ?></li></a>	

<?php } ?>
<?php if(empty($brands) && empty($products)){ ?>

	<li>No record found</li>	

<?php } ?>  


</ul>