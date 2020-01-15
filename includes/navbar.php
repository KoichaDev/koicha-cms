<div class="mobile-navbar-toggle py-3" style="font-family: 'Roboto', sans-serif;" >
  <nav class="navbar navbar-expand-md navbar-light ftco_navbar ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand d-lg-none d-xl-none" href="index.php">Koicha.dev</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <i class="fa fa-bars"></i> MENU
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
				<?php 
					if(isset($_SESSION['username'])) {
						?>
						<li class="nav-item"><a href="/admin/index.php" class="nav-link">Admin</a></li>
						<?php
					} 
				?>				
			  	<li class="nav-item"><a href="<?php echo redirect_navBarURL('#section-background'); ?>" class="nav-link">Background</a></li>
            	<li class="nav-item"><a href="<?php echo redirect_navBarURL('#section-skills'); ?>" class="nav-link">Skills</a></li>
            	<li class="nav-item"><a href="<?php echo redirect_navBarURL('#section-featured-projects'); ?>" class="nav-link">Projects</a></li>
	          	<li class="nav-item"><a href="<?php echo redirect_navBarURL('#section-articles'); ?>" class="nav-link">Blog</a></li>
	          	<li class="nav-item"><a href="mailto: hello@koicha.dev" class="nav-link">Contact Me</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
</div><!-- container -->