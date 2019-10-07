<div class="container">
<div class='flash'><p><?php if(isset($_SESSION['register_success'])){ echo ($_SESSION['email_registered']);} ?></p>
</div>
    <div class="row">
        <div class="col-md-4 center form_wrapper">
       <img class="img-fluid login-image" src="https://cdn3.iconfinder.com/data/icons/vector-icons-6/96/256-512.png"/>


            <form class="form-signin" method="post"  name="login">

                <h1 class="h3 mb-3 font-weight-normal"> Sign in</h1>
                <?php if (isset($error)): ?>


                <p class="lead" style="color:red; text-align:center">  <?php echo $error ?></p>


                <?php endif; ?>
                <div class='input-group '>

                <label for="inputEmail" class="sr-only">Email address</label>
                 <i class="material-icons" style="
                        position: absolute;
                        top: 2.5vh;
                        left: 4vh;
                        z-index: 1;
                         color: #7f878e;
                    "> account_box  </i>
                <input  style='padding:0 40px;' type="text" name ='user_email' id="inputEmail" class="form-control" placeholder="Email address"  autofocus>
               </div>

                 <div class='input-group '>
                <label for="inputPassword" class="sr-only">Password</label>
                <i class="material-icons" style="
                position: absolute;
                top: 2.5vh;
                left: 4vh;
                z-index: 1;
                color: #7f878e;
            "> account_box  </i>
                <input type="password"  name='user_password'id="inputPassword" class="form-control" placeholder="Password" >
               </div>

                <div class='input-group mt-3 '>
                <button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>
                </div>

                <div class="checkbox mb-3">
                    <label class='float-left'>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                    <label class='float-right mt-2' >
                        <a style='color:#96999c' href="forgotpassword.php">forgot password</a>
                    </label>
                </div>

               
            </form>
           
        </div> 
    </div>
</div>