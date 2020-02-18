<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use \Mailjet\Resources;
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
			$id=$this->Contact_Model->contact_send($nom,$email,$message);
			$mj = new \Mailjet\Client('77296be1b256d268ec2dfdfa0b970e70','af1d452570505c5ae7b39b4705d26e3a',true,['version' => 'v3.1']);
			$body = [
			  'Messages' => [
				[
				  'From' => [
					'Email' => "l0ve-nothing@hotmail.com",
					'Name' => $nom
				  ],
				  'To' => [
					[
					  'Email' => "l0ve-nothing@hotmail.com",
					  'Name' => "Esther"
					]
				  ],
				  'Subject' => "Message provenant du formulaire de contact : ".$email,
				  'TextPart' => "contact formulaire",
				  'HTMLPart' => $message,
				  'CustomID' => "formulaire".$id
				]
			  ]
			];
			$response = $mj->post(Resources::$Email, ['body' => $body]);
			$response->success() ;
			$this->render('contactsuccess_vw');
			}
	}
}