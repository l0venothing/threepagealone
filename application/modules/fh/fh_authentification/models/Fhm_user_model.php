<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fhm_user_model extends CI_Model
{
	
	public function __construct() {
	    parent::__construct();
	    //require_once($_SERVER['DOCUMENT_ROOT'].'/application/');
	    //$this->output->enable_profiler(TRUE); 

	    // Assign the CodeIgniter super-object
	}
    
	//Verification login
	public function verif_connex($post, $params)
	{
		$id = $post['psorem_login'];
		$pass = $post['pass_login'];

		$table = $params["table_name"];
		$name_user_sql = $params["field_pseudo"];
		$email_user_sql = $params["field_email"];
		$password = $params['field_password'];
		$valid_date = $params['field_valid_date'];
		$function_decrypt = $params["function_decrypt"];
	    
		if(!filter_var($id, FILTER_VALIDATE_EMAIL)){

			$this->db->where($name_user_sql, $id);
		}else{
			$email = strtolower($id);
			$this->db->where($email_user_sql, $email);
		}

		$query = $this->db->get($table);
		$row = $query->row();
;		
		if($query->num_rows() ==1 ){
		    
		    switch ($function_decrypt) {
				case "ban_verif_encrypt":
					
				     $is_valid_password=ban_verif_encrypt($pass, $row->$password);

				     break;

				default:
					
				     $is_valid_password=password_verify($pass, $row->$password);
				     break;
			}

		
		   if($is_valid_password){
				
				$data = array(
					'valid_date' => $row->$valid_date
				);
				
				return $data;
			}else{
				return False;
			}

	    }else{
			return False;
	    }

	}

	//verification l'existance d'un user
	public function isset_user($id, $params){

		$table = $params["table_name"];
		$name_user_sql = $params["field_pseudo"];
		$email_user_sql = $params["field_email"];
		   
		if(!filter_var($id, FILTER_VALIDATE_EMAIL)){

			$this->db->where($name_user_sql, $id);
		}else{
			$email = strtolower($id);
			$this->db->where($email_user_sql, $email);
		}

		$query = $this->db->get($table);
	
		if($query->num_rows() == 1){
			return true; 
		}else{
			return false; 
		}
	}
	public function isset_mail($id, $params){

		$table = $params["table_name"];
		// $name_user_sql = $params["field_pseudo"];
		$email_user_sql = $params["field_email"];
		   
	
			$email = strtolower($id);
			$this->db->where($email_user_sql, $email);
		

		$query = $this->db->get($table);
		
		if($query->num_rows() == 1){
			return true; 
		}else{
			return false; 
		}
	}
	//return les données d'un user
    public function get_user($id, $params){

    	$table = $params["table_name"];
		$name_user_sql = $params["field_pseudo"];
		$email_user_sql = $params["field_email"];

    	if(!filter_var($id, FILTER_VALIDATE_EMAIL)){

			$this->db->where($name_user_sql, $id);
		}else{
			$email = strtolower($id);
			$this->db->where($email_user_sql, $email);
		}

		$query = $this->db->get($table);

		return $query->row();
    }


	//Ajoute le token et la date pour reset 
	public function update_token_user($token, $email, $params){

		$table = $params["table_name"];
		$email_user_sql = $params["field_email"];
		$reset_date_sql = $params["field_reset_date"];
		$reset_token_sql = $params["field_reset_token"];

	    $data = array(
	    	$reset_token_sql => $token
	    );
	   	
	   	$this->db->set($reset_date_sql, 'NOW()', FALSE);
	    $this->db->where($email_user_sql, $email);
		$this->db->update($table, $data);

		return true;

	}

	//effectue les modifs necessaire pour reset et activate
	public function update($ref, $pseudo, $password, $params){

		$table = $params["table_name"];
		$field_pseudo = $params["field_pseudo"];
		$field_password = $params["field_password"];
		$reset_date_sql = $params["field_reset_date"];
		$reset_token_sql = $params["field_reset_token"];
		$field_valid_token = $params["field_valid_token"];
		$field_valid_date = $params["field_valid_date"];

		if($ref == "reset"){
			$data = array (
	   		$reset_token_sql => NULL,
	   		$reset_date_sql => NULL,
	   		$field_password => $password
	   	    );
		}

		if($ref == "activate"){

			$data = array (
	   			$field_valid_token => NULL,
	   	    );
	   	
	     	$this->db->set($field_valid_date, 'NOW()', FALSE);
		}

		$this->db->where($field_pseudo, $pseudo);
		$this->db->update($table, $data);

		return true;
	}

	//verification de token pour activate et reset
	public function confirm_token($ref, $token, $pseudo, $params){

		$table = $params["table_name"];
		$name_user_sql = $params["field_pseudo"];
		$field_valid_token = $params['field_valid_token'];
		$field_reset_token = $params["field_reset_token"];

		if($ref == "reset"){

			$this->db->where($field_reset_token, $token);
		    $this->db->where($name_user_sql, $pseudo);

		}else if($ref == "activate"){

			$this->db->where($field_valid_token, $token);
		    $this->db->where($name_user_sql, $pseudo);
		}else{
			return false;
		}
		
		$query = $this->db->get($table);

		if($query->num_rows() == 1){
			return true; 
		}else{
		return false;
		}

	}

	//Insertion de nouveau utilisateur
	public function insert_user($username, $email, $pass, $token,$nom,$naissance,$statut, $params){

		$table_name = $params['table_name'];
		$field_pseudo = $params['field_pseudo'];
		$field_email = $params['field_email'];
		$field_password = $params['field_password'];
		$field_valid_token = $params['field_valid_token'];
		$field_nom = $params['field_nom'];
		$field_prenom = $params['field_prenom'];
		$field_naissance = $params['field_naissance'];
		$field_statut=$params['field_statut_user'];
		$data = array(

			$field_pseudo => $email,
			$field_email => $email,
			$field_password => $pass,
			$field_valid_token => $token,
			$field_nom => $nom,
			$field_prenom => $username,
			$field_naissance => $naissance,
			$field_statut=>$statut,

		);
		
		$this->db->insert($table_name, $data);

		return true;

	}
	

}
?>