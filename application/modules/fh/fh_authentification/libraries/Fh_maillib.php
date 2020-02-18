<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fh_maillib {

	function __construct() {

         // Assign the CodeIgniter super-object
         $this->CI =& get_instance();

         $this->CI->load->model('fhm_mail_model');
         $this->CI->load->library('email');
    }

    public function set_email($reference){

    	return $this->CI->fhm_mail_model->set_email($reference);
    }

    public function send($to, $subject, $content, $from_mail, $from_name){

    	$this->CI->email->from($from_mail, $from_name);
		$this->CI->email->set_mailtype("html");
		$this->CI->email->to($to);

		$this->CI->email->subject($subject);
		$this->CI->email->message($content);

		if($this->CI->email->send()){
			return true;
		}else{
			return false;
		}

    }

}