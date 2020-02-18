<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Listelangues extends CI_Controller {
   var $table_fichier = 'fichier_langue';
   var $table_traduction='traduction';

 	function __construct() {
         parent::__construct();
	        if($this->session->userdata("logged_in")&&$this->session->userdata("id_statut")&&$this->session->userdata("id_statut")==1):

         $this->load->database();
         $this->load->helper('url');
         $this->load->helper('file');
         $this->load->add_package_path(APPPATH.'modules/listelangues');

      
         $this->load->library('llistelangues');
         $this->load->model("M_listelangues");
         // $this->lang->load('bouton_form_lang','fr');
         // $this->lang->load('fichier1_lang','fr');
         // $this->lang->load('autre_fichier_lang','fr');


         $this->load->library('pagination');
	 else:
	     redirect("app/login");
	 endif;
      // $this->lang->load('fichier1_lang','fr');
        
   }



   public function index($id_fichier=1){
       $data["word"]=$this->list_word($id_fichier,$page=1,$message=NULL);
      
       $this->load->view("v1/dashboard_admin_lang",$data);
//      try
//      {
//        
//          $pagingConfig   = $this->llistelangues->initPagination(base_url().'listelangues/index/',$this->M_listelangues->record_count('fichier_langue'),3,10);
//          
//          $this->data["pagination_helper"]   = $this->pagination;
//          $this->data['fichiers']= $this->M_listelangues->get_by_range('fichier_langue',$pagingConfig,$page-1);
//         // $this->data["messages"]= $this->M_listelangues->fichiers_paginable($limit,$page-1);
//
//
//         $colums= $this->M_listelangues->get_column_lang(0);
//     
//         $lg_col= $this->M_listelangues->get_column_lang(1);
//         $fields=array();
//         $this->data['lg_col']=$lg_col;
//         foreach($colums as $c){array_push($fields,$c->TABLE_NAME.'.'.$c->COLUMN_NAME);}
//         // $this->data['fichiers']= $this->data["messages"];
//         $this->data['message']= $message;
//             $this->load->view('/listefichiers.php',$this->data);
//          $this->load->view('/listelangues_js.php');      
//      }
//      catch (Exception $err)
//      {
//          log_message("error", $err->getMessage());
//          return show_error($err->getMessage());
//      }

      
      
//       $fichier_trad= $this->M_listelangues->fichiers_paginable($limit,$page);

  

//       $data['fichiers']=$fichier_trad;
   
//       $data['lg_col']=$lg_col;
//       $data['message']=$message;

      

   
  

// $config_pagi['base_url'] = base_url('listelangues/index');
// $config_pagi['page'] = $page;
// $config_pagi["uri_segment"] = 3;
// $config_pagi['per_page'] = $limit;
// $config_pagi['query']='SELECT * from '.$this->table_fichier;

// $config_pagi['first_url'] =$config_pagi['base_url'] .'/0';
// $config_pagi['total_rows']  =$this->M_listelangues->record_count();
// print_r($config_pagi);
// $config_pagi['data_page_attr'] = "data-ci-pagination-projets-vig";

// $data["pagination"]=$this->get_pagination($config_pagi);
// // $data["vload_adresse"]=$config_pagi['base_url'].'/'.$page;

// // $data['pagination'] =$this->get_pagination($config_pagi);

//       $this->load->view('/listefichiers.php',$data);
//       $this->load->view('/listelangues_js.php');
}




public function list_word($id_fichier,$page=1,$message=NULL){

   try
   {
      $limit=150;
       $pagingConfig   = $this->llistelangues->initPagination(base_url().'listelangues/list_word/'.$id_fichier.'/',$this->M_listelangues->record_count('traduction'),4,$limit);
       
       $this->data["pagination_helper"]   = $this->pagination;
       $this->data["messages"] = $this->M_listelangues->get_by_range('traduction',$pagingConfig,$page-1,$id_fichier);
      // $this->data["messages"]= $this->M_listelangues->fichiers_paginable($limit,$page-1);


    
      $this->data['fichiers']= $this->data["messages"];
      // $limit = 2;

      $fields=array();
 $colums= $this->M_listelangues->get_column_lang(0);
 $lg_col= $this->M_listelangues->get_column_lang(1);
      foreach($colums as $c){array_push($fields,$c->TABLE_NAME.'.'.$c->COLUMN_NAME);}

         $fields_string='';
         foreach ($fields as $f){$fields_string.=$f.' , ';}


   //  var_dump($fields_string);
      $fields_string=substr($fields_string,0,strlen($fields_string)-3);
      // $query_join='SELECT * from '.$this->table_fichier;
      // $fichier_trad= $this->M_listelangues->mots_paginable($limit,$page,$fields_string,$id_fichier);


   $params['fields']=$fields_string;
   $params['table_traduction']=$this->table_traduction;
   $params['table_fichier']=$this->table_fichier;
   $params['id_fichier']=$id_fichier;

   $params['limit']=$limit;
   $params['page']=$page;
   // $fichier_trad= $this->M_listelangues->mots_paginable($params);


      // $query_join='SELECT '.$fields_string.' from '.$this->table_traduction.' LEFT JOIN '.$this->table_fichier.' on '.$this->table_fichier.'.id_fichier = '.$this->table_traduction.'.id_fichier WHERE '.$this->table_fichier.'.id_fichier ='.$id_fichier. ' ORDER BY '.$this->table_traduction.'.index';
  
    
    
      // $fichier_trad= $this->M_listelangues->query_direct($query_join);
      

      
   
      

   
      // print_r($fichier_trad);
            //  $this->data['fichiers']=$fichier_trad;
             $this->data['fields']=$fields;
             $this->data['lg_col']=$lg_col;
             $this->data['message']=$message;
             $this->data['id_fichier']=$id_fichier;
      return $this->load->view('/listelangues.php',$this->data,TRUE);
     
   }
   catch (Exception $err)
   {
       log_message("error", $err->getMessage());
       return show_error($err->getMessage());
   }
     
     
      // $lg_col= $this->M_listelangues->get_column_lang(1);


   
}
public function get_form()
{
   $post=$this->input->post();
   // print_r($post);


   $table=$post['table'];
   $form_type=$post['form_type'];
   $champ_saved=$post['champ_saved'];
   $champ_id=$post['champ_id'];
   $id=$post['id'];


   $params = array(
      "type"=>$form_type,
      "table"=>$table,
      "champ"=>$champ_saved,
      "champ_id"=>$champ_id,
      "id"=>$id
   );


   $view= "<form class='form_js form-inline' method='post'>";					
   $view.= "<div class='form-row'>";
   $view.="<div class='col-12'>";
  
            	
   $params["table"] = $table;
   $params["champ_id"] = $champ_id;
   $params["champ"] = $champ_saved;
   $params["id"]=$id;								
   $view.=$this->get_form_data($params);
            
 
   // $cancel_lang= $this->lang->line('cancel');


   if (null!= $this->lang->line('cancel')): $cancel_lang=$this->lang->line('cancel');else: $cancel_lang='Annuler';endif; 

   if (null!= $this->lang->line('submit')): $submit_lang=$this->lang->line('submit');else: $submit_lang='Enregistrer';endif; 
   $view.= "</div></div>";
   $view.= "<div class='form-row'>";
   $view.="<div class='col-12'>";
   $view.="<button class='btn btn-danger form_js_submit ml-2' type='submit'>".$submit_lang;
   // $view.=$submit_lang;
   $view.=" </button>&nbsp;";
   $view.="<button class='btn btn-secondary cancel_form_js'>";
   $view.=$cancel_lang;
   $view.="</button>";
   $view.="</div>";
   $view.="</div>";
   
   $view.="</form>";
   
     echo $view;
     


}

public function get_form_data($params){
   $view="";
   
   $table= $params["table"];
   
  
   $fields= $params["champ"];
   
   
   
   $where=$params["champ_id"]."=".$params["id"];
   
      

   
   
   $query='SELECT '."'".$fields."'".' from '.$table.' WHERE '.$where;
   $data= $this->M_listelangues->query_direct($query);
   $params["data"]=$data;		
   $view.= $this->get_input($params);
   
   return $view;
}


public function get_input($params){
   $view="";
   $champ_a_update=$params['champ'];
   switch($params["type"])
    {	
  
  
       
     
      case 'input':
            $champ = $params["champ"];
            //print_r($params["data"]);die();
       
            $view.="<span style='display:none' class='error_required text-danger'></span>";    
            $view.="<span style='display:none' class='error_email text-danger'></span>";
            $value = $params["data"][0]->$champ;
           
            $view.="<input placeholder='".$champ_a_update."' type='text' class='form-control ' name='".$champ_a_update."' value=\"".htmlspecialchars($value)."\" table='".$params['table']."' champ_id='".$params["champ_id"]."' champ_val='".$params["id"]."'  type_input='".$params["type"]."'  >";
          
            
         break;

    
      }			
return $view;
}



public function update_lang()
{
   $id_fichier=$this->input->get('id_fichier');
   $lg_col= $this->M_listelangues->get_column_lang(1);
   $query='SELECT * from '.$this->table_fichier.' WHERE id_fichier = '.$id_fichier;
      $fichier= $this->M_listelangues->query_direct($query);

   $query_t='SELECT * from '.$this->table_traduction.' WHERE id_fichier = '.$id_fichier;
   $traduction= $this->M_listelangues->query_direct($query_t);
 

   // foreach ($fichiers as $f){
      foreach ($lg_col as $lang){

   // print_r($lg_col);die();
$lg= $lang->COLUMN_NAME;

$lg=substr($lg,5,2);
         $langstr=
         "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n/**\n* Langue:  ".$lg." \n*\n*/"."\n\n\n";

         foreach ($traduction as $row){
           


               if ($row->id_fichier===$id_fichier):
                  switch($lang){
                     default:
                     $field='word_'.$lg;
                     $langstr.= "\$lang['".trim($row->index)."'] = \"".str_replace('"', '\"', stripslashes($row->$field))."\";\n";
                     // endif;
                     break;
                  }





                  // if ($row->lang ===$lang):
                      
               endif;
                      
                   
                       
         }


         write_file(APPPATH.'language/'.$lg.'/'.$fichier[0]->nom.'_lang.php', $langstr);

      

// }
   }   
   echo json_encode(array('result'=>'success'));

}



   public function submit_pencil_form()
   {  
      $post=$this->input->post();
      // print_r($post);

      $field=$post['champ_saved'];
      $table=$post['table'];
      $where= $post['champ_id']."=".$post['id']; 
      $value=$post['value'];

      $query='UPDATE '.$table.' SET '.$field.' = '."'".$value."'".' WHERE '.$where;
      $data= $this->M_listelangues->query($query);
      
   }

   public function add_lang(){
      $params["lang"]=stripslashes(trim($this->input->get("lang")));

     
      


  $query="ALTER TABLE " ."traduction"." ADD word_".$params['lang']." TEXT ";
      $data= $this->M_listelangues->query($query);


    
      if (null!= $this->lang->line('col_add')):echo $this->lang->line('col_add');else:echo 'colonne ajoutée';endif; 
       redirect("listelangues/index/1/1");


   }


   public function remove_lg()
   {
      // ALTER TABLE `traduction` DROP `word_en`; 
      $params["lang"]=stripslashes(trim($this->input->get("lang")));


      $query="ALTER TABLE " ."traduction"." DROP ".$params['lang'];
      $data= $this->M_listelangues->query($query);
      $message= 'colonne supprimee';
      if (null!= $this->lang->line('col_del')):echo $this->lang->line('col_del');else: $message= 'colonne supprimée';endif; 
      redirect("listelangues/index/1/2");
   }

   public function td_plus()
   {
      // $type=$this->input->get("type");
      $nom=$this->input->post();
      // print_r($nom);die();

    
      $query='INSERT INTO '.$this->table_fichier.' (`id_fichier`, `nom`, `is_delete`) VALUES (NULL,'.'"'.$nom['nom'].'"'.', 0)';
   
      $data= $this->M_listelangues->query($query);
      // var $table_fichier = 'fichier_langue';
      // var $table_traduction='traduction';
      // redirect("listelangues/index/0/2");
      echo json_encode(array('result'=>'success'));
   }


   public function mot_insert()
   {
     
    
     
      $id_fichier=$this->input->get("id_fichier");

      $index=$this->input->post("index");

      $word_fr=$this->input->post("word_fr");
      $word_nl=$this->input->post("word_nl");



      $query='INSERT INTO '.$this->table_traduction.' (
         `id_fichier`, `index`, `word_fr`,`word_nl`
         ) VALUES ('.$id_fichier.','.'"'.$index.'",'.'"'.$word_fr.'"'.','.'"'.$word_nl.'"'.')';


         $data= $this->M_listelangues->query($query);
       
         redirect("listelangues/list_word/".$id_fichier."/1/1");
         // ($id_fichier,$page=1,$message=NULL){
   }


}