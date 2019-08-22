
<div class="container">
    <div class="row">
        <div class="col-md-6 center form_wrapper-2">
            <h1>
                <span>Register</span></h1>


                <p class='error'><?php if(isset($_SESSION['email_registered'])){ echo ($_SESSION['email_registered']);} ?></p>
                    

            <form method="post" action="register.php">


                <input type="text" class="form-control" id="inputEmail3" placeholder="Email" name="user_email" >
  
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="user_password">
  
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" value="Register">
                        or <a href='#'>Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
