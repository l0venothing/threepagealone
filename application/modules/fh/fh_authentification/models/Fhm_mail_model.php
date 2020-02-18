<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fhm_mail_model extends CI_Model
{

	//retour l'email demander
	public function set_email($reference){

		$this->db->where('reference', $reference);

		$query = $this->db->get('emails');

		if($query->num_rows() == 1){
			return $query->row();
		}else{
			return false;
		}
	}

}
?>