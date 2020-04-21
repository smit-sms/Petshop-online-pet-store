<div class="section">
	<div class="container">
		<div class="row">
			<div id="store" class="col-md-12">
				<div class="row"><br>
					<h1>&nbsp;&nbsp;PETS</h1>
					<div id="breadcrumb" class="section">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<ul class="breadcrumb-tree">
										<li><a href="<?php echo base_url()?>">Home</a></li>
										<?php foreach($cats as $catss){?>
											<li class="active"><?php echo $catss['cat_name']?></li>
										<?php }?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- product -->
					<?php foreach($prod_cat as $products){?>
						<div class="col-md-4 col-xs-6">
							<div class="product">
								<div class="product-img">
									<img src="<?php echo base_url()?>/assets/img/<?php echo $products['prod_img']?>" style="height: 300px;" >
								</div>
								<div class="product-body">
									<p class="product-category"><b>
										<?php
											foreach($cat as $category){
												if($products['cat_id'] == $category['cat_id']){
													echo $category['cat_name'];
												}
											}
										?></b>
									</p>
									<h3 class="product-name"><a href="#"><?php echo $products['prod_name']?></a></h3>
									<p><?php echo $products['prod_desc'] ?></p>
									<h4 class="product-price">₹ <?php echo $this->cart->format_number($products['prod_price']) ?></h4>
								</div>
								<div class="add-to-cart">
									<input type="hidden" name="addtocart" id="addtocart" value="<?php echo $products['prod_id'];?>" class="addcart">
									<button class="add-to-cart-btn" id="addbtn" name="addbtn" onclick="addtocart('<?php echo $products['prod_id'];?>')">
										<i class="fa fa-shopping-cart"></i> add to cart
									</button>
								</div>
							</div><br><br><br>
						</div>
					<?php }?>
					<!-- /product -->					
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function addtocart(prod_id){
	 	$.post("<?php echo base_url()?>Cart_cont/addtocart",{
            prod_id:prod_id,
        },function(data){
            alert("Added to cart successfully!");
            window.location.href = "<?php echo base_url()?>View-Cart";
        });
	}
</script>