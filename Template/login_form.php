<div class="container">
<div class='flash'><p><?php if(isset($_SESSION['register_success'])){ echo ($_SESSION['email_registered']);} ?></p>
</div>
    <div class="row">
        <div class="col-md-4 center form_wrapper">



            <form class="form-signin" method="post"  name="login">

                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <?php if (isset($error)): ?>


                <p class="lead" style="color:red">  <?php echo $error ?></p>


                <?php endif; ?>

                <label for="inputEmail" class="sr-only">Email address</label>

                <input type="text" name ='user_email' id="inputEmail" class="form-control" placeholder="Email address"  autofocus>
               

                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password"  name='user_password'id="inputPassword" class="form-control" placeholder="Password" >
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                    <a href="forgotpassword.php">forgot your password</a>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

            </form>
        </div>
    </div>
</div>