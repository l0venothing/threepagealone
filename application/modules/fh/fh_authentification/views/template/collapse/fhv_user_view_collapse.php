<?php  
  defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if(isset($js)){echo $js;}?>
<li class="dropdown" id="menuLogin">
    <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin"><?= $btn_text_modal_or_collapse;?></a>
    <div class="dropdown-menu">
      <?php  if(isset($login)){echo $login;}?>
      <?php if(isset($reset)){echo $reset;}?>
      <?php if(isset($register)){echo $register;}?>
    </div>
</li>