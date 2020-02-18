<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Fhc_userlib extends CI_Controller {

	function __construct() {
         parent::__construct();


         if(!empty($_POST["page_file"])){
         	 
         	 $this->config->load($_POST["page_file"]); 
            $params=$this->config->item("params");  

         	 $this->load->add_package_path(FHPATH.'fh/fh_authentification');
	         $this->load->library('Fh_userlib', $params);
         }else{
		     $this->load->add_package_path(FHPATH.'fh/fh_authentification');
	         $this->load->library('Fh_userlib');
         } 
   }

  public function fh_authentification_exe($form){
	 die('chocolat');
  	if($form == 'login'){
	    $response = $this->fh_userlib->tr_form_login($this->input->post());

	    if($response['id']){
	    	$this->fh_userlib->create_session($response['id_user']);
	    }

	    	echo json_encode($response);
	    	exit();
	   
	}

	if($form == 'reset'){
		$response = $this->fh_userlib->tr_form_reset($this->input->post());
		echo json_encode($response);
	    exit();
	}

	if($form == 'reinit'){
		$token = $this->input->get('token');
		$username = $this->input->get('username');
		$this->fh_userlib->get_reinit($token, $username);
	}

	if($form == 'exe_reinit'){
		$data['token'] = $this->input->post('token_reinit');
		$data['username'] = $this->input->post('username_reinit');
		$data['password'] = $this->input->post('pass_reinit');
		$data['repassword'] = $this->input->post('repass_reinit');
		$response = $this->fh_userlib->tr_form_reinit($data);
		echo json_encode($response);
	    exit();
	}

	if($form == 'register'){
		$response = $this->fh_userlib->tr_form_register($this->input->post());
		echo json_encode($response);
	    exit();
	}
  }
	

	public function register_check_input(){
		
		// verification pour pseudo
	   if($this->input->post('id') == 'username_re'){
	   	    $username = $this->input->post('value');
	        $response = $this->fh_userlib->tr_form_register_check_username($username);
			echo json_encode($response); 
		    exit();
		}

		//verification pour l'email
		if($this->input->post('id') == 'email_re'){
			$email = $this->input->post('value');
			$response = $this->fh_userlib->tr_form_register_check_email($email);
			echo json_encode($response); 
		    exit();
		}

		//verification pour password
		if($this->input->post('id') == 'pass_re'){
			$password = $this->input->post('value');
			$response = $this->fh_userlib->tr_form_register_check_password($password);
			echo json_encode($response); 
		    exit();
		}

	}

	//activation de nouveau compte 
	public function activate_account($token = NULL, $username = NULL){

		$response = $this->fh_userlib->tr_account_activate($token, $username);
		$this->fh_userlib->get_msg_activate($response);

	}
}
?>