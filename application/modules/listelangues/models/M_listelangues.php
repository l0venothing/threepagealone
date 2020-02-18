<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_listelangues extends CI_Model {
    
   public function query_direct($sql,$count=false)
   {
       if ($count):
        return $this->db->query($sql)->num_rows();
       else:
       return $this->db->query($sql)->result();
       endif;
   }
   
   public function query($sql)
   {
       return $this->db->query($sql);
   }



   public function get_column_lang($filtre=0){
       if ($filtre === 0):
        $query='SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME =' ."'".'traduction'."' GROUP BY COLUMN_NAME ";
      

       else:
    $query= "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'traduction' AND COLUMN_NAME LIKE '%word_%' GROUP BY COLUMN_NAME" ;

       endif;
    return $this->db->query($query)->result();



   }


public function record_count($table,$id_fichier=0) {

    switch ($table){
        case 'fichier_langue':
        return $this->db->count_all($table);
        break;

        case 'traduction':
    return   $this->db->where('id_fichier',$id_fichier)->from($table)->count_all_results();
 
        break;
    } 
  
}



public function get_by_range($table,$pagingConfig,$page,$id=0){


    switch ($table){
        case 'fichier_langue':
            $query = $this->db->get($table, $pagingConfig['per_page'], (($page) * $pagingConfig['per_page']));
            return $query->result();
        break;

        case 'traduction':
        $query = $this->db->get_where($table, array('id_fichier' => $id),$pagingConfig['per_page'], (($page) * $pagingConfig['per_page']));

        // $query = $this->db->get($table, );
            return $query->result();
        break;
    }
    
}



}