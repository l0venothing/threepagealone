<form id="fha_form_register" action="<?= $controller;?>/<?= $methode;?>/register" method="post" type="register" style="display:none;">  
    <h1 class="panel"><?= $title_register;?></h2>
    <div class="form-group alert alert-danger" id="status_register" style="display:none;"></div>  
      
    <div class="form-group">
         <?php if($input_label=='out' || $input_label=='all'){?><label form='username_re'><?= $input_pseudo;?></label><?php }?>
         <input type="text" class="form-control" name="username_re" id="username_re" placeholder="<?php if($input_label=='in' || $input_label=='all'){echo $input_pseudo;}?>"/>
         <small id="output_username_re"></small>
    </div> 

    <div class="form-group">
         <?php if($input_label=='out' || $input_label=='all'){?><label form='email_re'><?= $input_email;?></label><?php }?>
         <input type="text" class="form-control" name="email_re" id="email_re" placeholder="<?php if($input_label=='in' || $input_label=='all'){echo $input_email;}?>"/>
         <small id="output_email_re"></small>
    </div>

    <div class="form-group">
        <?php if($input_label=='out' || $input_label=='all'){?><label form='pass_re'><?= $input_password;?></label><?php }?>
        <input type="password" class="form-control" name="pass_re" id="pass_re" placeholder="<?php if($input_label=='in' || $input_label=='all'){echo $input_password;}?>"/>
        <small id="output_pass_re"></small>
    </div>

    <div class="form-group">
         <?php if($input_label=='out' || $input_label=='all'){?><label form='repass_re'><?= $input_repassword;?></label><?php }?>
         <input type="password" value="" class="form-control" name="repass_re" id="repass_re" placeholder="<?php if($input_label=='in' || $input_label=='all'){echo $input_repassword;}?>"/>
         <small id="output_repass_re"></small>
    </div>

    <div class="form-group">
        <div class="g-recaptcha" data-sitekey="6LfwTigTAAAAAKlx0MyBtW0Hu_Ca7SrYX1_RI0IK"></div>
    </div>

    <div class="form-group">
      <button class="btn btn-lg btn-primary btn-block" type="submit" id="submit_register"><?= $btn_text_exe_register;?></button> 
    </div>
   
    <div class="form-group">
        <a  id='fha_link_register_to_login' type="button" class="btn btn-sm btn-default" onclick="$('#fha_form_register').hide(); $('#fha_form_login').show();">></a>
    </div>
    &nbsp
</form> 