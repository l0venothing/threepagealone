<form id="fha_form_reset" action="<?= $controller;?>/<?= $methode;?>/reset" method="post" type="reset" style="display:none;">

    
    <p><i><b><?php echo $this->lang->line("text_reinitpart1");?></b>
	    <br>
    <?php echo $this->lang->line("text_reinitpart2");?></i>
    </p>
    <div class="form-group alert alert-danger" id="status_reset" style="display:none;"></div>

	<div class="form-group">
        <?php if($input_label=='out' || $input_label=='all'){?><label form='psorem_reset'><?= $input_psorem;?></label><?php }?>
	<label><?php echo $this->lang->line("login_ou_adresse_reinit");?></label>
	    <input type="text" class="form-control" name="psorem_reset" id="psorem_reset" placeholder=""/>
	 </div>

     <div class="form-group">
         <button class="btn btn-lg btn-dark bt_jumbotron btn-block" id="submit_reset" type="submit"><?php echo $this->lang->line("reinitialiser");?></button> 
     </div>

     <div class="form-group text-center mt-2"> 
         <a id="fha_link_reset_to_login"  href="#" class="" onclick="$('#fha_form_reset').hide(); $('#fha_form_login').show();"> <?php echo $this->lang->line("retour_connexion");?></a>
     </div> 

     &nbsp
</form> 

