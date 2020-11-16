<?php

/**
 * Creates instances to access class-api-actions
 * 
 * What this script does: 
 *
 * Quick Base API docs:@link  https://developer.quickbase.com/operation/upsert
 * 
 * Quick Base User Tokens
 * @link https://hackathon20-mb.quickbase.com/db/main?a=GenUserTokenList
 * 
 * DBID 
 * @link https://www.google.com/search?q=where+can+i+find+my+quickbase+dbid%3F
 * @link https://hackathon20-mb.quickbase.com/db/bqx3i69a4?a=InfoWin  (for portfolio DB)
 * @link https://hackathon20-mb.quickbase.com/db/bqyfixit3?a=InfoWin    (for participant DB)
 *
 * tbl_user field numbers
 * @link  https://hackathon20-mb.quickbase.com/db/bqyfi2qcm?a=listfields
 *
 * @package Hackathons: 2020 Quick Base @link https://quickbase.devpost.com
 * @version    November 3, 2020
 * @since      November 3, 2020
 */

require_once 'class-api-actions.php';

const APP_ID_FINANCE  = 'bqx3i69a4';
const APP_ID_USERS = 'bqyfixit3';
//const TABLE_ID_FINANCE
const TABLE_ID_USERS = 'bqyfi2qcm';



#Form entry point
if ( isset($_POST['action']) && !empty($_POST['action']) ) {

	foreach ($_POST AS $key => $value) {
	
        //${$key} =  trim( htmlspecialchars( $value ) ); 
        


            $table_fields["$key"] =  $value ; 

  // print_r($table_fields);

    }




    $instance = new Quickbase_Actions();

    switch ($_POST['action']) {
        case 'create':
            create($table_fields);
            break;

        case 'read':
            read();
            break;    
            
        case 'login':
            login($table_fields);
            break;        
            
        case 'update':
            update($table_fields);
            break;

        case 'delete':
            login($table_fields, true);
            break;


        default:
            echo '<h1>Process Aborted. Invalid Form Data Stream</h1>';
            break;
    }

}
//write out your desired json and run json_decode on it. print_r() on the array to see how the array is formatted.

/*

RESIDUAL CODE TESTS TO DELETE

{"to":"bqyfi2qcm","data":[{"6":{"value":"Joe"},"8":{"value":"Blogs"},"9":{"value":"joe.bloggs5631@example.com"},"13":{"value":"435-454-3358"},"14":{"value":"Very interested in mastering solidity. Guys, please keep up the great work!"},"15":{"value":"I agree"},"18":{"value":"helloWorld"}}],"fieldsToReturn":[6,8,9,13,14,15,1,18]}

var headers = {
    'QB-Realm-Hostname': 'hackathon20-mb',
  'User-Agent': 'test-123',
  'Authorization': 'QB-USER-TOKEN b5r9qe_pdyr_ckzfamscj47mcvd6nq47efjqkwx',
  'Content-Type': 'application/json'
};
var body = {"to":"bqyfi2qcm","data":[{"6":{"value":"Joe"},"8":{"value":"Blogs"},"9":{"value":"joe.bloggs5631@example.com"},"13":{"value":"435-454-3358"},"14":{"value":"Very interested in mastering solidity. Guys, please keep up the great work!"},"15":{"value":"I agree"},"18":{"value":"helloWorld"}}],"fieldsToReturn":[6,8,9,13,14,15,1,18]};


UPDATE:
{"to":"bqyfi2qcm","data":[{"6":{"value":"Peter"},"3":{"value":"8"},"9":{"value":"hello@hello.com"}}],"fieldsToReturn":[6,9,18]}
{"to":"bqyfi2qcm","data":[{"6":{"value":"Joe"},"3":{"value":"8"}}],"fieldsToReturn":[6,18]}

$.ajax({
  url: 'https://api.quickbase.com/v1/records',
  method: 'POST',
  headers: headers,
  data: JSON.stringify(body),
  success: function(result) {
      console.log(JSON.stringify(result));
  }
})
*/


//exit;

//print_r( json_encode( $table_fields ) );

function create ( $table_fields ){

    $key = hash( 'md5', mt_rand(17464,99999) . $table_fields['email'] );

    $payload_array = array(
        'to' => TABLE_ID_USERS, //table_id
        'data' => array( 
            array(
                6=>array( 'value' => $table_fields['first_name']),
                7=>array( 'value' => $table_fields['nick_name']),
                8=>array( 'value' => $table_fields['last_name']),
                10=>array( 'value' => $table_fields['city']), 
                11=>array( 'value' => $table_fields['state']), 
                12=>array( 'value' => $table_fields['zipcode']), 
                9=>array( 'value'  => $table_fields['email']), 
                13=>array( 'value' => $table_fields['phone']),
                18=>array( 'value' => password_hash( $table_fields['password'], PASSWORD_DEFAULT) ), 
                20=>array( 'value' => $table_fields['role']),
                21=>array( 'value' => $table_fields['practice_areas']), 
                14=>array( 'value' => $table_fields['feedback']), 
                15=>array( 'value' => $table_fields['accept_terms']), 
                23=>array( 'value' => $key ),
            )
        ),

        'fieldsToReturn' => array(1,2,6,7,9,23)
    );

    $instance = new Quickbase_Actions();

    $instance->set_create_update_record( $payload_array );
    $result = json_decode( $instance->get_create_update_record()['content'], true );

    //print_r( $table_fields);
    //print_r( $result );//TODO Remove when live

    $name = !empty( $table_fields['nick_name']) ? $table_fields['nick_name'] : $table_fields['first_name'];
/*
    $is_phone = !empty( $table_fields['phone']) ? false : true;

    echo $is_phone;
    echo '<hr>' .  $result['data'][0][3]['value'];
    
    exit;
*/
    if ( !empty( $table_fields['phone']) && isset( $result['data'][0][3]['value'] ) ){ //3 is userID


        //code email userid
       // $key = hash( 'md5', $result['data'][0][23]['value'] . $result['data'][0][9]['value'] );
        //echo hash('md5', 'The quick brown fox jumped over the lazy dog.');

        $formatted_date = date('l, F j, Y @ g:i A', strtotime($result['data'][0][1]['value']) );

        $name_phone_msg = array( 

            'name'  => $name,
            'phone' => $table_fields['phone'],
            'msg'   =>'This is Each One, Teach One.  Please verify your account by visiting our verifcation link: https://treebright.org/verify.php?key=' .$key . '&type=phone',

        );

        require_once 'class-vonage.php';

        define( 'LOG_FILE', SECURE_PATH . '/sms-log.txt' );

        $sms_payload = New Vonage( $name_phone_msg );

        $server_response = $sms_payload->get_sms();

       //print_r( json_decode( $server_response['content'], true ) ); //TODO Remove when live

        $sms_payload::save_file( LOG_FILE, $server_response['content'] );

        echo '<h4>SMS Confirmation Delivered<h4>';

        echo '<div class="bd-callout bd-callout-success"><div class="check"><h5 class="pull-left">Success, ' . $name . '!</h5></div><p>Your profile was succesfully created on <b>' . $formatted_date . ' Eastern.  You may now <a href="login.php">log into</a> your account. </p></div>';


    } else {

    echo'<div class="row">
        <div class="col">
            <h4>Sorry, This is Our Fault</h4>
            <div class="bd-callout bd-callout-danger">
                <div class="bang"><p class="pull-right">We could not generate a user profile for you. We\'ll get this fixed ASAP. In the meantime, email or call use and we\'ll mkae sure you\'re taken care of. <b>Server Error Message:</b><i> ' . $result['metadata']['lineErrors'][1][0] .'</i></p>
                </div>                            
            <div>
        </div>
    </div>';



    }




}


function update($table_fields){
    
    /** 
    * Check if a session has started.
    *
    * @link https://stackoverflow.com/a/18542272/946957
    */
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }   

    if( isset($_SESSION['user_id']) ) {

        $key = hash( 'md5', mt_rand(17464,99999) . $table_fields['email'] );

        $payload = array(
            'to' => TABLE_ID_USERS, //table_id
            'data' => array( 
                array(
                    3=>array( 'value' => $_SESSION['user_id'] ),
                    6=>array( 'value' => $table_fields['first_name']),
                    7=>array( 'value' => $table_fields['nick_name']),
                    8=>array( 'value' => $table_fields['last_name']),
                    9=>array( 'value' => $table_fields['email']), 
                    10=>array( 'value' => $table_fields['city']), 
                    11=>array( 'value' => $table_fields['state']), 
                    12=>array( 'value' => $table_fields['zipcode']), 
                    13=>array( 'value' => $table_fields['phone']),
                    14=>array( 'value' => $table_fields['feedback']), 
                    15=>array( 'value' => $table_fields['accept_terms']), 
                    20=>array( 'value' => $table_fields['role']),
                    21=>array( 'value' => $table_fields['practice_areas']), 
                    23=>array( 'value' => $key ),
                )
            ),
    
            'fieldsToReturn' => array(2)
        );        
        ///print_r (  json_encode($payload ) );

        if ( !empty( $table_fields['password'] ) ){

            $payload['data'][] =  array(18=>array( 'value' => password_hash( $table_fields['password'], PASSWORD_DEFAULT) ));

        }

        #TODO: Delete in Production
        //print_r (  json_encode($payload ) );
        //echo '<hr>';
        //var_dump($payload); 

        $_SESSION['instance']->set_create_update_record( $payload );
        $result = $_SESSION['instance']->get_create_update_record()['content'];

        $result = json_decode( $result, true);


        //print_r($result);

        #var_dump ($result);

        $formatted_date = date('l, F j, Y @ g:i A', strtotime($result['data'][0][2]['value']) );

        echo '<div class="row"><div class="col">
        <a class="btn-sm btn-success" href="update.php" role="button">Update Profile</a>
        <a class="btn-sm btn-primary" href="read.php" role="button">View Profile</a>
        <a class="btn-sm btn-warning" href="logout.php" role="button">Log Out Profile</a>
        <a class="btn-sm btn-danger" href="delete.php" role="button">Delete Profile</a>
        </div></div><hr/>';

        echo '<div class="bd-callout bd-callout-success"><div class="check"><h5 class="pull-left">Success, ' . $_SESSION['name'] . '!</h5></div><p>Your profile was succesfully updated on <b>' . $formatted_date . ' Eastern</p></div>';

    } 
}

function read(){

    if( isset($_SESSION['user_id']) ) {
        
        $payload_array = array(
            'from' => TABLE_ID_USERS, //table_id
            'select' => array( 6,7,8,9,10,11,12,13,14,15,20,21 ), #record id, firstname, preferred, ast, email, passwd
            'where' => '{3.EX.\'' . $_SESSION['user_id'] . '\'}'
        );


        $_SESSION['instance']->set_read_record( $payload_array );
        $result = $_SESSION['instance']->get_read_record()['content'];

        return json_decode( $result, true);

    } /*else{

        echo '<h2>Please <a href="login.htm">loggin</a> to view and edit your profile</h2>';

    }*/
}



function login ($table_fields, $confirm_delete=false){

    $payload_array = array(
        'from' => TABLE_ID_USERS, //table_id
        'select' => array( 3,6,7,8,9,18 ), #record id, firstname, preferred, ast, email, passwd
        'where' => '{9.EX.\'' . $table_fields['email'] . '\'}'
    );  
//AND{18.CT.\'' . $table_fields['password'] . '\'}

    $instance = new Quickbase_Actions();

    $instance->set_read_record( $payload_array );

    if ( !empty(json_decode($instance->get_read_record()['content'], true )['data'][0]) ){

        $result = json_decode($instance->get_read_record()['content'], true );

        $stored_password = $result['data'][0][18]['value'];

        $user_id = $result['data'][0][3]['value'];

    } else {

        $stored_password = 'Email not in data base';   

    }

    $valid_password = password_verify($table_fields['password'], $stored_password);

    if( $confirm_delete == true && $valid_password ){

        deleteAccount();

    }


    if( $valid_password ) {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $_SESSION['user_id'] = $user_id;

        $_SESSION['name'] = !empty( $result['data'][0][7]['value']) ? $result['data'][0][7]['value']: $result['data'][0][6]['value'];

        $_SESSION['instance'] = $instance;

        echo '<div class="row"><div class="col">
        <a class="btn-sm btn-success" href="update.php" role="button">Update Profile</a>
        <a class="btn-sm btn-primary" href="read.php" role="button">View Profile</a>
        <a class="btn-sm btn-warning" href="logout.php" role="button">Log Out Profile</a>
        <a class="btn-sm btn-danger" href="delete.php" role="button">Delete Profile</a>
        </div></div><hr />';

        echo '<div class="bd-callout bd-callout-success"><div class="check"><h5 class="pull-left">Success, ' . $_SESSION['name'] . '!</h5></div><p>Your are now logged in!</p></div>';




    } else{

            echo'
            <h4>Email and Password Verification Failed</h4>
            <div class="bd-callout bd-callout-danger">
                <div class="bang"><p class="pull-right">Looks like your email and password aren\'t in our system. We\'ll add a password reset feature shortly. In the meantime try <a href="login.php"><b>logging on</b></a> again</p>
                </div>                            
            <div>';

    }
/*
    print_r( json_decode($instance->get_read_record()['content'], true ) );
echo '<hr>';
    var_dump( json_decode($instance->get_read_record()['content'], true ) );
*/
}

function deleteAccount(){

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $payload_array = array(
        'from' => TABLE_ID_USERS, //table_id
        'where' => /*'{9.EX.\'' . $table_fields['email'] . '\'}AND*/'{3.EX.\'' . $_SESSION['user_id'] . '\'}'
    );    

    //print_r( $payload_array);

    //echo '<hr>';

    //print_r(json_encode($payload_array));
    //$instance = new Quickbase_Actions();



    $results = $_SESSION['instance']->set_delete_record( $payload_array );

    echo '<div class="bd-callout bd-callout-success"><div class="check"><h5 class="pull-left">Success, ' . $_SESSION['name'] . '!</h5></div><p>Your profile was succesfully deleted. Feel free to reach out if you ever need us!</p></div>';

/*
    var_dump( $results );
    print_r( $results);

    $results = json_decode( $results, true );

    if ($results['numberDeleted'] == 1){
        

    } else{



    }

*/

    session_destroy();

    exit;


}


// print_r( json_encode($table_fields) );

// //var_dump( $table_fields );
// exit;


#Form entry point


//$instance->set_app_data( APP_ID_USERS );

//print_r( $instance->get_app_data()['content'] );

//$instance->set_create_update_record( $table_fields );

//print_r( $instance->get_create_update_record()['content'] );
