<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | BHASIS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/login/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/login/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/login/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link id="pagestyle" href="<?php echo base_url();?>assets/login/dist/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/dist/css/main.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/dist/css/util.css">
</head>
<body class="">
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?php echo base_url();?>auth/login" method="post">
					<!--span class="login100-form-title p-b-43"-->
						<h3 class="gradient-text">Login</h3>
            <p class="text-p">Hello! Welcome To Bhasis</p>
					<!--/span>
          <span class="login100-form-title p-b-43">
            
					</span-->
					
					
					<div class="input-group mb-3" data-validate = "Valid email is required">
            <input type="username" class="form-control" placeholder="Username" name="username" id="username">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
					</div>
					
					
					<div class="input-group mb-3" data-validate="Password is required">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
              <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
			

					<div class="text-center">
            <button type="submit" class="btn bg-gradient w-100 mt-4 mb-0">Sign in</button>
          </div>
					
				</form>

				<div class="login100-more" style="background-image:url(<?php echo base_url("assets/img/background_lg.png");?>); ">
          <h3 class="h3-pic">BHASIS</h3>
          <p class="text-pic">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
			</div>
		</div>
</div>
<!--div class="row">
  <div class="col-sm-8">
    
        <img src="<?php echo base_url(); ?>assets/img/background_lg.png" class="" alt="" style="min-height:100vh; max-width:130vh;">
  </div-->
  <!-- login card>
  <div class="col-sm-4">
    <div class="login-box" style="margin-top:150px;margin-left:80px">
      <div class="login-logo">
        <a href="<?php echo base_url();?>"><b>Aplikasi</b>CRUD</a>
      </div-->
      <!-- /.login-logo>
          <p class="login-box-msg">Sign in to start your session</p>

          <form action="<?php echo base_url();?>auth/login" method="post">
            <div class="input-group mb-3">
              <input type="username" class="form-control" placeholder="Username" name="username" id="username">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" name="password" id="password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Remember Me
                  </label>
                </div>
              </div-->
              <!-- /.col >
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div-->
              <!-- /.col>
            </div>
          </form-->

        
        <!-- /.login-card-body>
      
    </div>
  </div>
</div-->
<!-- /.login-box -->
  <!--main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="card-body">
                  <form role="form">
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="javascript:;" class="text-info text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n4">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url(<?php echo base_url("assets/img/background_lg.png");?>); "></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main-->
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/login/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/login/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/login/dist/js/adminlte.min.js"></script>


</body>
</html>
