<div class="container">



<?php foreach ($liste_page as $page):?>


<a class="text-dark text-decoration-none list-group-item border-dark display" href="<?php echo base_url();?>/admin/index/<?php echo $page->id;?>"><?php echo $page->titre_fr?></a>

<?php endforeach;?>




</div>

