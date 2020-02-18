<?php  
  defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if(isset($js)){echo $js;}?>
	<div class="panel panel-info">
         <?php if(isset($login)){echo $login;}?>
         <?php if(isset($reset)){echo $reset;}?>
         <?php if(isset($register)){echo $register;}?>  

	</div>   