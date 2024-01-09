<style type="text/css"></style>

<section id="loginAccount" class="loginAccount-page-content page-content">
    <section class="breadcrumnb">
	    <div class="container">
	        <ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="clearfix">
		        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
		            <meta itemprop="position" content="1">
			            <a href="<?=base_url()?>" itemprop="item">
							<span itemprop="name">Home</span>
						</a>
		        </li>
		        <li itemprop="itemListElement" itemscope="" itemtype="">
		          	<meta itemprop="position" content="2">
		            <span itemprop="name">My Account</span>
		        </li>
		    </ol>
		</div>
	</section>

	<section class="page_header">
		<div class="container">
		    <h1 class="page_heading">My Account</h1>
   		</div>
	</section>
		<div class="container">
			<div class="row">
		    	<div class="content-area col-lg-12">
		    		<div class="beta-col col-lg-6 col-md-6" >
		        		<div class="header">
		        			<h5>New Customers</h5>
		       			</div>
		    			<div class="createNewAccount pad10">
		    				<div class="height" style="min-height: 133px;">
		        				<div class="loginField">
		        					<div>If you don't have an account, please proceed by clicking the following button to continue first-time registration.</div>
		        					<div class="clearfix"></div>
								</div>
		    				</div>
		       				<div class="submit-button">
		        				<a href="<?= base_url() ?>register" style="color:#FFFFFF; "> <button type="button" ;" class="btn btn-primary"><i class="icon-pencil"></i> Create Account</button></a>
		    				</div>
		   				</div>
					</div>
		    		<div class="alpha-col col-lg-6 col-md-6" style="background-color: lightgray;height: 312px;">
						<div class="myaccountLogin pad10">
		    				<!-- <form name="myaccountLogin" action="" class="bt-flabels js-flabels" method="post" id="frmForm"> -->
		        				<div class="height" style="min-height: 133px;">
	                				<div class="loginField">
		                				<div><h4>Please log in to your account.</h4></div>
		                  				<div class="clearfix"></div>
		             				</div>
		             				<div class="loginField">
		               					<label for="email" class="validation-field">
		                 					<input type="text" name="email" id="loginEmail" value="" placeholder="Email or Username" size="30" tabindex="1" class="form-control txtBoxStyle" required>
		                   					<span class="required-indicator"></span>
		             					</label>
		         					</div>
		        					<div class="loginField">
		          						<label for="password" class="validation-field">
		            						<input type="password" name="password" id="loginpassword" autocomplete="off" placeholder="Password" size="12" tabindex="2" class="form-control txtBoxStyle" required>
		               						<span class="required-indicator"></span>
		          						</label>
		      						</div>
								</div>
		    					<div class="loginField">
		       						<div class="submit-button">
		           						<button type="submit" id="submitted" name="submitted" class="btn btn-primary" style="margin-left: 32%; margin-top: 5%;" onclick="view_message()"><i class="icon-login"></i> Log in to my account</button>
		     						</div>
								</div>
							<!-- </form> -->
		  				</div>
		               	<div class="clearfix"></div>
		          	</div>
		            <div class="clearfix"></div>
		        </div>
		    </div>
		</div>
	</section>
</section>


<script>
	function view_message()
    {
		var email = $('#loginEmail').val();
		var pass = $('#loginpassword').val();
		// alert(email);
		// alert(pass);
        $.ajax(
        {
            type: "POST",
            url: "<?= base_url().'validate'?>",  
            data: {
                'email' : email,
				'password' : pass
            },
            success: function(response)
            {
                var con = jQuery.parseJSON(response);
                   
                if(con.res=="yes")
                {
                    location.href='<?= base_url()?>';
                }
                else
                {
                    alert("Wrong Email or Password.");
                }
            }
        });
    }
</script>