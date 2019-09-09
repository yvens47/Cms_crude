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

  <?php foreach($category  as $k => $var)
  
	echo "<button class='btn btn-default'><scan class='$k'>".$var ."</span></button>";
 ?>
  
  
  </p>
  
  </div>
</div>
</div>

</div>
<div class='feature'>
<h1> Latest Articles</h1>
<div class='container'>
	<div class='row'>
		<div class='col-md-4 art-f'>
    <a href='view.php?id=1'>
	  	<img  class='img-fluid' src='https://cdn.pixabay.com/photo/2019/08/24/13/25/tunnel-4427609_960_720.jpg'/>
     
    </a>
    <a href='index.php?category=1'><h2> Article One</h2></a>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p></a>
    </div>
		<div class='col-md-4 art-f'>
    <a href='index.php?category=1'>
		<img class='img-fluid' src='https://cdn.pixabay.com/photo/2019/08/25/13/34/dogs-4429513_960_720.jpg'/>
		</a>
    <a href='index.php?category=1'><h2> Article One</h2></a>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
    </a>
    </div>
		<div class='col-md-4 art-f'>
    <a href='index.php?category=1'><a href='index.php?category=1'>
		<img  class='img-fluid' src='https://cdn.pixabay.com/photo/2019/06/29/05/42/books-4305459_960_720.jpg'/>
		</a>
    <a href='index.php?category=1'><h2> Article One</h2></a>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
    </div>
	
	</div>
</div>
</div>




 <div class="wrapper">
<div class="container">

<div class="row">





	<div class="col-md-8">

  <?php 
  
  
   
    $per_page=5;
    $current_page = isset($_GET['page'])? $_GET['page']  : 1;
   
    $total_count= $db->count_rows();   

    $paging = new Pagination($per_page, $current_page, $total_count);

  ?>
	
	<?php  $article->display_all(6, 10); ?>		


				<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>


		</div>
			<!-- Sidebar-->

	<div class="col-md-4">
		<div class='subs'>

		<h2>CSS Newsletter</h2>

<form action="/action_page.php">
  <div class="container">
    <h3>Subscribe to our Newsletter</h3>
    <p>Lorem ipsum text about why you should subscribe to our newsletter blabla. Lorem ipsum text about why you should subscribe to our newsletter blabla.</p>
  </div>

  <div class="container" style="background-color:white">
    <input type="text" placeholder="Name" name="name" required>
    <input type="text" placeholder="Email address" name="mail" required>
    <label>
      <input type="checkbox" checked="checked" name="subscribe"> Daily Newsletter
    </label>
  </div>

  <div class="container">
    <input type="submit" value="Subscribe">
  </div>
</form>

		</div>




    <div class="realated">
<h2>Categories</h2>
 <div class="article_wrap">
 <?php $article->categories(); ?>


 </div>	</div>




		<div class='realated'>
<h2>Most Popular</h2>
 <div class='article_wrap'>

 <ul class="">
  <li class="">
    <p>Cras justo odio lipsume content </p>
    <img class='img-fluid' src='https://cdn.pixabay.com/photo/2019/08/24/22/21/child-4428504_960_720.jpg'/>
  </li>


  <li class="">
    <p>Cras justo odio lipsume content </p>
    <img class='img-fluid' src='https://cdn.pixabay.com/photo/2019/08/23/20/06/landscape-4426419_960_720.jpg'/>
    
  </li>


  <li class="">
    <p>Cras justo odio lipsume content </p>
    <img class='img-fluid' src='https://cdn.pixabay.com/photo/2019/03/19/19/54/polyommatus-icarus-4066785_960_720.jpg'/>
  </li>
  
</ul>


 </div>


	</div>
	</div>
	</div>




</div>

<?php  require_once("Template/footer.php");?>

