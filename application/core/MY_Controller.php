

<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// class My_Controller extends CI_Controller {

//    
//     public function render($view, $template='template/base/base')
//     {
//         $this->data["view_content"] = $this->load->view($view, $this->data, TRUE);
//         $this->load->view($template, $this->data);
//     }
// }

class MY_Controller extends CI_Controller {
    public $data = array();
	public $tab_language = null;
	public $current_language = null;

	public function __construct() {
		parent::__construct ();

		
		// var_dump($current_language);die();
	}
           public function render($view, $template='template/base/base')
    {
		$current_language=$this->set_lang();
		// tous les fichiers langues a àjouter
		$this->lang->load('template',$current_language);
		$this->lang->load('homepage',$current_language);
		$this->data['current_language']=$current_language;
        $this->data["view_content"] = $this->load->view($view, $this->data, TRUE);
        $this->load->view($template, $this->data);
    }
       
	 
		protected function set_lang(){
		
			
			
			$lang=array("fr","en");
		
			if(in_array($this->uri->segment(1),$lang)): return $this->uri->segment(1); endif;
			 return "en"; 
			
			
			
			
  }
}