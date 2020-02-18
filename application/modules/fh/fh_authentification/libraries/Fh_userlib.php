<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fh_userlib {

    //URL
    var $file_config = 'fh_userlib';
    var $ctrl_form_exe = 'app'; 
    var $mtd_form_exe = 'fh_authentification_exe';
    var $ctrl_success_login = 'member';

    //Base de données
    var $table_name = 'users'; 
    var $field_id = 'id';
    var $field_pseudo = 'username'; 
    var $field_email = 'mail'; 
    var $field_password = 'password'; 
    var $field_reset_date = 'reset_date'; 
    var $field_reset_token = 'reset_token'; 
    var $field_valid_token = 'valid_token';
    var $field_valid_date = 'valid_date';
    var $field_nom='nom';
   var $field_prenom='prenom';
   var $field_naissance='naissance';
 var  $field_statut_user='id_statut';
    //Systeme password
    var $function_encrypt = 'password_hash'; 
    var $function_decrypt = 'password_verify';

    //Template
    var $template = 'page';

    //TITRE
    var $title_login = 'Connexion'; 
    var $title_reset = 'Mot de passe oublié ?';
    var $title_register = 'Inscription';
    var $title_reinit = 'Reinitialisation';

    var $title_activate = 'Compte activé';
    var $descript_activate = "Votre compte vient d\'être activé, vous pouvez maintenant vous connecter.";
    var $title_no_activate = "Token incorrect";
    var $descript_no_activate = "Token ou pseudo incorrect";

    var $text_invalid_token_reinit = 'Ce token est invalide ou expiré';
    var $description_reset = 'Vous avez oublié votre mot de passe ? <br> Indiquez-nous votre adresse email et nous vous renverrons les instructions de reinitialisation.';

    //Input
    var $input_psorem = 'Entrer votre pseudo ou email'; 
    var $input_email = 'Entrer votre adresse mail';
    var $input_pseudo = 'Entrer votre pseudo'; 
    var $input_password = 'Entrer votre mot de passe'; 
    var $input_repassword = 'Réecrire votre mot de passe'; 
    var $input_password_reinit = 'Entrer votre nouveau mot de passe'; 
    var $input_repassword_reinit = 'Réecrire votre nouveau mot de passe'; 
    
    var $input_label = 'in'; // values : 'in' OR 'out' 

    //Button
    var $btn_text_go_site = 'retour au site'; 
    var $btn_text_go_reset = 'Mot de passe oublié ?'; 
    var $btn_text_go_login = 'Retour à la page de connexion'; 
    var $btn_text_go_register = 'Pas encore inscrit ?'; 
    var $btn_text_exe_reset = 'Reinitialiser'; 
    var $btn_text_exe_login = 'Se connecter'; 
    var $btn_text_exe_register = 'S\'inscrire'; 
    var $btn_text_exe_reinit = 'Envoyer'; 

    var $btn_text_modal_or_collapse = 'connectez-vous'; //button de lancement de modal et collapse

    var $btn_reset = 'on'; // values : 'on' OR 'off' 
    var $btn_register = 'on'; // values : 'on' OR 'off'

    //Email
    var $from_name = 'Bancalendrier';
    var $from_mail = 'jeremy.blampain@banlieues.be';

    //session 
    var $is_connect_text = 'logged_in';
    var $is_id_session = "id";
    var $is_login_session = "username";
    var $is_email_session = "email";

    //Erreurs traitement formulaire/////////////////////////////////////////////////////////////////////
    //login
    var $empty_fields_login = 'Veuillez completer vos identifiants';
    var $not_match_login = 'Les informations ne correspondent pas.';
    var $not_valid_account = 'Veuillez d\'abord valider le compte via votre mail.';

    //reset
    var $empty_fields_reset = 'Entrer votre pseudo ou adresse mail.';
    var $not_match_reset = 'Cette information n’est pas valide.';
    var $succes_reset = 'Bravo! un message de reinitialisation vous a été envoyé par mail.';
    var $unknown_reset = 'Erreur inconnu ! veuillez contacter le webmaster.';

    //reinit
    var $empty_fields_reinit = 'Entrer vos nouveaux mot de passe.';
    var $not_similar_reinit = 'Les mots de passe ne correspondent pas';
    var $format_incorrect_reinit = 'Le mot de passe doit contenir au moins 8 caractères avec 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spécial (& @ #).';
    var $token_incorrect_reinit = 'Ce token est invalide ou expiré.';
    var $unknown_reinit = 'Nous rencontrons de problème lors de la mise à jour de votre mot de passe, veuillez contacter le webmaster.';
    var $success_reinit = 'Votre mot de passe a été mis à jour.';

    //register
    var $success_register = "Inscription terminée, un mail va vous parvenir pour activer votre compte";
    var $unknown_register = 'Erreur inconnu, veuillez reessayer ulterieurement ou contacter le webmaster.';
    var $error_form_register = 'Veuillez corriger les champs du formulaire :';
    var $strlen_name_register = 'Pseudo doit au moins contenir 4 caractères';
    var $format_name_register = 'Pseudo doit être alphanumérique et sans espace';
    var $exist_name_register = "Cet utilisateur existe déjà !";
    var $incorrect_email_register = "E-mail invalide !";
    var $exist_email_register = "E-mail existe déjà dans la BD !";
    var $strlen_password_register = "Le mot de passe doit contenir au moins 8 caractères";
    var $format_password_register = "Le mot de passe doit contenir au moins 8 caractères avec 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spécial (& @ #).";

    
	public function __construct($params= array()){  
	    
         // Assign the CodeIgniter super-object
         $this->CI =& get_instance();

         //verifie si j'ai des parametres
         if (count($params) > 0)
         {
            $this->initialize($params);
         }   

	 $this->CI->lang->load("connection_lang",$this->CI->session->userdata("lg"));
         $this->CI->load->library('Fh_maillib'); //librairie des gestions d'email
         $this->CI->load->model('fhm_user_model');
         $this->CI->load->helper('fhh_helper');
         
         $this->CI->load->library('session'); //librairie session de base

         //echo ban_encrypt("@1a2Z3E4R&"); die();
    }


    function initialize($params = array())
    {
        if (count($params) > 0)
        {
            foreach ($params as $key => $val)
            {
                $val = trim($val);
                if (isset($this->$key) && !empty($val))
                {
                    $this->$key = $val;
                }
            }
        }
    }
    

    private function params_model(){

        $params = array();
        $params['table_name'] = $this->table_name;
        $params['field_id'] = $this->field_id;
        $params['field_pseudo'] = $this->field_prenom;
     
        $params['field_email'] = $this->field_email;
        $params['field_password'] = $this->field_password;
        $params['field_reset_date'] = $this->field_reset_date;
        $params['field_reset_token'] = $this->field_reset_token;
        $params['field_valid_token'] = $this->field_valid_token;
        $params['field_valid_date'] = $this->field_valid_date;
        $params['function_decrypt'] = $this->function_decrypt;
        $params['field_nom']=$this->field_nom;
        $params['field_prenom']=$this->field_prenom;
        $params['field_naissance']=$this->field_naissance;
        $params['field_statut_user']=$this->field_statut_user;

        return $params;
    }

    private function params_view(){
        
        $data = array(
            'input_label' => $this->input_label,
            'title_login' => $this->title_login,
            'title_reset' => $this->title_reset,
            'title_register' => $this->title_register,
            'text_invalid_token_reinit'=>$this->text_invalid_token_reinit,
            'input_psorem' => $this->input_psorem,
            'input_password' => $this->input_password,
            'input_pseudo' => $this->input_pseudo,
            'input_email'=> $this->input_email,
            'input_password' => $this->input_password,
            'input_repassword' => $this->input_repassword,
            'btn_text_exe_login' => $this->btn_text_exe_login,
            'btn_text_exe_reset' => $this->btn_text_exe_reset,
            'btn_text_exe_register' => $this->btn_text_exe_register,
            'btn_text_go_register' => $this->btn_text_go_register,
            'btn_text_go_reset' => $this->btn_text_go_reset,
            'btn_text_go_login' => $this->btn_text_go_login,
            'btn_reset' => $this->btn_reset,
            'btn_register' => $this->btn_register,
            'btn_text_modal_or_collapse' => $this->btn_text_modal_or_collapse,
            'description_reset' => $this->description_reset,
            'controller' => $this->ctrl_form_exe,
            'methode' => $this->mtd_form_exe,
            'title_reinit' => $this->title_reinit,
            'input_password_reinit' => $this->input_password_reinit,
            'input_repassword_reinit' => $this->input_repassword_reinit,
            'btn_text_exe_reinit' => $this->btn_text_exe_reinit,
            'btn_text_go_site' => $this->btn_text_go_site,

        );

        return $data;
    }

    

	public function get_js(){
        //au cas ou il existe des views dans js (c'est le cas d'un modal)
        if($this->template == 'modal'){
            $data = $this->params_view();

            $views['login'] = $this->CI->load->view("fhv_login", $data, TRUE);

            if($this->btn_reset == 'on'){
                $views['reset'] = $this->CI->load->view("fhv_reset", $data, TRUE);
            }

            if($this->btn_register == 'on'){
                $views['register'] = $this->CI->load->view("fhv_register", $data, TRUE);
            }

            if($this->template == 'modal'){
                $view['modal'] = $this->CI->load->view("template/modal/fhv_modal", $views, TRUE);}

            $view['url'] = $this->ctrl_success_login;

             $view["page_file_config"] = $this->file_config; 

            return $this->CI->load->view("fhv_authentification_js", $view, TRUE);

        }else{
            $data['url'] = $this->ctrl_success_login;
            $data["page_file_config"] = $this->file_config; 
            return $this->CI->load->view("fhv_authentification_js", $data, TRUE);
        }
        
    }

    public function get_reinit($token, $username){
        $params = $this->params_view();

        $data['result'] = $this->CI->fhm_user_model->confirm_token('reset', $token, $username, $this->params_model());
        $data['js'] = $this->get_js();
        $data['header'] = $this->CI->load->view('template/reinit/fhv_header_re', array('token'=>$token, 'username'=>$username), TRUE);
        $data['footer'] = $this->CI->load->view('template/reinit/fhv_footer_re', NULL, TRUE);
        $data['reinit'] = $this->CI->load->view('fhv_reinit', $params, TRUE);

         return $this->CI->load->view('template/reinit/fhv_user_view_reinit', $data);
    }

    public function get_view(){

        $data = $this->params_view();

        $views['js'] = $this->get_js();

        $views['login'] = $this->CI->load->view("fhv_login", $data, TRUE);

        if($this->btn_reset == 'on'){
            $views['reset'] = $this->CI->load->view("fhv_reset", $data, TRUE);
        }

        if($this->btn_register == 'on'){
            $views['register'] = $this->CI->load->view("fhv_register", $data, TRUE);
        }

        return $this->CI->load->view('template/'.$this->template."/fhv_user_view_".$this->template, $views, TRUE);
    }



    //traitement de connexion 
    public function tr_form_login($post){
	
	     $db = $this->params_model();


        if(empty($post['psorem_login']) || empty($post['pass_login'])){
            $data = array(
                'id' => false,
                'msg_error' => $this->CI->lang->line("error_identifiants"),
                'type' => 'login',
            );
            return $data;
        }

    	$array = $this->CI->fhm_user_model->verif_connex($post, $db);

        if($array == false){
            $data = array(
                'id' => false,
                'msg_error' => $this->not_match_login,
                'type' => 'login',
            );
            return $data;
        }else{

            if(is_null($array['valid_date'])){
                $data = array(
                    'id' => false,
                    'msg_error' => $this->not_valid_account,
                    'type' => 'login',
                );
            }else{
                $data = array(
                    'id' => true,
                    'id_user' => $post['psorem_login'],
                    'type' => 'login',
                );
            }

            return $data;
        }

        
    }

    //creation de session pour un user
    public function create_session($id){

        $username_field=$this->field_pseudo;
        $email_field=$this->field_email;
        $id_field=$this->field_id;

        $user = $this->CI->fhm_user_model->get_user($id, $this->params_model());

        $user_id = $user->$id_field;
        $user_pseudo = $user->$username_field;
        $user_email = $user->$email_field;
	$user_statut=$user->id_statut;

        $data = array(
            $this->is_id_session => $user_id,
            $this->is_login_session => $user_pseudo,
            $this->is_email_session => $user_email,
            $this->is_connect_text => true,
	    'id_statut'=> $user_statut
        );

        return $this->CI->session->set_userdata($data);
    }


    //Traitement de reset
    public function tr_form_reset($post){
     
        $db = $this->params_model();
        $psorem = $post['psorem_reset'];

        if(empty($psorem)){
            $data = array(
                'id' => FALSE,
                'msg' => $this->empty_fields_reset,
                'type' => 'reset',
            );

            return $data;
        }

    	$response = $this->CI->fhm_user_model->isset_user($psorem, $db);

        if($response){

            $rowuser = $this->CI->fhm_user_model->get_user($psorem, $this->params_model());
            $token = generate_token(60);

            $rowmail = $this->CI->fh_maillib->set_email('reset');

            $subject = $rowmail->subject;
            $content = $rowmail->content;
            $username = $this->field_pseudo;
            $url_send = base_url().$this->ctrl_form_exe.'/'.$this->mtd_form_exe.'/reinit/?token='.$token.'&username='.$rowuser->$username;
	        $url="<a href='$url_send'>$url_send</a>";
	    
            //mise a jour de content
            $content = str_replace("[lien/reset]", $url, $content);
            $email = $this->field_email;

            if($this->CI->fh_maillib->send($rowuser->$email, $subject, $content, $this->from_mail, $this->from_name)){

                $this->CI->fhm_user_model->update_token_user($token, $rowuser->$email, $this->params_model());


                $data = array(
                    'id' => TRUE,
                    'msg' => $this->succes_reset,
                    'type' => 'reset',
                );

                return $data;

            }else{

                $data = array(
                    'id' => FALSE,
                    'msg' => $this->unknown_reset,
                    'type' => 'reset',
                );

                return $data;
            }

        }else{

            $data = array(
                'id' => FALSE,
                'msg' => $this->not_match_reset,
                'type' => 'reset',
            );

            return $data;
        }
    }


    public function tr_form_reinit($post){
    
        $db = $this->params_model();
        $password = $post['password'];
        $repassword = $post['repassword'];
        $token = $post['token'];
        $username = $post['username'];


        if(empty($password) || empty($repassword)){
            $data = array(
                'id' => FALSE,
                'msg' => $this->empty_fields_reinit,
                'type' => 'reinit',
            );

            return $data;
        }

        if($password != $repassword){
            $data = array(
                'id' => FALSE,
                'msg' => $this->not_similar_reinit,
                'type' => 'reinit',
            );

            return $data;
        }

        if(!tr_check_pass($password)){
            $data = array(
                'id' => FALSE,
                'msg' => $this->format_incorrect_reinit,
                'type' => 'reinit',
            );

            return $data;
        }
        
        $response = $this->CI->fhm_user_model->confirm_token('reset', $token, $username, $this->params_model());

        if($response){

            switch ($this->function_encrypt) {
                case "ban_encrypt":
                     $password_hash = ban_encrypt($password);
                     break;

                default:
                     $password_hash = password_hash($password, PASSWORD_BCRYPT);
                     break;
            }

            $res = $this->CI->fhm_user_model->update('reset', $username, $password_hash, $this->params_model());
            if($res){
                $data = array(
                    'id' => TRUE,
                    'msg' => $this->success_reinit,
                    'type' => 'reinit',
                ); 
            }else{
                $data = array(
                    'id' => FALSE,
                    'msg' => $this->unknown_reinit,
                    'type' => 'reinit',
                );      
            } 

            return $data;     
        }else{

            $data = array(
                'id' => FALSE,
                'msg' => $this->token_incorrect_reinit,
                'type' => 'reinit',
            );
            return $data;
        }
    }

    //Traitement register
    public function tr_form_register($post){
        $username =  $post['prenom'];
        $email = $post['email_re']; 
        $pass = $post['pass_re'];
        $repass = $post['pass_re'];
        $prenom=$post['prenom'];
        $nom =  $post['username_re'];
        $naissance=$post['naissance'];
       $statut=$post['statut_user'];   
        // if(($this->CI->fhm_user_model->isset_user($username, $this->params_model()) == false && ctype_alnum($username) && strlen($username)>= 4) && ($this->CI->fhm_user_model->isset_user($email, $this->params_model()) == false && filter_var($email, FILTER_VALIDATE_EMAIL)) && (tr_check_pass($pass) == true && $pass == $repass)
        //    )

        if( ($this->CI->fhm_user_model->isset_user($email, $this->params_model()) == false && filter_var($email, FILTER_VALIDATE_EMAIL)) &&tr_check_pass($pass) == true)

           {

            $token = generate_token(60);

            switch ($this->function_encrypt) {
                case "ban_encrypt":
                     $password = ban_encrypt($pass);
                     break;

                default:
                     $password = password_hash($pass, PASSWORD_BCRYPT);
                     break;
             } 

            $rowmail = $this->CI->fh_maillib->set_email('register');

            $subject = $rowmail->subject;
            $content = $rowmail->content;
            $site = base_url();
            $url_send =  base_url().$this->CI->session->userdata('lg').'/'.$this->ctrl_form_exe.'/activate_account/'.$token.'/'.$username;
             $url="<a href='$url_send'>$url_send</a>";

            //mise a jour de content
            $content = str_replace("[lien/siteweb]", $site, $content);
            $content = str_replace("[lien/activation]", $url, $content);

            if($this->CI->fhm_user_model->insert_user($username, $email, $password, $token,$nom,$naissance,$statut, $this->params_model()) == true && $this->CI->fh_maillib->send($email, $subject, $content, $this->from_mail, $this->from_name) == true){

                $data = array(
                    'id' => true,
                    'msg' => $this->success_register,
                    'type' => 'register',
                );
                return $data;
        
            }else{
                $data = array(
                    'id' => false,
                    'msg' => $this->unknown_register,
                    'type' => 'register',
                );
                return $data;
            }
 
                
        }else{
            if(($this->CI->fhm_user_model->isset_user($email, $this->params_model()) == true)):
                $data = array(
                    'id' => false,
                    'msg' => $this->exist_name_register,
                    'type' => 'register',
                );
                return $data;
            endif;

            if (tr_check_pass($pass) == false):
                $data = array(
                    'id' => false,
                    'msg' => $this->format_password_register,
                    'type' => 'register',
                );
                return $data;
            endif;


            if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
                $data = array(
                    'id' => false,
                    'msg' => $this->incorrect_email_register,
                    'type' => 'register',
                );
                return $data;
            endif;

            // //conditions peut etre obsoletes mais elle peut tjrs provoquer une erreur dans la condition de base du register
            // if(ctype_alnum($username) == false || strlen($username)<= 4):
            //     $data = array(
            //         'id' => false,
            //         'msg' => $this->strlen_name_register,
            //         'type' => 'register',
            //     );
            //     return $data;
            // endif;
            
        }
    }



    //verifie les caracteristique d'un username
    public function tr_form_register_check_username($username){

        if(strlen($username) < 4){
            $data = array(
                'id' => false,
                'msg' => $this->strlen_name_register
            );
        }else if(!ctype_alnum($username)){

            $data = array(
                'id' => false,
                'msg' => $this->format_name_register
            );

        }else if($this->CI->fhm_user_model->isset_user($username, $this->params_model()) == true){

            $data = array(
                'id' => false,
                'msg' => $this->exist_name_register
            );

        }else{

            $data = array(
                'id' => true,
            );
        }
        

        return $data;
    }
    
    //verifie les caracteristique d'un email
    public function tr_form_register_check_email($email){

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

            $data = array(
                'id' => false,
                'msg' => $this->incorrect_email_register
            );

        }else if($this->CI->fhm_user_model->isset_user($email, $this->params_model()) == true){

            $data = array(
                'id' => false,
                'msg' => $this->exist_email_register
            );

        }else{

            $data = array(
                'id' => true,
            );

        }

        return $data;
    }

     //verifie les caracteristique d'un mot de passe
    public function tr_form_register_check_password($password){

        if(strlen($password)<8){
            $data = array(
                'id' => false,
                'msg' => $this->strlen_password_register
            );
        }else if(!tr_check_pass($password)){
            $data = array(
                'id' => false,
                'msg' => $this->format_password_register
            );
        }else{
             $data = array(
                'id' => true,
            );
        }

        return $data;
    }


    //verifie l'activation de compte 
    public function tr_account_activate($token, $pseudo){
        
        if($this->CI->fhm_user_model->confirm_token('activate', $token, $pseudo, $this->params_model())){
            $this->CI->fhm_user_model->update('activate', $pseudo,NULL, $this->params_model()); //update comme quoi il a valider

            return true;
        }else{
            return false;
        }
        
    }  

    public function get_msg_activate($response){
        $data['header'] = $this->CI->load->view('template/activate/fhv_header_ac', NULL, TRUE);
        $data['footer'] = $this->CI->load->view('template/activate/fhv_footer_ac', NULL, TRUE);
        $data['response'] = $response;   
        $data['title_activate'] = $this->title_activate;
        $data['descript_activate'] = $this->descript_activate;
        $data['title_no_activate'] = $this->title_no_activate;
        $data['descript_no_activate'] = $this->descript_no_activate;      
        
        return $this->CI->load->view('template/activate/fhv_user_view_activate', $data);
    }
 

}

?>