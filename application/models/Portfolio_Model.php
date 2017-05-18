<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
Class Portfolio_Model extends CI_Model
{
	private $table = "projects";

	public function __construct(){
		 parent::__construct();
		 $this->load->database();
	}

    function get_where($where=array()){
         $this->db->where('deleted',0); //ramene juste les deleted = 0 
        $query = $this->db->get_where($this->table, $where); 
        return $query; 
    }
}