 <!-- Main content -->
 <div class="content">
     <div class="container">
         <h2 style="margin-top: 30px; margin-bottom: 30px; color:whitesmoke">Welcome To Khalila Enterprise</h2>
         <?php if (!empty(session()->getFlashdata('success'))) : ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             <?= session()->getFlashData('success') ?>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <?php endif; ?>

         <?php if (!empty(session()->getFlashdata('error'))) : ?>
         <div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <?= session()->getFlashdata('error')?>
         </div>
         <?php endif; ?>
         <div class="row" style="margin-bottom:10px">
             <div class="col-lg">
                 <div class="container-auth" id="container-auth">
                     <div class="overlay-container shadow overlay-left-reg">
                         <div class="overlay ">
                             <!--div class="overlay-panel overlay-left">
                                                <h1>Welcome Back!</h1>
                                                <p>To keep connected with us please login with your personal info</p>
                                                <button class="ghost" id="signIn">Sign In</button>
                                          </div-->
                             <div class="overlay-panel overlay-right">
                                 <h1>Hello!</h1>
                                 <p>Enter your personal details and start journey with us</p>
                                 <button class="ghost" id="signUp"
                                     onclick="location.href='<?= base_url('Login')?>'">Sign In</button>
                             </div>
                         </div>

                     </div>
                     <div class="form-container sign-up-container-reg overlay-right">
                         <form action="<?= base_url(); ?>/register/save" method="post">
                             <h1>Create Account</h1>
                             <!-- <div class="social-container">
                                                <a href="#" class="social"><i class="fab fa-facebook-f" style="color: #333;"></i></a>
                                                <a href="#" class="social"><i class="fab fa-google-plus-g" style="color: #333;"></i></a>
                                                <a href="#" class="social"><i class="fab fa-linkedin-in" style="color: #333;"></i></a>
                                          </div> -->
                             <!-- <span>or use your email for registration</span> -->

                             <div class="form-floating" style="width:100%">
                                 <input type="input" class="form-control" id="floatingInput" placeholder="Nama"
                                     name="nama">
                                 <label for="floatingPassword">Nama Lengkap</label>
                             </div>
                             <div class="form-floating" style="width:100%">
                                 <input type="input" class="form-control" id="floatingInput" placeholder="Username"
                                     name="username">
                                 <label for="floatingPassword">Username</label>
                             </div>
                             <div class="form-floating" style="width:100%">
                                 <input type="email" class="form-control" id="floatingInput"
                                     placeholder="name@example.com" name="email">
                                 <label for="floatingInput">Email address</label>
                             </div>
                             <div class="form-floating mb-3" style="width:100%">
                                 <input type="password" class="form-control" id="floatingPassword"
                                     placeholder="Password" name="password">
                                 <label for="floatingPassword">Password</label>
                             </div>

                             <button type="submit" class="ghost">Sign Up</button>
                         </form>
                     </div>
                     <!--div class="form-container sign-in-container form-floating">
                                    <form action="#">
                                          <h1>Sign in</h1>
                                          <div class="social-container">
                                                <a href="#" class="social"><i class="fab fa-facebook-f" style="color: #333;"></i></a>
                                                <a href="#" class="social"><i class="fab fa-google-plus-g" style="color: #333;"></i></a>
                                                <a href="#" class="social"><i class="fab fa-linkedin-in" style="color: #333;"></i></a>
                                          </div>
                                          <span>or use your account</span>
                                          <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                                <label for="floatingInput">Email address</label>
                                          </div>
                                          <div class="form-floating">
                                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                                <label for="floatingPassword">Password</label>
                                          </div>
                                          <a href="#" style="color: #333;">Forgot your password?</a>
                                          <button class="ghost">Sign In</button>
                                    </form>
                                    
                              </div-->


                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- price section ends -->
 <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
     <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->