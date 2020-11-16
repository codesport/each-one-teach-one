<?php

/**
 * Class library file for interacting with Quick Base
 *
 * Refresh token last 90-days. Auth code last 30 minutes
 * 
 * @package Hackathons: 2020 Quick Base @link https://quickbase.devpost.com
 * 
 * 
 */

require_once 'config.php';
require_once 'curl.php';

//TODO: place inside class declaration. Then call with self::CONST_NAME
const USER_TOKEN    = 'b5r9qe_pdyr_ckzfamscj47mcvd6nq47efjqkwx';
const QB_REALM      = 'hackathon20-mb';
const USER_AGENT    = 'php-apps';
const END_POINT     = 'https://api.quickbase.com/v1/';


/**
 *  += for array append
 *  .= for string append
 * 
 */

class Quickbase_Actions {

    //protected $end_point;

    protected $header_send = array( 
        'Content-Type: application/json',
        'QB-Realm-Hostname: ' . QB_REALM,
        'User-Agent: ' . USER_AGENT,
        'Authorization: QB-USER-TOKEN ' . USER_TOKEN,    
    ); 

    private $app_data;
    private $update_data;
    private $read_data;
    private $delete_record;



    public function set_app_data( $app_id ){
        $end_point = END_POINT . 'apps/'. $app_id;
        $this->app_data =  get_web_page( $end_point, $this->header_send );
    }

    public function get_app_data(){
        return $this->app_data;      
    }
  



    public function set_create_update_record( $array ){
        $end_point = END_POINT . 'records' ;  
        $this->update_data =  post_web_page( $end_point, json_encode($array), $this->header_send );
    }

    public function get_create_update_record(){
        return $this->update_data;
    }
    


    
    public function set_read_record( $array ){

        $end_point = END_POINT . 'records/query' ;
        
        $this->read_data =  post_web_page( $end_point, json_encode($array), $this->header_send );

    }

    public function get_read_record(){

        return $this->read_data;
       
    }

    
    public function set_delete_record( $array ){

        $end_point = END_POINT . 'records' ;
        
        $this->delete_record =  delete_resource( $end_point, json_encode($array), $this->header_send );

    }

    public function get_delete_record(){

        return $this->delete_record;
       
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