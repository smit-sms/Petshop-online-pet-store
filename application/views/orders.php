<div class="section">
	<div class="container">
		<div class="row">
			<div id="store" class="col-md-12">
				<div class="row"><br>
					<h1>&nbsp;&nbsp;MY ORDERS</h1>
					<div id="breadcrumb" class="section">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<ul class="breadcrumb-tree">
										<li><a href="<?php echo base_url()?>">Home</a></li>										
										<li class="active">My Orders</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">							
							<h3 class="aside-title"><a href="<?php echo base_url()?>My-Account">My Profile</a></h3>
							<h3 class="aside-title"><a href="<?php echo base_url()?>Orders" class="active" style="color:#D10024;">Orders</a></h3>
						</div><br><br>
						<!-- /aside Widget -->							
					</div>

					<div class="col-md-8 order-details">
						<div class="section-title text-center">
							<h3 class="title" style="color: #D10024;">Your ORDER</h3>
						</div>
						<div class="order-summary">
						<div class="order-col">
							<div><strong>PRODUCT</strong></div>
							<div><strong>TOTAL</strong></div>
						</div>
						<?php foreach($orders as $ord){?>
							<div class="order-products">
								<div class="order-col">
									<div><?php echo $ord['qty']?>x <?php echo $ord['prod_name'] ?></div>
									<div><?php echo "₹ " .$this->cart->format_number($ord['prod_price']) ?></div>
								</div>
							</div>
						<?php }?>
						<div class="order-col">
								<div><strong>Shiping</strong></div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<?php 
									$sum = 0;
									foreach($orders as $ord){
										$sum = $sum + $ord['qty']*$ord['prod_price'];
									}
								?>
								<div><strong class="order-total">₹ <?php echo $this->cart->format_number($sum);?></strong></div>
							</div>
						</div>
						<div class="order-col" align="center">
							<?php if($sum > 0){?>	
								<img src="https://d30mle0t4iy75h.cloudfront.net/website/track-order-status-1.png"><br><br>
								<div><h2>ORDER PLACED !</h2></div>
							<?php }else{?>
								<div><h2 style="color: #D10024;">NO ORDER PLACED !</h2></div>
							<?php }?>
						</div>
					</div>					

				</div>
			</div>
		</div>
	</div>
</div>