<div class="section">
	<div class="container">
		<div class="row" >
			<div class="col-md-12 order-details">
				<div class="section-title text-center">
					<h3 class="title">your cart</h3>
				</div>
				<div class="order-summary">
					<div class="order-col">
						<div><strong>PRODUCT</strong></div>
						<div align="center"><strong>TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div>
					</div>
						<?php foreach($this->cart->contents() as $items){ ?>
						<div class="order-col">
							<div>1x <?php echo $items['name']?></div>
							<div>₹ <?php echo $this->cart->format_number($items['price'])?> &nbsp;&nbsp;&nbsp;&nbsp; 
								<button style="background-color: #D10024; color: white" class="btn" onclick="removefromcart('<?php echo $items['rowid']?>')">
									<i class="fa fa-times"></i>
								</button>
							</div>
						</div>
						<?php }?>
					<div class="order-col">
						<div><strong>TOTAL</strong></div>
						<?php 
							$sum = 0;
							$flag = 0;
							foreach($this->cart->contents() as $items){
								$flag = $flag +1;
								$sum = $sum + $items['price'];
							}
						?>
						<div><strong class="order-total">₹ <?php echo $this->cart->format_number($sum);?></strong></div>
					</div>
				</div>			
				<div class="col-md-3"></div>	 
				<div class="col-md-6" align="center">
				<a href="#" onclick="placeorder('<?php echo $session_data['email']?>')" class="primary-btn order-submit">Place order</a>
			</div>
			</div>
		</div>
	</div>
</div>

<script>
	function removefromcart(rowid){
		$.post("<?php echo base_url()?>Cart_cont/removefromcart",{
            rowid:rowid,
        },function(data){
        	alert('Removed from cart');
            window.location.href = "<?php echo base_url()?>View-Cart";
        });
	}

	function placeorder(email){
		<?php if($this->session->logged_in){?>
			$.post("<?php echo base_url()?>Cart_cont/placeorder",{
				email:email
	        },function(data){
	        	alert('Order Placed!');
	            window.location.href = "<?php echo base_url()?>Orders";
	        });
        <?php }else{?>
        	alert("Please login to place order!");
        	window.location.href = "<?php echo base_url()?>Login";	
		<?php }?>
	}	
</script>