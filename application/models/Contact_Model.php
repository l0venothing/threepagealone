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
            'message' => $message,
           
        );
        $this->db->insert($this->table, $data);
$res=$this->contact_read();
   
     
      return $res[0]->id;
   }


   public function contact_read(){
    $this->db->select('MAX(id) as id');
    $this->db->from($this->table);
    return $this->db->get()
    ->result();


     
}
}
