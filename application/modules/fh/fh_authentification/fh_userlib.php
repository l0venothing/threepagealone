<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//////URL\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$config['ctrl_form_exe'] = 'fh/fhc_userlib'; // default : 'app'
$config['mtd_form_exe'] = ''; // default : fh_authentification_exe
$config['ctrl_success_login'] = 'app/event'; // default member


////////Template\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$config['template'] = ''; // values : page, modal ou collapse / default : page


/////////////ON OFF\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$config['btn_reset'] = ''; // values : on, off / default : on
$config['btn_register'] = ''; // values : on, off / default : on


//////Systeme password\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$config['function_encrypt'] = 'ban_encrypt'; //values : ban_encrypt, password_hash  / default : password_hash
$config['function_decrypt'] = 'ban_verif_encrypt'; //values : ban_verif_encrypt, password_verify  / default : password_verify


//////Base de données\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$config['table_name'] = 'personnes'; // default : users
$config['field_id'] = 'id_personne'; //default : id
$config['field_pseudo'] = 'pseudo_personne'; // default : username
$config['field_email'] = 'email_personne'; // default : email
$config['field_password'] = 'pass_personne'; // default : password
$config['field_reset_token'] = 'reset_token_personne'; // default : reset_date
$config['field_reset_date'] = 'reset_date_personne'; // default : reset_token
$config['field_valid_token'] = 'valid_token_personne'; // default : valid_token
$config['field_valid_date'] = 'valid_date_personne'; // default : valid_date


///////Input\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$config['input_label'] = ''; // values : in, out, all/ default : in
$config['input_psorem'] = ''; // default : Entrer votre pseudo ou email
$config['input_password'] = ''; // default : Entrer votre mot de passe
$config['input_repassword'] = ''; // default : Réecrire votre mot de passe
$config['input_email'] = ''; // default : Entrer votre e-mail
$config['input_pseudo'] = ''; // default : Entrer votre pseudo


//////Button\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$config['btn_text_go_reset'] = ''; // default : mot de passe oublié?
$config['btn_text_go_login'] = ''; // default : retour vers la page de connexion
$config['btn_text_go_register'] = ''; // default : pas encore inscrit?

$config['btn_text_exe_login'] = ''; // default : Se connecter
$config['btn_text_exe_reset'] = ''; // default : Reinitialiser
$config['btn_text_exe_register'] = ''; // default : S'inscrire

$config['btn_text_modal_or_collapse'] = ''; //default : connectez-vous


//////////Email\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$config['from_name'] = '' ;// default : Bancalendrier
$config['from_mail'] = ''; // default : jeremy.blampain@banlieues.be';


////////////////////PAGES FORMULAIRE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//login
$config['title_login'] = ''; // default : Connexion

//reset
$config['title_reset'] = ''; // default : Mot de passe oublié?
$config['description_reset'] = ''; //les balises html sont acceptées

//reinit
$config['title_reinit'] = ''; //defaut : reinitialisation
$config['text_invalid_token_reinit'] = '';// default : Ce token est invalide ou expiré

//register
$config['title_register'] = ''; // default : Inscription


//Activate
$config['title_activate'] = ''; //defaut : compte activé
$config['descript_activate'] = ''; //default : Votre compte vient d\'être activé, vous pouvez maintenant vous connecter.
$config['title_no_activate'] = ''; // default : Token incorrect
$config['descript_no_activate'] = ''; // default : Token ou pseudo incorrect


////////////////////Erreurs traitement formulaire/////////////////////////////////////////////////////////////////////
//login
$config['empty_fields_login'] = ''; //default : 'Veuillez completer vos identifiants'
$config['not_match_login'] = ''; // default : 'Les informations ne correspondent pas.'
$config['not_valid_account'] = ''; //default : Veuillez d\'abord valider le compte via votre mail.'

//reset
$config['empty_fields_reset'] = '';// default : 'Entrer votre pseudo ou adresse mail.';
$config['not_match_reset'] = ''; // default : Cette information n’est pas valide.';
$config['succes_reset'] = ''; // default : Bravo! un message de reinitialisation vous a été envoyé par mail.';
$config['unknown_reset'] = ''; // default : Erreur inconnu ! veuillez contacter le webmaster.';

//reinit
$config['empty_fields_reinit'] = ''; // default : Entrer vos nouveaux mot de passe.';
$config['not_similar_reinit'] = ''; // default : Les mots de passe ne correspondent pas';
$config['format_incorrect_reinit'] = ''; // default : Le mot de passe doit contenir au moins 8 caractères avec 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spécial (& @ #).';
$config['token_incorrect_reinit'] = ''; // default : Ce token est invalide ou expiré.';
$config['unknown_reinit'] = ''; // default : Nous rencontrons de problème lors de la mise à jour de votre mot de passe, veuillez contacter le webmaster.';
$config['success_reinit'] = '';// default : Votre mot de passe a été mis à jour.';

//registe
$config['success_register'] = ''; //default : "success";
$config['unknown_register'] = ''; // default : Erreur inconnu, veuillez reessayer ulterieurement ou contacter le webmaster.';
$config['error_form_register'] = ''; // default : Veuillez corriger les champs du formulaire :';
$config['strlen_name_register'] = ''; // default : Pseudo doit au moins contenir 4 caractères';
$config['format_name_register'] = ''; // default : Pseudo doit être alphanumérique et sans espace';
$config['exist_name_register'] = ''; //"Pseudo existe déjà !";
$config['incorrect_email_register'] = '' ; //"E-mail invalide !";
$config['exist_email_register'] = ''; //default : E-mail existe déjà dans la BD !";
$config['strlen_password_register'] = ''; //default : Le mot de passe doit contenir au moins 8 caractères";
$config['format_password_register'] = ''; //default : Le mot de passe doit contenir au moins 8 caractères avec 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spécial (& @ #).";



?>