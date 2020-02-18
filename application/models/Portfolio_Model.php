<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
Class Portfolio_Model extends CI_Model
{
    private $table = "projects";
    private $tableWebsite ="siteweb";

	public function __construct(){
		 parent::__construct();
		 $this->load->database();
	}

  public  function get_where($table){
         $this->db->where('deleted',0); //ramene juste les deleted = 0 
        $query = $this->db->get_where($table); 
        return $query; 
    }
  public   function get_page_libre($champs,$table,$id=1){
        $this->db->select($champs);
        $this->db->from($table);
        $this->db->where('deleted =0 AND id ='.$id);
        return $this->db->get()
  ->result();
    }
    
    function get_site($where=array()){
    //     $this->db->where('deleted',0); //ramene juste les deleted = 0 
    //    $querySite = $this->db->get_where($this->tableWebsite, $where); 
    //    return $querySite; 
// '	skills_siteweb.id ,	skills_siteweb.id_siteweb ,	skills_siteweb.titre ,	skills_siteweb.description 	,skills_siteweb.deleted '
 
//  $querySite=$this->db->query("SELECT siteweb.id,nom,imagepath,description FROM siteweb LEFT JOIN skills_siteweb ON siteweb.id = skills_siteweb.id_siteweb WHERE siteweb.deleted =0 ");
           $champs='siteweb.id,nom,imagepath,content_fr,content_en,imagepath2';
            $this->db->select($champs);
	  
	    $this->db->from("siteweb");
	    $this->db->join("skills_siteweb","siteweb.id=skills_siteweb.id_siteweb","left");
	  
	    
	  
		    $this->db->where("siteweb.deleted",0);
		
	    
	  
	    return $this->db->get()
		  ->result();
		
   }



}