<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    public function __construct()
    {
		 parent::__construct();
      $this->load->model('admin_model');

      if(!$this->session->userdata("logged_in")):
		redirect("app/");
	endif;
	} 
	public function index($id=1)
	{  
        // $this->render('template/admin/page_libre');
    $this->data['id']=$id;
        $this->data['liste_page'] = $this->admin_model->skills_read();
       
      
        $this->render('template/admin/dashboard');
      
    }
    

   
}