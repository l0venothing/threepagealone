
<div class="titre"> <h1 class="text-center"> Portfolio </h1></div>


<div class="titre"> <h2 class="text-center"> Video Game </h2> </div>
<div class="">
<div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
</ul>

<div class="carousel-inner">

    <?php
    foreach($query->result() as $row){
?>


<!-- The slideshow -->

<div class="carousel-item ">

      <img src="<?= base_url( $row->imagepath); ?>" alt="image projet jeu video" width="1100" height="500">
   
           
      </div>
   
        <?php 
} ?> 

</div> 
   
    
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</div>
<div class="row ">

    <h2 class="text-center"> Website </h2>
    <?php 
    foreach($querySite->result() as $row){
?>
    <div class=" col-lg-3 px-3" >
        <figure class="fig-1 ">
                <h3 class="text-center">
                    <?php echo $row->nom; ?>
                </h3> 
               
                
                        <img class="img-fluid  img-projets" src="<?= base_url( $row->imagepath); ?>">
    </figure>
 
    <?php if (!empty($row->imagepath2)):?>
    <figure> <img class="img-fluid  img-projets" src="<?= base_url( $row->imagepath2); ?>"></figure>
    <?php endif;?>
                    </div>
    <?php 
} ?>
</div>


