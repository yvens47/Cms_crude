<?php session_start();?>

<?php 
require_once ("Core/init.php");
$page->set_title("my home page");

?> 
<?php  require_once("Template/header-2.php");?>
	<div class="jumbotron">

	
  <h1 class="display-4"> CMS Crude</h1>
  <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis malesuada dui, vitae posuere ligula mattis vitae.</p>
  <hr class="my-4">
  <p>It usyyyes utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary-cs btn-lg" href="#" role="button">Learn more</a>



</div>
<div class='feature'>
<div class='container'>
	<div class='row'>
		<div class='col-md-4'>
		<img  class='img-fluid' src='https://cdn.pixabay.com/photo/2019/08/24/13/25/tunnel-4427609_960_720.jpg'/>
		</div>
		<div class='col-md-4'>
		<img class='img-fluid' src='https://cdn.pixabay.com/photo/2019/08/25/13/34/dogs-4429513_960_720.jpg'/>
		</div>
		<div class='col-md-4'>
		<img  class='img-fluid' src='https://cdn.pixabay.com/photo/2019/06/29/05/42/books-4305459_960_720.jpg'/>
		</div>
	
	</div>
</div>
</div>




 <div class="wrapper">
<div class="container">

<div class="row">





	<div class="col-md-8">
	
	<?php  $article->display_all(); ?>
		


		<div class="post">
				<img src="http://via.placeholder.com/640x360" class="pimg img-thumbnail float-left">
				<h1 class="ptitle"><a href="#">Lorem ipsum dolor sit amet 1</a></h1>
				<p class="pdate">Jun 18 2018 By Jean Pierre
				<span class="badge badge-pill badge-success">35 views</span>
				<span class="badge badge-pill badge-info">19 comments</span>
			</p>
				<p>
					Curabitur placerat commodo sollicitudin. Donec convallis metus id euismod ultrices. Etiam in pharetra diam. Curabitur ac accumsan lectus.  <a href="" class="btn-link">more...</a></p>
		</div>


			



			


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
		
	</div>
	



	<!-- Sidebar-->

	<div class="col-md-4">

		<img src="http://via.placeholder.com/640x360" class="img-thumbnail float-left">
		<h1 class="ptitle"><a href="#">Lorem ipsum dolor sit</a></h1>
		

	</div>
</div>

<?php  require_once("Template/footer.php");?>

