<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends MY_Controller {
    public function __construct()
    {
		 parent::__construct();
      $this->load->model('admin_model');

     
	} 
	public function index($id=1)
	{  
        
        if($this->session->userdata("logged_in")):
    //  redirect("Admin/index");
else:  
    $this->load->add_package_path(FHPATH.'fh/fh_authentification');
    $this->load->library("Fh_userlib");
    $data["view"]=$this->fh_userlib->get_view();
    // $data["is_display_title_nav"]=FALSE;
    $data["contexte"]="login";
    
    $this->load->view("template/base/login",$data);
//	    $this->load->view("template/composantes/header/head",$data);
//	    $this->load->view("template/composantes/header/header_nav");
//	    $this->load->view("login/page_login",$data);
//	  
//	    $this->load->view("template/composantes/footer/inc_footer_only_copyright");
endif; 
    }
    

}