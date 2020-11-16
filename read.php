<?php
/**
 * PHP Error Fix: PHP_Incomplete_Class_Name
 * 
 * Solution: include the class before the session_start()
 * 
 * If your trying to access a property method of an object or serialized value 
 * you've stored in a $_SESSION variable and you included the class after 
 * calling session_start() try including the class before calling session_start()
 * 
 * @link https://stackoverflow.com/a/9443818/946957
 */
  
require_once 'src/class-api-actions.php';
session_start();
require_once 'src/session-management.php';

const TABLE_ID_USERS = 'bqyfi2qcm';

function read(){

    if( isset($_SESSION['user_id']) ) {
        
        $payload_array = array(
            'from' => TABLE_ID_USERS, //table_id
            'select' => array( 6,7,8,9,10,11,12,13,14,15,20,21,26 ), #record id, firstname, preferred, ast, email, passwd
            'where' => '{3.EX.\'' . $_SESSION['user_id'] . '\'}'
        );


        $_SESSION['instance']->set_read_record( $payload_array );
        $result = $_SESSION['instance']->get_read_record()['content'];

        return json_decode( $result, true);

    }

}

$results =  read();
$role = $results['data'][0][20]['value'];

$practices_array = $results['data'][0][21]['value'];
//$engineering_array = $results['data'][0][26]['value'];

require_once 'header-basic.php';

?>


        <title>View Your Profile | Each One, Teach One</title>
    </head>
    <body>


        
<!--        <main class="col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content hello" role="main">

<img src="images/test2.svg#icon-miner-guy-vest" alt="my image">-->


<div class="container py-md-3 pl-md-5">

        <div class="bd-example">
            <div id="server-output">
                <div class="row">
                    <div class="col">
                        <h1>Your Account Profile</h1><hr>
                    </div>
                </div>
<?php if ( isset($_SESSION['user_id']) ) : ?>

    <div class="row"><div class="col mb-3">
    <a class="btn-sm btn-success" href="update.php" role="button">Update Profile</a>
    <a class="btn-sm btn-warning" href="logout.php" role="button">Log Out Profile</a>
    <a class="btn-sm btn-danger" href="delete.php" role="button">Delete Profile</a>
</div></div>   
            <!-- input form element name MUST equal id in feedack element.  input_name -> input_name_feedack -->
            <form id="student-data" class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="col mb-3">
                        <label class="sr-only" for="first-name">First Name</label>
                        <input type="text" class="form-control" id="first-name" placeholder="First Name" name="first_name"  value="<?php echo $results['data'][0][6]['value'];?>" required disabled>
                        <div id="first_name-feedback" class="invalid-feedback"></div>  
                    </div>

                    <div class="col mb-3">
                        <label class="sr-only" for="preferred-name">Preferred Name</label>
                        <input type="text" class="form-control" id="preferred-name" placeholder="Preferred Name (optional)" name="nick_name" value="<?php echo $results['data'][0][7]['value'];?>" disabled>
                    </div>

                    <div class="col mb-3">
                        <label class="sr-only" for="last-name">Last name</label>
                        <input type="text" class="form-control" id="last-name" placeholder="Last Name(s)" name="last_name" value="<?php echo $results['data'][0][8]['value'];?>" required disabled>
                        <div id="last_name-feedback" class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col col-md-6 mb-3">
                        <label class="sr-only" for="city">City</label>
                        <input type="text" class="form-control" id="city"  placeholder="City" name="city" value="<?php echo $results['data'][0][10]['value'];?>" required disabled>
                        <div id="city-feedback" class="invalid-feedback"></div>
                    </div>

                    <div class="col col-md-4 mb-3">
                        <label class="sr-only" for="state">State</label>
                        <input list="state-list" class="form-control" placeholder="Select a State" id="state" name="state" required value="<?php echo $results['data'][0][11]['value'];?>" disabled>
                        <!-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/datalist  https://www.w3schools.com/howto/howto_js_filter_dropdown.asp https://www.w3schools.com/tags/tryit.asp?filename=tryhtml5_datalist -->
                        <datalist id="state-list">
                            <option value=Alabama>Alabama<option value=Alaska>Alaska<option value=Arizona>Arizona<option value=Arkansas>Arkansas<option value=California>California<option value=Colorado>Colorado<option value=Connecticut>Connecticut<option value=Delaware>Delaware<option value="District of Columbia">District of Columbia<option value=Florida>Florida<option value=Georgia>Georgia<option value=Hawaii>Hawaii<option value=Idaho>Idaho<option value=Illinois>Illinois<option value=Indiana>Indiana<option value=Iowa>Iowa<option value=Kansas>Kansas<option value=Kentucky>Kentucky<option value=Louisiana>Louisiana<option value=Maine>Maine<option value=Maryland>Maryland<option value=Massachusetts>Massachusetts<option value=Michigan>Michigan<option value=Minnesota>Minnesota<option value=Mississippi>Mississippi<option value=Missouri>Missouri<option value=Montana>Montana<option value=Nebraska>Nebraska<option value=Nevada>Nevada<option value="New Hampshire">New Hampshire<option value="New Jersey">New Jersey<option value="New Mexico">New Mexico<option value="New York">New York<option value="North Carolina">North Carolina<option value="North Dakota">North Dakota<option value=Ohio>Ohio<option value=Oklahoma>Oklahoma<option value=Oregon>Oregon<option value=Pennsylvania>Pennsylvania<option value="Rhode Island">Rhode Island<option value="South Carolina">South Carolina<option value="South Dakota">South Dakota<option value=Tennessee>Tennessee<option value=Texas>Texas<option value=Utah>Utah<option value=Vermont>Vermont<option value=Virginia>Virginia<option value=Washington>Washington<option value="West Virginia">West Virginia<option value=Wisconsin>Wisconsin<option value=Wyoming>Wyoming
                        </datalist>
                        <div id="state-feedback" class="invalid-feedback"></div>
                    </div>     

                    <div class="col col-md-2 mb-3">
                        <label class="sr-only" for="zipcode">Zip</label>
                        <input type="text" class="form-control" id="zipcode" type="number" placeholder="zip code" name="zipcode" value="<?php echo $results['data'][0][12]['value'];?>" required disabled>
                        <div id="zipcode-feedback" class="invalid-feedback" ></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col mb-3">
                            <label class="sr-only" for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="<?php echo $results['data'][0][9]['value'];?>" required disabled>
                            <div id="email-feedback" class="invalid-feedback"></div>
                    </div>

                    <div class="col mb-3">
                        <label class="sr-only" for="phone">Phone Number</label>
                        <input class="form-control" id="phone" placeholder="mobile number (optional)" name="phone" minlength="10" value="<?php echo $results['data'][0][13]['value'];?>" disabled>
                        <div id="phone-feedback" class="invalid-feedback"></div>
                    </div>
                </div>


                <!-- -->
                <div class="form-group col-auto radio-vert-center"> 
                    <label style="margin-bottom: 0; margin-left:-1em;">What role would you like to have with us?</label>  
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="mentor" value="Mentor" required
                        
                        <?php if( $role =='Mentor') { echo "checked";}?>
                        disabled>
                        <label class="form-check-label" for="mentor">Mentor</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="mentee" value="Mentee" required
                        
                        <?php if( $role =='Mentee' ) { echo "checked"; }?>

                        disabled>
                        <label class="form-check-label" for="mentee">Mentee</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="both" value="Mentor and Mentee" required
                        
                        <?php  if ( $role =='Mentor and Mentee') { echo "checked"; }?>

                        disabled>
                        <label class="form-check-label" for="both">Both</label>
                    </div>                    

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="social" value="Socializing: Collaboration & Shared Intrest" required
                        
                        <?php  if ( $role == 'Socializing: Collaboration & Shared Intrest') { echo "checked"; }?>
                        
                        disabled>
                        <label class="form-check-label" for="social">A Shared Interest Group: Collaboration & Socializing</label>
                    </div>  
             


                    



                    <div id="role-feedback" class="invalid-feedback"></div>
                </div>

                <div class="form-group">
                    <label for="practice-areas">Which industries are you interested in or currently involved with?</label>
                    <select size="5" multiple="" class="form-control" id="practice-areas" name="practice_areas[]" required disabled>
                        <?php foreach ($practices_array as $key=> $value) : ?>
                            <option value="<?php echo $value ?>" selected><?php echo $value ?></option>
                        <?php endforeach ?>     
                    </select>
                    <div id="practice_areas-feedback" class="invalid-feedback"></div>
                </div>
<!--
                <div class="form-group">
                    <label for="emerging-tech">What interests you within Software Engineering & Systems Design:</label>
                    <select multiple class="form-control" id="emerging-tech" name="emerging_tech[]" required disabled>
                        <?php #foreach ($engineering_array as $key => $value) : ?>
                            <option value="<?php# echo $value ?>" selected><?php #echo $value ?></option>
                        <?php #endforeach ?>
                        <?php #if ( !in_array( 'AI/Machine Learning & Neural Networks', $engineering_array ) ) : ?>    
                            <option value="AI/Machine Learning & Neural Networks">AI, Machine Learning & Neural Networks</option>
                        <?php #endif ?>
                        <?php #if ( !in_array( 'Blockchain', $engineering_array ) ) : ?>    
                            <option value="Blockchain">Blockchain</option>
                        <?php # endif ?>
                        <?php #if ( !in_array( 'Augmented & Virtual Reality', $engineering_array ) ) : ?>    
                            <option value="Augmented & Virtual Reality">Augmented & Virtual Reality</option>
                        <?php #endif ?>
                    </select>
                    <div id="emerging_tech-feedback" class="invalid-feedback"></div>
                </div>
-->                
                <div class="form-group">
                <label for="feedack">Any interests or hobbies outside of work? We'll match you with others who have similiar interests (optional)</label>
                    <textarea class="form-control" id="feedack" rows="3" name="feedback" disabled><?php if (empty($results['data'][0][14]['value']) ) ''; else echo $results['data'][0][14]['value']; ?></textarea>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="I agree to the terms" id="accept-terms" name="accept_terms"  checked  disabled>
                        <label class="form-check-label" for="accept-terms">
                            Agree to terms and conditions
                        </label>
                        <div id="accept_terms-feedback" class="invalid-feedback"></div>
                    </div>
                </div>

                <input type="hidden" value="read" name="action">

            </form>
 <?php else : ?>

    <h2>Please <a href="login.php">login</a> to access this page</h2>
<?php endif ?>
</div>
</div>

</div>

<!--</main> -->

    </body>
</html>
