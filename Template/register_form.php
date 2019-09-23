
<div class="container">
    <div class="row">
        <div class="col-md-8 center form_wrapper-2">
            <h1>
                <span>Register</span></h1>
                <p style='text-align:center'>Please fill in this form to create an account</p>



                <p class='error'><?php if(isset($_SESSION['email_registered'])){ echo ($_SESSION['email_registered']);} ?></p>
                    

            <form method="post" action="register.php">

                <div class='input-group'>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Email" name="user_email" >
               
                
                <label class='error'><?php  if(isset($error['user_email'])){ echo ($error['user_email']); } ?></label>
                 </div>

                 <div class='input-group'>
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="user_password">
                </div>
                <div class='input-group'>
                <label class='error'><?php  if(isset($error['user_password'])){ echo ($error['user_password']); } ?>
                <?php  if(isset($error['password_short'])){ echo ($error['password_short']); } ?></label>
                <div class="input-group row">
                    <div class="col-sm-6 ml-auto mr-auto">
                        <input type="submit" class="btn btn-primary" value="Register">
                       
                    </div>
                </div>
            </form>
        </div>

       
    </div>
     <div class='col-md-6 ml-auto mr-auto '>
                <p class=' ml-auto mr-auto' style='color:white'>Already have an account? <a href='login.php'>login here</a></p>
        </div>
</div>
