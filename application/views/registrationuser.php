


        <section id="loginAccount" class="loginAccount-page-content page-content">
           <section class="breadcrumnb">
               <div class="container">
                   <ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="clearfix">
                     <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                      <meta itemprop="position" content="1">
                         <a href="<?= base_url() ?>" itemprop="item"><span itemprop="name">Home</span></a>
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
            <h1 class="page_heading">Registration</h1>
        </div>
    </section>
    <section>
        <div class="container">
          <div class="row" >
          <div class="col-md-6" style="margin-left: 29%; margin-bottom: 6%;">
<div class="signup-form">
    <form action="<?= base_url()?>save-user" method="post">
        <h2>Register</h2>
        <p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
                <div class="col-xs-6"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
            </div>          
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="8" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="confirmpassword" placeholder="Confirm Password" minlength="8" required="required">
        </div>
        <div>
            <span id='message'></span>
            <br>
            <br>
        </div>
        <div class="form-group">
            <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-block" style="color: #FFFFFF; background-color: #502701" disabled="true">Register Now</button>
        </div>
    </form>
    <div class="text-center">Already have an account? <a href="<?=base_url()?>userlogin">Sign in</a></div>
</div>
</div>
             </div>
        </div>

        </section>

<script type="text/javascript">

    $(document).ready(function()
    {
        var v1 = 0;
        var v2 = 0;
        $('#password, #confirmpassword').on('keyup', function () 
        {
            if ($('#password').val() == $('#confirmpassword').val())
            {
                $('#message').html('Matching').css('color', 'green');
                v1=1;
                //$('.btn').attr("disabled", false);
            }
            else
            {
                $('#message').html('Not Matching').css('color', 'red');
                v1=0;
                $('.btn').attr("disabled", true);
            }
            if(v1==1 && v2==1)
            {
                $('.btn').attr("disabled", false);
            }
        });
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                //$('.btn').attr("disabled", false);
                v2=1;
            }
            else if($(this).prop("checked") == false){
                v2=0;
                $('.btn').attr("disabled", true);
            }
            if(v1==1 && v2==1)
            {
                $('.btn').attr("disabled", false);
            }
        });

    });
</script>