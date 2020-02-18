<?php
      if(isset($header)){echo $header;}
?>

<div class="container">
<div class="row">
  <center>
    <h1 class="panel"><?php if($response){echo $title_activate;}else{ echo $title_no_activate;}?></h1>
     
     <?php 
        if($response){
          echo '<p>'.$descript_activate.'</p>';
        }else{
          echo '<p>'.$descript_no_activate.'</p>';
        }
     ?>

     <p><i id="Loading" class="fa fa-refresh fa-spin fa-1x fa-fw"></i> Redirection automatique dans 20 secondes vers le site ou <a href='<?php echo base_url();?>'>cliquer ici</a> pour la redirection manuelle</p>;

  </center>
</div>
</div>


<?php if(isset($footer)){echo $footer;}?> 