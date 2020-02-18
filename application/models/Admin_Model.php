<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Model extends CI_Model {
   
   public function __construct(){
       parent::__construct();
       $this->load->database();
   }

   private $table ="skills_siteweb";

  


   public function skills_read(){
    $this->db->select('titre_fr,content_fr,id');
    $this->db->from($this->table);
    $this->db->where('deleted',0);
    return $this->db->get()
    ->result();


     
}
}
