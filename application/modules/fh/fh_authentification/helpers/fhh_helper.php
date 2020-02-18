<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if (! function_exists('generate_token'))
{
	function generate_token($length)
	{
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
	}
}


if (! function_exists('tr_check_pass'))
{
    function tr_check_pass($pass)
    {
        // lettre, chiffre et caractère special + minimum 8 caractère
        $strongRegex ='"^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$"';

        if(preg_match($strongRegex, $pass)){
            return true;
        }else{
            return false;
        }

    }
}

if(! function_exists('ban_verif_encrypt'))
{
    function ban_verif_encrypt($text,$password,$key="banlieuesconquerantdelalumiere"){
	
	 $salt = 'cH!swe!retReGu7W6bEDRup7usuDUh9THeD2CHeGE*ewr4n39=E@rAsp7c-Ph@pH';
	    $iv_size = openssl_cipher_iv_length( "AES-256-CBC" );
	    $hash = hash( 'sha256', $salt . $key . $salt );
	    $iv = substr( $hash, strlen( $hash ) - $iv_size );
	    $key = substr( $hash, 0, 32 );
	    
	    $encrypt_password = base64_encode( openssl_encrypt( $text, "AES-256-CBC", $key, OPENSSL_RAW_DATA, $iv ) );

        if($encrypt_password==$password):
           return TRUE;
        else:
           return FALSE;
        endif;
    }
}


    if ( ! function_exists('ban_encrypt'))
{
    function ban_encrypt( $data, $key="banlieuesconquerantdelalumiere" ) {
	    $salt = 'cH!swe!retReGu7W6bEDRup7usuDUh9THeD2CHeGE*ewr4n39=E@rAsp7c-Ph@pH';
	    $iv_size = openssl_cipher_iv_length( "AES-256-CBC" );
	    $hash = hash( 'sha256', $salt . $key . $salt );
	    $iv = substr( $hash, strlen( $hash ) - $iv_size );
	    $key = substr( $hash, 0, 32 );
	    $encrypted = base64_encode( openssl_encrypt( $data, "AES-256-CBC", $key, OPENSSL_RAW_DATA, $iv ) );

	    return $encrypted;
	}
}




