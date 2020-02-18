
<div class="titre"> <h1 class="text-center"> Portfolio </h1></div>


<div class="titre"> <h2 class="text-center">Website </h2> </div>
<div class="row myflexrow">
    <?php 
    foreach($querySite as $row):
?>
 
      
<?php if(isset($row)):?>
<?php $data["row"]=$row; ?>




 
  <!-- <div class="card bg-secondary text-white col-lg-3">
    <div class="card-header"><?=$row->nom;?></div>
    <img class="card-img-top" src="<?=$row->imagepath;?>" alt="Card image">
    <div class="card-body"></div> 
     <div class="card-footer"></div> 
  </div> -->


  <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
<div class="mainflip">
<div class="frontside">
<div class="card" style="width:20rem;">
<div class="card-body">
<h4 class="card-title"><?=$row->nom;?></h4>
<p class="card-text"><?=$row->content_fr;?>.</p>
<!-- <a href="#" class="btn btn-info btn-md"><?=$row->content_fr;?></a> -->
</div>
<img class="card-img-bottom img-fluid" src="<?=$row->imagepath;?>" alt="card image">
</div>
</div>
<div class="backside">
<div class="card" style="width:20rem;">
<div class="card-header">
<?=$row->nom;?>
</div>
<div class="card-body">
<h4 class="card-title"><?=$row->nom;?></h4>
<p class="card-text"><?=$row->content_fr;?>.</p>
<!-- <a href="#" class="btn btn-info btn-md">Info Button</a> -->
</div>
<?php if ($row->imagepath2!=''):?>
<img class="card-img-bottom img-fluid" src="<?=$row->imagepath2;?>" alt="card image">
<?php endif;?>
<!-- <div class="card-footer">
This is a Footer
</div> -->
</div>
</div>
</div>
</div>



<?php endif;?>        
    <?php 
endforeach; ?>
</div>

<div class="titre"> <h2 class="text-center"> Video Game </h2> </div>
<div class="row  myflexrow">

    <?php
    foreach($query->result() as $row){
?>
            <div class=" <?php if ($row->nom != 'Hell In Hostel'):?>col-lg-4 <?php endif;?> px-3">
                <!-- <div class="col-12"> -->
                    <figure class="fig-1">
                        <h3 class="text-center">
                            <?php echo $row->nom; ?>
                        </h3>
                        
                        <img class="img-fluid img-projets" src="<?= base_url( $row->imagepath); ?>">
                    </figure>
                <!-- </div> -->
               
            </div>
       
        <?php 
} ?> 
</div>









<!--<script>
 $('.rotate-btn').on('click', function () {
    var cardId = $(this).attr('data-card');
    $("#".concat(cardId)).toggleClass('flipped');
  });
  
</script>-->
