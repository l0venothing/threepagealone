<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {
    public function __construct()
    {
		 parent::__construct();
		 $this->load->model('Contact_Model');
		
       
	}
	public function index()
	{       
		$this->render('contact_vw');
	}

	public function contact_form()
	{       
		$this->form_validation->set_rules('nom', 'nom', 'trim|required|min_length[5]',array('required' => 'Votre %s est requis'));
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email',array('required' => 'Oups, il manque votre %s'));
		$this->form_validation->set_rules('message', 'message', 'trim|required|min_length[5]',array('required' => 'Que désirez-vous nous dire dans votre %s ?'));
        if ($this->form_validation->run() == FALSE)
        {
        //sauvegarder la valeur de l'input dans l'input
        $this->data['nom']=$this->input->post('nom');            
        $this->data['message']=$this->input->post('message');            
        $this->render('contact_vw');
        }
        else
            {
			// récupérer les données
			$nom = $this->input->post('nom');
			$email = $this->input->post('email');
			$message = $this->input->post('message');
			$this->Contact_Model->contact_send($nom,$email,$message);
			$config['useragent']    = 'CodeIgniter';
			$config['protocol']     = 'smtp';
			$config['smtp_host']    = 'smtp.mailtrap.io';
			$config['smtp_user']    = '3b0bc61feb61ed'; // Your gmail id
			$config['smtp_pass']    = '90eb6f939f66c6'; // Your gmail Password
			$config['smtp_port']    = 2525;
			$config['wordwrap']     = TRUE;    
			$config['wrapchars']    = 76;
			$config['mailtype']     = 'html';
			$config['charset']      = 'UTF-8';
			$config['validate']     = FALSE;
			$config['priority']     = 3;
			$config['newline']      = "\r\n";
			$config['crlf']         = "\r\n";

			$this->load->library('email');
			$this->email->initialize($config);

			$this->email->from('3b0bc61feb61ed', 'TSS DEV');
			$this->email->to('bluebirdinette@gmail.com'); 

			$this->email->subject('Message provenant de ton site web CV');
			$this->email->message($nom, $email, $message);    

			$this->email->send();
			$this->render('contactsuccess_vw');
			}
	}
}