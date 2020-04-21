<div class="section">
	<div class="container">
		<div class="row">
			<div id="store" class="col-md-12">
				<div class="row"><br>
					<h1>&nbsp;&nbsp;MY ACCOUNT</h1>
					<div id="breadcrumb" class="section">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<ul class="breadcrumb-tree">
										<li><a href="<?php echo base_url()?>">Home</a></li>										
										<li class="active">My Account</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">							
							<h3 class="aside-title"><a href="<?php echo base_url()?>My-Account" class="active" style="color:#D10024;">My Profile</a></h3>
							<h3 class="aside-title"><a href="<?php echo base_url()?>Orders">Orders</a></h3>
						</div><br><br>
						<!-- /aside Widget -->							
					</div>

					<div class="col-md-8 order-details">
						<div class="section-title text-center">
							<h3 class="title" style="color: #D10024;">Your Details</h3>
						</div>
						<?php foreach($account as $acc){?>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>NAME</strong></div>
								<div><strong><?php echo strtoupper($acc['first_name']." ".$acc['last_name']);?></strong></div>
							</div>
							<div class="order-col">
								<div><strong>EMAIL</strong></div>
								<div><strong><?php echo strtoupper($acc['email']);?></strong></div>
							</div>
							<div class="order-col">
								<div><strong>ADDRESS</strong></div>
								<div><strong><?php echo $acc['address'];?></strong></div>
							</div>
							<div class="order-col">
								<div><strong>CONTACT NUMBER</strong></div>
								<div><strong><?php echo $acc['phone'];?></strong></div>
							</div>
							<div class="order-col">
								<div><strong>GENDER</strong></div>
								<div><strong><?php if($acc['gender'] == "M"){ echo "MALE";}else{echo "FEMALE";}?></strong></div>
							</div>
							<div class="order-col">
								<div><strong>REGISTERED ON</strong></div>
								<div><strong><?php echo $acc['registered_on'];?></strong></div>
							</div>
							
						</div>
						<?php }?>
					</div>					

				</div>
			</div>
		</div>
	</div>
</div>