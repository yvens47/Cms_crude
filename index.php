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
  <?php   $feature = $article->latest(3); ?>

  
  <?php foreach ($feature as $key=> $post) :?>
  
		<div class='col-md-4 art-f'>
      <a href='view.php?id=<?php echo $post['article_id'] ?>1'>
        <img  class='img-fluid' src="<?php echo $post['images'] ?>"/>
      
      </a>
        <a href='index.php?category=1'><h2> <?php echo substr($post['article_title'],0, 10); ?> </h2></a>
        <p><?php echo substr($post['article_content'],0, 60)?></p></a>
    </div>
<?php endforeach; ?>
		
		
	
	</div>
</div>
</div>




 <div class="wrapper">
<div class="container">

<div class="row">





	<div class="col-md-8">

  <?php 
  
  
   
  $per_page=2;
  if(isset($_GET['page']) ){

    $current_page = $_GET['page'];
  }else{
    $current_page = 1;
  }
   // $current_page = isset($_GET['page'])? $_GET['page']  : 1;
   
    $total_count= $db->count_rows();  
   

    $paging = new Pagination( $current_page, $per_page, $total_count);
      

  ?>

	<?php  $article->display_all($per_page, $paging->offset()); ?>	
  
 

				<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <?php //echo  $paging ->previous_link($url="") ?>
    </li>
    
    <?php  echo $paging-> page_links($url='') ;?>
    <li class="page-item">
      <?php // $paging-> next_link($url="")?>
    </li>
  </ul>
</nav>


		</div>
			<!-- Sidebar-->

	<div class="col-md-4">
		<div class='subs'>

		<h2>Newsletter</h2>

<form action="/action_page.php">
  <div class="container">
    <h3>Subscribe to our Newsletter</h3>
    <p>Lslorem ipsum text about why you should subscribe to our newetter blabla.</p>
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

