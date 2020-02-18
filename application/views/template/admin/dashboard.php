
	<?php
	if (count($liste_page)>=1):
	    $data['liste_page']=$liste_page;
	endif;
	
	if(isset($id)&&$id>0): else: $id=1; endif;
	
	
	$pages=$this->Portfolio_Model->get_page_libre('*','skills_siteweb',$id);
	
	if(isset($pages[0]->id)):
	    $page=$pages[0];
	    $data["page"]=$page;
    endif;
    
    $this->load->view('template/admin/page_libre_js', $data);

?>

	
	<div class="container">
	    <div class="row">
		<div class="col-lg-3"><?php $this->load->view("template/admin/liste",$data);?></div>
		<div class="col-lg-9"><?php $this->load->view("template/admin/page_libre",$data);?></div>
	    </div>
	
	
	</div>



