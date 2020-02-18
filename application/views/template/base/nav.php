 <header>
 	<img class='img-fluid' id="bgimg" src="<?php echo base_url('../assets/img/code1.jpg'); ?>" alt="">
 	<div class="text-center banner-container container">

 		<h1 id="title-imgheader" class="text-center"> Roux Esther </h1> <span id="brand">Full Stack Web
 			Developer</span>

 		<nav id="text-imgheader" class="text-center">
 			<ul class="nav navbar-nav">
 				<li> <a role="button" id='headerlink' href="#"><?php echo $this->lang->line('learnmore');?></a> </li>
 			</ul>
 		</nav>
 	</div>



 	<nav class="navbar navbar-expand-md bg-dark navbar-dark">


 		<!-- Toggler/collapsibe Button -->
 		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
 			<span class="navbar-toggler-icon"></span>
 		</button>
 		<a class="navbar-brand active nav-item" href="#"> <img class="img_nav gris" src="<?=base_url('assets/img/webplanet_small.png');?>" alt=""></a>
 		<!-- Navbar links -->
 		<div class="collapse navbar-collapse" id="collapsibleNavbar">
 			<ul class="navbar-nav m-auto">
 				<?php 	$this->data['current_language']=$current_language;?>

 				<li class="nav-item"><a class="nav-link text-light text-capitalize " href="<?= base_url().$current_language.'/welcome';?>"><?php echo $this->lang->line('home');?></a></li>
 				<li class="nav-item"><a class="nav-link text-light text-capitalize"  href="<?= base_url().$current_language.'/portfolio';?>"><?php echo $this->lang->line('portfolio');?></a></li>
 				<!-- <li class="nav-item"><a class="nav-link text-light "  href="<?= base_url().$current_language.'/skills';?>">Skills</a></li> -->
 				<!-- <li class="nav-item"><a class="nav-link text-light " href="<?= base_url('Funnyland');?>">Funnyland</a></li> -->
 				<li class="nav-item"><a class="nav-link text-light text-capitalize"  href="<?= base_url().$current_language.'/contact';?>"><?php echo $this->lang->line('contact');?></a></li>
 			</ul>
 			<ul class="nav navbar-nav navbar-right">
 				<li class="nav-item gris list-group-item border-dark"><a href=""><i class="fas fa-user-lock"> </i></a></li>
 				<li class="nav-item"><a class='text-dark text-decoration-none ascroll list-group-item border-dark' href="<?= base_url('assets/doc/EstherRoux-CV.pdf');?>"> CV</a></li>
 			</ul>
 		</div>
 	</nav>
 	<!-- <nav class="navbar navbar-default">  
         
            <div class="container-fluid container-nav">   
                 <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                     </button>
                   <a class="navbar-brand active" href="#">Travel To </a> 
                </div> 
                <!-- endnavbar header
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              
                    <ul class="nav navbar-nav">
                        <li><a href="<?= base_url('Welcome');?>">Home</a></li>
                        <li><a href="<?= base_url('Portfolio');?>">Portfolio</a></li>
                        <li><a href="<?= base_url('Skills');?>">Skills</a></li>
                        <li><a href="<?= base_url('Funnyland');?>">Funnyland</a></li>
                        <li><a href="<?= base_url('Contact');?>">Wave Me</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="http://www.if3projets.net/gamedev1/Esther_Roux_cv.pdf">CV</a></li>
                    </ul>
                </div> 
               /.navbar-collapse 
            </div>
             /.container-fluid 
        </nav>-->
 </header>
