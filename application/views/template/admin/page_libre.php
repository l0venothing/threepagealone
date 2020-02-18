<div class="container">
   

<?php if(isset($page->id)):?>
 
<form action="" id='page_about_form'>
    <input type="hidden" name="id" value="<?php echo $page->id;?>">
<input name="about_fr" type="hidden"/> <!-- variable qui va contenir notre code transformé -->
<input name="aboutHTML_fr" type="hidden"/> <!-- variable qui va contenir notre html static -->

<input name="about_en" type="hidden"/> <!-- variable qui va contenir notre code transformé -->
<input name="aboutHTML_en" type="hidden"/> <!-- variable qui va contenir notre html static -->

<div>
    <label><b>Title FR</b></label>
    <input name="titre_fr" type="text" class="form-control" value="<?php echo $page->titre_fr;?>" />
</div>


<div class="mt-4">
    <label><b>Title en</b></label>
    <input name="titre_en" type="text" class="form-control" value="<?php echo $page->titre_en;?>" />
    
</div>

<div class="mt-4">
    <label><b>Body FR</b></label>
	<div  id="" class='form-control editor_fr<?php  echo $page->id ?>'>
	   <?php echo $page->content_fr;?>
	</div>
</div>

<div class="mt-4">
    <label><b>Body en</b></label>
<div  id="" class='form-control editor_en<?php  echo $page->id ?>'>
 <?php echo $page->content_en;?>
</div>
</div>
 <a  id="" class="btn btn-primary page_submit m-2" href="#" role="button" page='1'>enregistrer</a> 


 </form>

<?php endif;?>

 </div>
 