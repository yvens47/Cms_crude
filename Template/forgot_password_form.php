
<div class="container">
    <div class="row">
        <div class="col-md-4 center form_wrapper">


            <form class="form-signin" method="post"  name="login">

                <h1 class="h3 mb-3 font-weight-normal">Let's find your account</h1>
                <p class="lead">please enter your email below</p>
                <label for="inputEmail" class="sr-only">Enter Email</label>

                <input type="text" name ='user_email' id="inputEmail" 
                       class="form-control" placeholder="Email address" autofocus>
                       <?php if (isset($error)): ?>

                <p style="color: red"> <?php echo($error); ?></p>

                <?php endif; ?>
                <div class="col-sm-2"></div>
                <!-- <button class="btn btn-sm btn-primary btn-block" type="submit">Cancel</button>-->
                <button class="btn btn-sm btn-primary btn-block" type="submit">Find account</button>
        </div>


        </form>
    </div>
</div>