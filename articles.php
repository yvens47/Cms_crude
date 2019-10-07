<?php session_start();?>

<?php 
require_once ("init.php");
$page->set_title("my home page");

?> 
<?php  require_once("Template/header-2.php");?>
                    <div class="jumbotron clip-2">

                    <div class='container'>
                    <div class='row'>
                    <div class='col-md-4'>
                        <div class='faker'>
                        <img src="https://oc-static.imgix.net/prod/path/learningPathIllustration.png?auto=compress,format&amp;q=80">
                        </div>
                    </div>
                    <div class='col-md-8'>
                        <h1 class="display-4"> CMS Crude</h1>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis malesuada dui, vitae posuere ligula mattis vitae.</p>
                        <hr class="my-4">

                <?php $category = array("business"=>"Finance", "programming"=>"Programming", 
                "web"=>"SEO") ?> 
                <p>

                <?php
                
                foreach($category  as $k => $var)  
                        echo "<a href='articles.php?cat=$var' class='btn btn-default'><scan class='$k'>".$var ."</span></a>";
                ?>
                
                
                </p>
                
                </div>
</div>
</div>

</div>

<?php  require_once("Template/footer.php");?>

