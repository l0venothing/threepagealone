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
   
   
   
<div class="row">
	<div class="list-group col-3 m-2">
		<?php if(!is_null($message)):?>
			<div class="alert alert-success">
			    <?php if($message==1):?>
			     Colonne ajoutée
		      <?php elseif($message==2):?>
		      Colonne supprimée
			    <?php endif;?>

			</div>
			<?php endif;?>


			<div class="list-group">
			
			  <?php foreach ($fichiers as $f):?>

			  <a  class="text-dark text-decoration-none list-group-item border-dark " href="<?php echo base_url()?><?php echo $this->session->userdata("lg");?>/listelangues/index/<?php echo $f->id_fichier;?>/1" > <?php echo $f->nom;?></a>




			<?php endforeach;?>
			</div>




		<?php echo
		 $pagination_helper->create_links();?>
	  </div>
	<div class="col-8">
	    <?php echo $word;?>
	</div>
</div>
     <?php if($this->session->userdata("id")===2):?>
<!--  <div class="btn-group">
 

 
 
 <form class="form-inline" action='<?php echo base_url();?><?php echo $this->session->userdata("lg");?>/listelangues/add_lang' method='GET'>
   <input class="form-control mr-sm-2" type="input" placeholder="<?php if (null!= $this->lang->line('add_lang')):echo $this->lang->line('add_lang');else:echo 'Ajouter une langue';endif; ?>" aria-label="ajoute" value='' name='lang'>
   <button class="btn btn-outline-success my-2 my-sm-0 mx-2" type="submit"><?php if (null!= $this->lang->line('add_lang')):echo $this->lang->line('add_lang');else:echo 'Ajouter une langue';endif; ?> </button>
 </form>


   <form class="form-inline" action='<?php echo base_url();?><?php echo $this->session->userdata("lg");?>/listelangues/remove_lg' method='GET'>
  <select class="form-control mr-sm-2" name="lang" id="">
  <?php foreach ($lg_col as $col):?>
  <option  value="<?php echo $col->COLUMN_NAME;?>"><?php echo $col->COLUMN_NAME;?></option>
<?php endforeach;?>
  </select>
   <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><?php if (null!= $this->lang->line('del_lang')):echo $this->lang->line('del_lang');else:echo 'Supprimer une langue';endif; ?></button>
 </form>

</div>-->
<form method='post' class="form-inline td_plus">
  <div class="form-group">
  <label class='form-control 'for=""><?php if (null!= $this->lang->line('ajouter')):echo $this->lang->line('ajouter');else:echo 'Ajouter';endif; ?> <?php if (null!= $this->lang->line('fichier')):echo $this->lang->line('fichier');else:echo ' un titre de fichier';endif;?> </label>
    <input type="text" name="nom" id="" class="form-control" placeholder="" aria-describedby="">
    <button class="btn btn-success bt_plus" type=''><?php if (null!= $this->lang->line('ajouter')):echo $this->lang->line('ajouter');else:echo 'Ajouter';endif; ?>  </button>
  </div>
</form>
<?php endif;?>
</body>
</html>