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
	    echo "<a href='articles.php?cat=$var' class=' categories btn btn-default'><scan class='$k'>".$var ."</span></a>";
 ?>
  
  
  </p>
  
  </div>
</div>
</div>

</div>
<div class='feature'>
<h1> Latest <span style='color:#c7c7c7'> Articles</span></h1>
<div class='container-fluid'>
	<div class='row'>
  <?php   $feature = $article->latest(3); ?>

  
  <?php foreach ($feature as $key=> $post) :?> 
  
		<div class='col-md-4 art-f'>
      <a href='view.php?id=<?php  echo $post['article_id'] ?>'>
        <img  class='img-fluid' src="<?php echo $post['images'] ?>"/>
      
      </a>
        <a href='index.php?category=1'><h2> <?php echo substr($post['article_title'],0, 10); ?> </h2></a>
        <p><?php echo substr($post['article_content'],0, 80)?></p></a>
    </div>
<?php endforeach; ?>
		
		
	
	</div>
</div>
</div>




 <div class="wrapper">
<div class="container-fluid">

<div class="row">





	<div class="col-md-7">

  <?php 
  
  
   
  $per_page=5;
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

	<div class="col-md-5">
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
<h2>Recent Post</h2>
 <div class='article_wrap container'>
    <div class="row mb-2">
      <div class="col-md-3 p-0">
        <img  style='height:130px; width:100%' src='https://images.unsplash.com/photo-1571605558168-ace5109d29ee?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60' class="img-thumbnail"/>
      </div>
      <div class="col-md-9">
      <p><a href='http://localhost:8080/CMS_Crude/view.php?id=110'>Lorem ipsum dolor sit amet, consectetur adipiscing</a> </p>
      
      </div>     
    
    </div>

     <div class="row mb-2">
      <div class="col-md-3 p-0">
              <img  style='height:130px; width:100%' src='https://images.unsplash.com/photo-1571637928227-e5ec14ecb8a0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60' class="img-thumbnail"/>
    </div>
      <div class="col-md-9">
            <p><a href='http://localhost:8080/CMS_Crude/view.php?id=101'>Lorem ipsum dolor sit amet, consectetur adipiscing</a> </p>

      </div>     
    
    </div>

     <div class="row">
      <div class="col-md-3 p-0">
      <img  style='height:130px; width:100%' src='https://images.unsplash.com/photo-1571624750891-64dfc55a984b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60' class="img-thumbnail"/>

      </div>
      <div class="col-md-9">
        <p><a href='http://localhost:8080/CMS_Crude/view.php?id=109'>Lorem ipsum dolor sit amet, consectetur adipiscing</a> </p>

      
      </div>     
    
    </div>
 </div>


	</div>
	</div>
	</div>




</div>

<?php  require_once("Template/footer.php");?>

