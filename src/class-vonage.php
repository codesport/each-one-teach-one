<?php

/**
 * Class library file for interacting with Vonage Nexmo
 *
 * 
 * 
 * @package Hackathons: 2020 Quick Base @link https://quickbase.devpost.com
 * 
 * @link https://dashboard.nexmo.com/getting-started/sms
 * 
 * @link https://www.bandwidth.com/messaging/sms-api/
 * @link https://www.plivo.com/sms/
 * @link https://signalwire.com/pricing/messaging
 * 
 */

require_once 'config.php';
require_once 'curl.php';


/**
 *  += for array append
 *  .= for string append
 * 
 */

class Vonage {
	/*
	 * First Declare any and all member variables (properties/class globals)
	 * used within the class. Set default values if needed
	 */

    const END_POINT  = 'https://rest.nexmo.com/sms/json'; 

    private $sms_payload;
    private $results;
    private $auth_code;
    

    /** 
     * Use constructor for intitializing class globals and for auto-loading any methods 
     *  
     * NB: '$this' is shorthand for 'apply to any created object' 
     * 
     * @link https://dashboard.nexmo.com/getting-started/sms
     * 
     * @param $name_phone_msg array  User's first name, phone number, and verification code
     * 
     */ 
    function __construct( $name_phone_msg ){

        $this->auth_code = file_get_contents( SECURE_PATH . '/vonage-sms-keys2.txt' );

        $this->sms_payload = 'text=Hi, ' . $name_phone_msg['name'] . ' ' . $name_phone_msg['msg'] . '&to=1' . str_replace( '-', '', $name_phone_msg['phone'] ) . '&';
 
        $this->sms_payload .= $this->auth_code;

        $this->set_sms( $this->sms_payload);

    }  
   

    public function set_sms( $array ){     
        $this->results =  post_web_page( self::END_POINT, $array  );    
    }
    
    public function get_sms(){
        return $this->results;      
    }
  



    /**
     * Save content to a flat file
     * 
     * Static methods may be called with or without instantiating a new object.  Call it
     * using the scope resolution operator myClassName::static_method_name (param_1, param_2)
     * 
     * TODO: Do static functions have setters and getters or are they just non-explicit gettters
     * 
     * @link https://stackoverflow.com/a/2448904/946957 
     * 
     * @param string $file_path path and name of file to save
     * @param string $content_to_save text of data to save
     */
    static function save_file( $file_path, $content_to_save ){

        file_put_contents( $file_path, $content_to_save, FILE_APPEND);


    }    

    


    public function generate_custom_error( $error_code, $message ) {
        
        //sending header with error code (1) auto-generates ajax error callback
        header( $_SERVER["SERVER_PROTOCOL"] . ' ' . $error_code . ' Method: '. $_SERVER['REQUEST_METHOD'] . ' ' . $message );
    
        //$server_response['error']['code'] = $error_code;
        //$server_response['error']['message'] = 'Method ' . $_SERVER['REQUEST_METHOD'] . ' ' . $message;
    
        //echo json_encode( $server_response ); //is this needed?

        exit;
    
    }

}


        //$this->auth_code = explode( ',', $this->auth_code );

       // $name_phone_msg = json_decode( $name_phone_msg, true);

//print_r($name_phone_msg);
//echo $name_phone_msg['phone']; exit;

/*
        $this->sms_payload = array(
            
            'text= Hi, ' . $name_phone_msg['name'] . '. This is a confirmation text from Each One, Teach One at treebright.org. Your confirmation code is: ' . $name_phone_msg['pin'],
            'to:' . $name_phone_msg['phone'],

        );
*/        
  //      $this->sms_payload = array_merge( $this->auth_code, $this->sms_payload);
