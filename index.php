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




<div class="container">
	<div class="row">
		<div class="col-md-4">
			<img src="https://cdn.pixabay.com/photo/2017/05/16/11/57/eye-2317618_960_720.png" style="width:40%">
			<h2>Lorem ipsum dolor sit</h2>
			<p class="lead">s is a simple hero unit, a simple jumbotmation.</p>
			
		</div>

		<div class="col-md-4">
			<img src="https://prodfrontendcdn.azureedge.net/media-storage/20180705155043215share-with-links.png" style="width:45%">
			<h2>Lorem ipsum dolor sit</h2>
			<p class="lead">s is a simple hero unit, a simple jumbotmation.</p>
			
		</div>


		<div class="col-md-4">
			<img src="https://www.revive-adserver.com/media/noun_download-cloud_870218_138341.png" style="width:40%">
			<h2>Lorem ipsum dolor sit</h2>
			<p class="lead">s is a simple hero unit, a simple jumbotmation.</p>
			
		</div>
	</div>
	

</div>

<div class="feature">
	<div class="container">

	<div class="row">
	<div class="col-md-5">
		<h2>Lorem ipsum dolor sit amet, consectetur.</h2>

		<p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce at erat pretium, euismod orci nec, aliquam orci. Nullam luctus eros non eros semper, ut tempor ante dignissim. Nullam in risus vel purus lacinia malesuada. Maecenas non rhoncus leo, vitae pellentesque justo. Fusce ut interdum</p>
	</div>
	<div class="col-md-7">
	<video width="520" height="340" controls>
  <source src="Images/Pexels Videos 1263198.mp4" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
  Your browser does not support the video tag.
</video>
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

