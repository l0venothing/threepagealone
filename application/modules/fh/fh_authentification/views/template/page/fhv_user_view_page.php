<?php  
  defined('BASEPATH') OR exit('No direct script access allowed');?>
<style>
    label{font-weight: bold;}
</style>
<?php if(isset($js)){echo $js;}?>
	<hr align="left"><h1></h1>

<div class="row p-4">
	  <div class="col-6">
<h3 class="text-dark font-weight-bold sub-title"> <?php echo lang("donateur_login");?></h3>
<div class="">
    <div class="">
     
    
    
	<div class="row">
	    
	   
		 <div id="title_on_page" class="title_rubrique">
	 
		<div class="p-3 mb-2 bg-light text-center">
		    <?php echo $this->lang->line("no_compte");?> <a href="<?php echo base_url();?>inscription"><?php echo $this->lang->line("inscrire_ici");?></a></div>
	
   
         <?php if(isset($login)){echo $login;}?>
         <?php if(isset($reset)){echo $reset;}?>
         <?php if(isset($register)){echo $register;}?>  
	    </div>
	   
	</div> 

    </div>                
</div>

	  </div>
  <div class="col-6">
	      <h3 class="text-dark font-weight-bold sub-title"> <?php echo lang("porteur_projet_login");?></h3>
	      <a href="#" class="mt-5 btn btn-lg btn-dark btn-block bt_jumbotron waves-effect waves-light"><i class="ri-account-circle-line ri-xl"></i> <?php echo lang("connect_projet");?></a>
	  </div>
      </div>