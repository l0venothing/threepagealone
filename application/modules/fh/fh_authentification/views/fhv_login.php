

  
  <div class='jumbotron_container'>  
      <form id="fha_form_login" method="post" action="<?= $controller;?>/<?= $methode;?>/login" type="login">

  <div class="form-group alert alert-danger" id="status_login" style="display:none;"></div>

	<div class="form-group">
	    
     <?php if($input_label=='out' || $input_label=='all'){?><label form='psorem_login'><?= $input_psorem;?></label><?php }?>
     <label><?php echo $this->lang->line("login");?></label>
	   <input type="text" class="form-control" name="psorem_login" id="psorem_login">
	</div>

	<div class="form-group">
     <?php if($input_label=='out' || $input_label=='all'){?><label form='pass_login'><?= $input_password;?></label><?php }?>
	 <label><?php echo $this->lang->line("mdp");?></label>   
     <input type="password" class="form-control" name="pass_login"  id="pass_login" autocomplete="off"/>    
	</div>

	
		<div class="form-group text-center">
		   <button type="submit" class="btn btn-lg btn-dark btn-block bt_jumbotron" id="submit_login"><i class="ri-account-circle-line ri-xl"></i> <?php echo $this->lang->line("label_button_connexion");?></button> 
		    <?php if($btn_reset == 'on'){?>
	   		<a href="#" id="fha_link_reset" class="bt_forget" onclick="$('#fha_form_login').hide(); $('#fha_form_reset').show();"> <?php echo $this->lang->line("mdp_oublie");?></a>
	   <?php }?>
		
	   
	</div>

  <div class="form-group"> 
  	  

	   <?php if($btn_register == 'on'){?>
	   		<a id="fha_link_register" type="button" class="btn btn-sm btn-default pull-right" onclick="$('#fha_form_login').hide(); $('#fha_form_register').show();"></a>
	   <?php }?>
  </div>
  </form> 
 </div>




