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
</style>
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 order-details"  >
				<div class="section-title text-center">
					<h3 class="title">Login</h3>
				</div>
				<div class="order-summary">
					<form method="POST">
						<strong>EMAIL:</strong> <input type="text" name="email" id="email" class="input" placeholder="abc@gmail.com"><br><br>
						<strong>PASSWORD:</strong> <input type="password" name="password" id="password" class="input" placeholder=""><br>
						<div class="row"><br><br>
							<div class="col-md-4"></div>
							<div class="col-md-4" align="center">
								<input type="button" value="LOGIN" name="login" id="login" class="primary-btn">
							</div>
							<div class="col-md-12" align="center"><br>
								<p>New User ? <a href="<?php echo base_url()?>Register">Click</a> to Register</p>
							</div>
					</form>
			
				</div>		
			</div>
		</div>
	</div>
</div><br>
<!--  -->
<script>
	$("#login").on('click',function(){
	    var email 	 = $("#email").val();
	    var password = $("#password").val();
	    
	    if(email!="" && password!=""){
	    	$.post("<?php echo base_url()?>Login_cont/check_login",{
	        	email:email,password:password
	      	},function(e){
	        	if(e == 1){	  
	          		$.post("<?php echo base_url()?>Login_cont/CreateSession",{
	            		email:email
	          		},function(data){	          			
	          			if(data == "admin"){
	          				window.location.href = "<?php echo base_url()?>Admin/Dashboard";          	
	          			}
	          			else{
	          				window.location.href = "<?php echo base_url()?>";
	          			}
	          		})
	        	}
	        	else{
	        		alert('Email/password incorrect.')
	        	}
	      	})
	    }
	    else{
	      alert("ENTER ALL FIELDS.");
	      window.location.reload();
	    }
	});
</script>