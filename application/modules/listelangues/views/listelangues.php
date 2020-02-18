<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste langues </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>assets/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-4.3.1-dist/css/bootstrap.min.css" >
   

    <script src="<?php echo base_url();?>assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fontawesome-free-5.9.0-web/css/all.css" >
</head>
<body>
    <div class="container">
    <?php if(!is_null($message)):?>
	<div class="alert alert-success">
	    <?php if($message==1):?>
	     Mot ajouté
      <?php elseif($message==2):?>
     Fichier généré
	    <?php endif;?>
	
	</div>
	<?php endif;?>
    <!-- <?php //print_r($fichiers);?> -->
    <?php $this->load->view('table');?>
    <?php echo $pagination_helper->create_links();?>
  <button class='btn btn-outline-primary update_table' action="<?php echo base_url();?><?php echo $this->session->userdata("lg");?>/listelangues/update_lang?id_fichier=<?php echo $id_fichier;?>"><?php if (null!= $this->lang->line('generer')):echo $this->lang->line('generer');else:echo 'Generer les fichiers';endif; ?>  </button>
  <span class='d-none retour_action alert-success alert'>
  <?php if (null!= $this->lang->line('generer_ok')):echo $this->lang->line('generer_ok');else:echo 'generation faite';endif; ?>  
  
   </span>

  
    </div>
    <div></div>
</body>
</html>