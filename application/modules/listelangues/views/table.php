<table class="table table-striped">
  <thead>
    <tr>
    <?php  foreach ($fields as $fd):?>
    <?php $field_str= str_replace('traduction.','',$fd);?> 
    <?php if ($field_str!=='id'&&$field_str!=='id_fichier'):?>
    
	<th scope="col"><b><?=$field_str;?></b></th>
      <?php endif;?>
      <?php endforeach;?>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($fichiers as $f):?>
   
 <?php //print_r($f); ?>
    <tr>
<?php $i=0; foreach ($fields as $kd=>$fd):
   
    ?>
<?php $replace=str_replace('traduction.','',$fd);?>


<?php if ($replace!=='id'&&$replace!=='id_fichier'):?>
<td class="container_form" >
<?php echo $f->$replace;?> &nbsp;
<?php if($i>0): ?>
<span class="get_pencil_form" form_type='input' valeur_id_element='<?php echo $f->id;?>' champ_id='id'  table='traduction' champ_saved="<?php echo $replace;?>"><i class="far fa-edit text-info"></i></span>
<?php endif; $i=$i+1;?>
</td>
<?php endif;?>
  
   

<!-- <td class="container_form" ><?php echo $f;?>   <span class="get_pencil_form" form_type='input' valeur_id_element='<?php echo $f->id;?>' champ_id='id'  table='traduction' champ_saved="<?php echo $field_str;?>"><i class="far fa-edit text-info"></i></span></td> -->


<?php endforeach;?></tr> 
<?php endforeach;?>
    <?php if($this->session->userdata("id")==2):?>
<tr>

<form method='post' class="form-inline td_plus" action="<?php echo base_url();?><?php echo $this->session->userdata("lg");?>/listelangues/mot_insert?type=mot&id_fichier=<?php echo $id_fichier;?>">

<?php  foreach ($fields as $fd):?>
    <?php $field_str= str_replace('traduction.','',$fd);?> 
    <?php if ($field_str!=='id'&&$field_str!=='id_fichier'):?>
    
    


      <td>
  <div class="form-group">

    <input type="text" name="<?php echo $field_str;?>" id="" class="form-control" placeholder="<?php if (null!= $this->lang->line('ajouter')):echo $this->lang->line('ajouter');else:echo 'Ajouter';endif; ?> <?php if (null!= $this->lang->line('mot')):echo $this->lang->line('mot');else:echo $field_str;endif;?> " aria-describedby="helpId">

  </div>

  </td>
      <?php endif;?>
      <?php endforeach;?>
      <td>   <button class="btn btn-outline-success my-2 my-sm-0 mx-2" type=""><?php if (null!= $this->lang->line('add_Word')):echo $this->lang->line('add_Word');else:echo 'Ajouter un mot';endif; ?> </button>
      
      </td>
   









</form>

</tr>
   <?php endif;?>
  </tbody>
</table>


