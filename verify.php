<?php
  
require_once 'src/class-api-actions.php';
session_start();
require_once 'src/session-management.php';

const TABLE_ID_USERS = 'bqyfi2qcm';



$str = $_SERVER['QUERY_STRING']; 
parse_str($str);

//code 23 
//email 9
//whoami 3

function read( $key ){
        
        $payload_array = array(
            'from' => TABLE_ID_USERS, //table_id
            'select' => array( 3, 23 ), #record id, firstname, preferred, ast, email, passwd
            'where' => '{23.EX.\'' . $key . '\'}'
        );

        $verify = New Quickbase_Actions();
        $verify->set_read_record( $payload_array );
        $results = $verify->get_read_record()['content'];

        return array(json_decode( $results, true), $verify);

}

if ( isset( $key ) && !empty( $key ) && isset( $type ) && !empty($type) && ( $type== 'email' || $type == 'phone' ) ){

    $array_of_results_and_object_instance = read( $key );

    $results = $array_of_results_and_object_instance[0];
    $instance = $array_of_results_and_object_instance[1];

    if ( isset($results['data'][0][23]['value']) && $key == $results['data'][0][23]['value'] ){

        $verify = true;
    
    } else {

        $verify = false;

    }

} else {

    $verify = false;

}

function update( $type, $results, $instance ){
      
    //29 phoneVerified
    //30 emailVerified

    //$instance_obj [0] = $results
    //$instance_obj [1] = object

    if ($type == 'phone'){
        $payload = array(
            'to' => TABLE_ID_USERS, //table_id
            'data' => array( 
                array(
                    3=>array( 'value' => $results['data'][0][3]['value'] ), //userIF
                    29=>array( 'value' => 1),
                )
            ),
    
            'fieldsToReturn' => array(2)
        );  

    } elseif ( $type == 'email' ){

            $payload = array(
                'to' => TABLE_ID_USERS, //table_id
                'data' => array( 
                    array(
                        3=>array( 'value' => $results['data'][0][3]['value'] ), //userIF
                        30=>array( 'value' => 1 ),
                    )
                ),
        
                'fieldsToReturn' => array(2)
            ); 

    }    

        $instance->set_create_update_record( $payload );
        $update_results = $instance->get_create_update_record()['content'];

        $update_results = json_decode( $update_results, true);

        print_r($update_results);

        //print_r($result);

        #var_dump ($result);
/*
        $formatted_date = date('l, F j, Y @ g:i A',  strtotime( '-5 hours', strtotime($result['data'][0][2]['value'])) );

        echo '<div class="row"><div class="col">
        <a class="btn-sm btn-success" href="update.php" role="button">Update Profile</a>
        <a class="btn-sm btn-primary" href="read.php" role="button">View Profile</a>
        <a class="btn-sm btn-warning" href="logout.php" role="button">Log Out Profile</a>
        <a class="btn-sm btn-danger" href="delete.php" role="button">Delete Profile</a>
        </div></div><hr/>';

        echo '<div class="bd-callout bd-callout-success"><div class="check"><h5 class="pull-left">Success, ' . $_SESSION['name'] . '!</h5></div><p>Your profile was succesfully verfied on <b>' . $formatted_date . ' Eastern</p></div>';
*/
    
}

require_once 'header-basic.php';

?>
        <title>Account Verification | Each One, Teach One</title>
        <style>.bang{background-size: calc(0.6rem + 1.5rem) calc(1em + 1.3rem);}</style>
    </head>
    <body>

   
        <!--<main class="col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">-->
        <div class="container-fluid">    

            <div id="server-output">
                <div class="bd-example col-xl-5">
                    <div class="row">
                        <div class="col mb-3">
                            <h1>Account Verification</h1><hr>
                        </div>
                    </div>

<?php if ( $verify == true ) : update( $type, $results, $instance ) ?>

    <div class="bd-callout bd-callout-success">
        <div class="check"><h5 class="pull-left">Success!</h5></div>
            <p>Your <?php echo $type ?> has been succesfully verfied!</p>
        </div>
    </div>

    <div class="row">
        <div class="col">  
            <a class="btn-sm btn-success" href="login.php" role="button">Login</a>
            <a class="btn-sm btn-primary" href="create.php" role="button">Create a Profile</a>
        </div>
    </div>

<?php else : ?>

    <div class="row">
        <div class="col">
            <h4>Unable to  Verify</h4>
            <div class="bd-callout bd-callout-danger">
                <div class="bang"><p class="pull-right">We're sorry.  Your account could not be verified. Please make sure you registered with a valid email address.</p></div>                            
            <div>
        </div>
    </div>

<?php endif ?>    
</div>
</div>
</div>

<!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    </body>
</html>