<h1 class="text-center"> Portfolio</h1>
<div class="row">
<?php
    foreach($query->result() as $row){
?> 
 <div class="project">
     <div class="col-xs-7">
        <figure class="fig-1">
            <h3 class="text-center">  
                <?php echo $row->id; ?>
                <?php echo $row->nom; ?></h3>
            <img class="img-responsive img-projets" src="<?= base_url( $row->imagepath); ?>">
        </figure>
    </div>
</div>
<?php 
} ?>
</div>