<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact_Model extends CI_Model {
   
   public function __construct(){
       parent::__construct();
       $this->load->database();
   }

   private $table ="user";

   public function contact_send($nom, $email, $message){
       $data = array(
            'nom'      => $nom,
            'email'    => $email,
            'message' => $message
        );
        $this->db->insert($this->table, $data);
   }
}
