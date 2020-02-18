<form id="fha_form_reinit" action="<?= $controller;?>/<?= $methode;?>/exe_reinit" method="post" type="reinit">

    <div class="form-group alert alert-danger" id="status_reinit" style="display:none;"></div> 

    <input type="hidden" value="<?php echo $token;?>" name="token_reinit" id="token_reinit">
    <input type="hidden" value="<?php echo $username;?>" name="username_reinit" id="username_reinit">

    <div class="form-group">
       <?php if($input_label=='out' || $input_label=='all'){?><label form='pass_reinit'><?= $input_password_reinit;?></label><?php }?>
       <input type="password" class="form-control" name="pass_reinit"  id="pass_reinit" placeholder="<?php if($input_label=='in' || $input_label=='all'){echo $input_password_reinit;}?>"/>
        <small id="output_pass"></small>
    </div>

    <div class="form-group">
      <?php if($input_label=='out' || $input_label=='all'){?><label form='repass_reinit'><?= $input_repassword_reinit;?></label><?php }?>
       <input type="password" class="form-control" name="repass_reinit"  id="repass_reinit" placeholder="<?php if($input_label=='in' || $input_label=='all'){echo $input_repassword_reinit;}?>"/>    
    </div>

    <div class="form-group">
       <button type="submit" class="btn btn-lg btn-primary btn-block" id="submit_reinit"><?= $btn_text_exe_reinit;?></button> 
    </div>

</form> 

