<style>
	.order-details:before{
		/*background-color: #333; */
		border-color: #D10024;
	}
	.section{
		padding-bottom: 0px;
	}
	.order-details{
		border-color: #D10024;
	}
	input:focus{
		outline: none ;
    	border:1px solid #D10024;
	}
	textarea:focus{
		outline: none ;
    	border:1px solid #D10024;
	}
</style>
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 order-details"  >
				<div class="section-title text-center">
					<h3 class="title">Register</h3>
				</div>
				<div class="order-summary">
					<form method="POST">
						<div class="row">
							<div class="col-md-6">
								<strong>FIRST NAME:</strong>
									<input type="text" name="first_name" id="first_name" class="input" placeholder="John"><br><br>
							</div>
							<div class="col-md-6">
								<strong>LAST NAME:</strong>
									<input type="text" name="last_name" id="last_name" class="input" placeholder="Doe"><br><br>
							</div>
						</div>
						<strong>EMAIL:</strong> 
							<input type="text" name="email" id="email" class="input" placeholder="abc@gmail.com"><br><br>
						<strong>ADDRESS:</strong>
							<textarea name="address" id="address" class="input"></textarea><br><br>
						<div class="row">
							<div class="col-md-6">	
								<strong>PHONE:</strong>
									<input type="text" name="phone" id="phone" class="input"><br><br>
							</div>
							<div class="col-md-6">	
								<strong>GENDER:</strong><br>
								<div class="row" style="padding-top: 10px;">
									<div class="col-md-6">
										<input type="radio" name="gender" value="M"> MALE
									</div>
									<div class="col-md-6">
										<input type="radio" name="gender" id="gender" value="F"> FEMALE
									</div>
								</div>
							</div>
						</div>
						<strong>PASSWORD:</strong> <input type="password" name="password" id="password" class="input" placeholder=""><br>
						<div class="row"><br>
							<div class="col-md-4"></div>
							<div class="col-md-4" align="center">
								<input type="button" value="REGISTER" name="register" id="register" class="primary-btn">
							</div>
					</form>
				</div>		
			</div>
		</div>
	</div>
</div><br>
<!--  -->
<script>
	$("#register").on('click',function(){
	    var first_name  = $("#first_name").val();
	    var last_name 	= $("#last_name").val();
	    var email 	 	= $("#email").val();
	    var address 	= $("#address").val();
	    var phone 	 	= $("#phone").val();
	    var gender 		= $("input[name='gender']:checked").val();
	    var password 	= $("#password").val();

	    if(email!="" && password!="" && first_name!="" && last_name!="" && address!="" && phone!="" && gender!=""){
	    	$.post("<?php echo base_url()?>Login_cont/registernew",{
	        	first_name:first_name,
	        	last_name:last_name,
	        	email:email,
	        	address:address,
	        	phone:phone,
	        	gender:gender,
	        	password:password
	      	},function(data){
	      		alert(data);
  				window.location.href = "<?php echo base_url()?>";
	      	});
	    }
	    else{
	      alert("ENTER ALL FIELDS.");
	      window.location.reload();
	    }
	});
</script>