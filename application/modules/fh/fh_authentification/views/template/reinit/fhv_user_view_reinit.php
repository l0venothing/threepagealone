<?php
      if(isset($header)){echo $header;}
      if(isset($js)){echo $js;}
?>

<div class="container">
<div class="row" style="margin-top: 50px;">
  <div class="panel panel-info" style="max-width:400px; min-width:400px;margin: 0 auto !important;padding:15px;">

    <h1 class="panel"><?= $title_reinit;?></h1>
    <?php if($result){?>
    		<?php if(isset($reinit)){echo $reinit;}?>
     <?php }else{?>
      <div class="form-group">
          <div class="alert alert-danger"><?=$text_invalid_token_reinit;?></div>
      </div>
    <?php }?>

      <div class="form-group">
         <a href="<?= base_url();?>" type="button" class="btn btn-sm btn-dark ">« <?= $btn_text_go_site;?></a>
      </div> 
  </div>
</div>
</div>


<?php if(isset($footer)){echo $footer;}?> 