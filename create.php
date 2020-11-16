<?php
  
session_start();
require_once 'src/session-management.php';
require_once 'header-basic.php';

?>

        <title>Create an Account | Each One, Teach One</title>
    </head>
    <body>


        
<!--        <main class="col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content hello" role="main">

<img src="images/test2.svg#icon-miner-guy-vest" alt="my image">-->

<?php if ( !isset($_SESSION['user_id']) ) : ?>

<div class="container">

        <div class="bd-example">
            <div id="server-output">
                <div class="row">
                    <div class="col mb-3">
                        <h1>Registration & Application</h1></hr>
                    </div>
                </div>

            <!-- input form element name MUST equal id in feedack element.  input_name -> input_name_feedack -->
            <form id="student-data" class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="col mb-3">
                        <label class="sr-only" for="first-name">First Name</label>
                        <input type="text" class="form-control" id="first-name" value="" placeholder="First Name" name="first_name" required="">
                        <div id="first_name-feedback" class="invalid-feedback"></div>  
                    </div>

                    <div class="col mb-3">
                        <label class="sr-only" for="preferred-name">Preferred Name</label>
                        <input type="text" class="form-control" id="preferred-name" value="" placeholder="Preferred Name (optional)" name="nick_name">
                    </div>

                    <div class="col mb-3">
                        <label class="sr-only" for="last-name">Last name</label>
                        <input type="text" class="form-control" id="last-name" value="" placeholder="Last Name(s)" name="last_name" required="">
                        <div id="last_name-feedback" class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col col-md-6 mb-3">
                        <label class="sr-only" for="city">City</label>
                        <input type="text" class="form-control" id="city"  placeholder="City" name="city" required>
                        <div id="city-feedback" class="invalid-feedback"></div>
                    </div>

                    <div class="col col-md-4 mb-3">
                        <label class="sr-only" for="state">State</label>
                        <input list="state-list" class="form-control" placeholder="Select a State" id="state" name="state" required>
                        <!-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/datalist  https://www.w3schools.com/howto/howto_js_filter_dropdown.asp https://www.w3schools.com/tags/tryit.asp?filename=tryhtml5_datalist -->
                        <datalist id="state-list">
                            <option value=Alabama>Alabama<option value=Alaska>Alaska<option value=Arizona>Arizona<option value=Arkansas>Arkansas<option value=California>California<option value=Colorado>Colorado<option value=Connecticut>Connecticut<option value=Delaware>Delaware<option value="District of Columbia">District of Columbia<option value=Florida>Florida<option value=Georgia>Georgia<option value=Hawaii>Hawaii<option value=Idaho>Idaho<option value=Illinois>Illinois<option value=Indiana>Indiana<option value=Iowa>Iowa<option value=Kansas>Kansas<option value=Kentucky>Kentucky<option value=Louisiana>Louisiana<option value=Maine>Maine<option value=Maryland>Maryland<option value=Massachusetts>Massachusetts<option value=Michigan>Michigan<option value=Minnesota>Minnesota<option value=Mississippi>Mississippi<option value=Missouri>Missouri<option value=Montana>Montana<option value=Nebraska>Nebraska<option value=Nevada>Nevada<option value="New Hampshire">New Hampshire<option value="New Jersey">New Jersey<option value="New Mexico">New Mexico<option value="New York">New York<option value="North Carolina">North Carolina<option value="North Dakota">North Dakota<option value=Ohio>Ohio<option value=Oklahoma>Oklahoma<option value=Oregon>Oregon<option value=Pennsylvania>Pennsylvania<option value="Rhode Island">Rhode Island<option value="South Carolina">South Carolina<option value="South Dakota">South Dakota<option value=Tennessee>Tennessee<option value=Texas>Texas<option value=Utah>Utah<option value=Vermont>Vermont<option value=Virginia>Virginia<option value=Washington>Washington<option value="West Virginia">West Virginia<option value=Wisconsin>Wisconsin<option value=Wyoming>Wyoming
                        </datalist>
                        <div id="state-feedback" class="invalid-feedback"></div>
                    </div>     

                    <div class="col col-md-2 mb-3">
                        <label class="sr-only" for="zipcode">Zip</label>
                        <input type="text" class="form-control" id="zipcode" type="number" placeholder="zip code" name="zipcode" required="">
                        <div id="zipcode-feedback" class="invalid-feedback" ></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col mb-3">
                            <label class="sr-only" for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" required>
                            <div id="email-feedback" class="invalid-feedback"></div>
                    </div>

                    <div class="col mb-3">
                        <label class="sr-only" for="phone">Phone Number</label>
                        <input class="form-control" id="phone" placeholder="mobile number (optional)" name="phone" minlength="10" required>
                        <div id="phone-feedback" class="invalid-feedback"></div>
                    </div>
                </div>

                <!-- -->
                <div class="form-row">
                    <div class="col mb-3">
                        <label class="sr-only" for="password-initial">Password</label>
                        <input type="password" class="form-control password" id="password-initial" name="password" placeholder="password" required>
                        <div id="password_initial-feedback" class="invalid-feedback"></div>
                    </div>
                    <div class="col mb-3">
                        <label class="sr-only" for="password-verify">Verify Password</label>
                        <div class="input-group mb-2">
                            <input type="password" class="form-control password" id="password-verify" name="password_verify" placeholder="verify password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <svg aria-hidden="true" class="eye-slash" fill="currentColor" focusable="false" width="24px" height="20px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M10.58,7.25l1.56,1.56c1.38,0.07,2.47,1.17,2.54,2.54l1.56,1.56C16.4,12.47,16.5,12,16.5,11.5C16.5,9.02,14.48,7,12,7 C11.5,7,11.03,7.1,10.58,7.25z"></path><path d="M12,6c3.79,0,7.17,2.13,8.82,5.5c-0.64,1.32-1.56,2.44-2.66,3.33l1.42,1.42c1.51-1.26,2.7-2.89,3.43-4.74 C21.27,7.11,17,4,12,4c-1.4,0-2.73,0.25-3.98,0.7L9.63,6.3C10.4,6.12,11.19,6,12,6z"></path><path d="M16.43,15.93l-1.25-1.25l-1.27-1.27l-3.82-3.82L8.82,8.32L7.57,7.07L6.09,5.59L3.31,2.81L1.89,4.22l2.53,2.53 C2.92,8.02,1.73,9.64,1,11.5C2.73,15.89,7,19,12,19c1.4,0,2.73-0.25,3.98-0.7l4.3,4.3l1.41-1.41l-3.78-3.78L16.43,15.93z M11.86,14.19c-1.38-0.07-2.47-1.17-2.54-2.54L11.86,14.19z M12,17c-3.79,0-7.17-2.13-8.82-5.5c0.64-1.32,1.56-2.44,2.66-3.33 l1.91,1.91C7.6,10.53,7.5,11,7.5,11.5c0,2.48,2.02,4.5,4.5,4.5c0.5,0,0.97-0.1,1.42-0.25l0.95,0.95C13.6,16.88,12.81,17,12,17z"></path></svg>                                    
                                    
                                    <svg aria-hidden="true" class="eye d-none" fill="currentColor" focusable="false" width="24px" height="20px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12,7c-2.48,0-4.5,2.02-4.5,4.5S9.52,16,12,16s4.5-2.02,4.5-4.5S14.48,7,12,7z M12,14.2c-1.49,0-2.7-1.21-2.7-2.7 c0-1.49,1.21-2.7,2.7-2.7s2.7,1.21,2.7,2.7C14.7,12.99,13.49,14.2,12,14.2z"></path><path d="M12,4C7,4,2.73,7.11,1,11.5C2.73,15.89,7,19,12,19s9.27-3.11,11-7.5C21.27,7.11,17,4,12,4z M12,17 c-3.79,0-7.17-2.13-8.82-5.5C4.83,8.13,8.21,6,12,6s7.17,2.13,8.82,5.5C19.17,14.87,15.79,17,12,17z"></path></svg>
                                </div>
                            </div>
                        </div>
                        <div id="password_verify-feedback" class="invalid-feedback"></div>
                    </div>
                </div>
                <!-- -->
                <div class="form-group col-auto radio-vert-center"> 
                    <label style="margin-bottom: 0; margin-left:-1em;">What are you looking for?</label>  
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="mentor" value="Mentor" required>
                        <label class="form-check-label" for="mentor">A mentor</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="mentee" value="Mentee" required>
                        <label class="form-check-label" for="mentee">A mentee</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="both" value="Mentor and Mentee" required>
                        <label class="form-check-label" for="both">Both</label>
                    </div>     
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="social" value="Socializing: Collaboration & Shared Intrest" required>
                        <label class="form-check-label" for="social">A Shared Interest Group: Collaboration & Socializing</label>
                    </div>                                      
                    <div id="role-feedback" class="invalid-feedback"></div>
                </div>

                <div class="form-group">
                <label for="practice-areas">Which industries are you interested in or currently involved with?</label>
                    <select size="5" multiple="" class="form-control" id="practice-areas" name="practice_areas[]" required>
                        <option value="Freelance, Gig Economy, or Part-time">Freelance, Gig Economy, or Part-time</option>
                        <option value="Science, Engineering, IT, or HealthCare" >Science, Engineering, IT, or HealthCare</option>
                        <option value="Sports, Hospitality, or Entertainment">Sports, Hospitality, or Entertainment</option>
                        <option value="Finance, Real Estate, or Accounting">Finance, Real Estate, or Accounting</option>
                        <option value="None of the above">None of the above</option>
                    </select>
                    <div id="practice_areas-feedback" class="invalid-feedback"></div>
                </div>

<!--                
                <div class="form-group">
                    <label for="emerging-tech">What interests you within Software Engineering & Systems Design:</label>
                    <select multiple class="form-control" id="emerging-tech" name="emerging_tech" required>
                        <option value="AI/Machine Learning & Neural Networks">AI/Machine Learning & Neural Networks</option>
                        <option value="Augmented & Virtual Reality<">Augmented & Virtual Reality</option>
                        <option value="Blockchain">Blockchain</option>
                        <option value="None of the above">None of the above</option>
                    </select>
                    <div id="emerging_tech-feedback" class="invalid-feedback"></div>
                </div>
-->
                <div class="form-group">
                    <label for="feedack">Any interests or hobbies outside of work? We'll match you with others who have similiar interests (optional)</label>
                    <textarea class="form-control" id="feedack" rows="3" name="feedback" placeholder="Pro Tip: Including keywords (e.g., carpentry, football, HIIT, basketball, or weightlifting) allows us to automatch you"></textarea>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="I agree to the terms" id="accept-terms" name="accept_terms" required="">
                        <label class="form-check-label" for="accept-terms">
                            Agree to terms and conditions
                        </label>
                        <div id="accept_terms-feedback" class="invalid-feedback"></div>
                    </div>
                </div>

                <input type="hidden" value="create" name="action">

                <button id="submitButton" class="btn btn-primary" type="submit">Submit form</button>
            </form>
 
</div>
</div>

</div>

<!--</main> -->



<!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
$(document).ready(function(){

    window.student = {	//define global variables in namespace call "student"		
        //call via: window.variableName
        studentName: '',
        phoneSize: 12,
	};


    $( '#first-name').on('blur', function(){

        student.studentName = this.value

    });
    
     
    /**
     * 
     * This is a master function that adds user feedback if form field is valid and invalid
     *
     * It works by grabing all input elements in that specific form as seen here:
     * @link https://stackoverflow.com/a/12862623/946957
    */
    $("form").each(function(){
        
        var element = $(this).find(':input') 

        $(element).on('blur', function(){

            if (  (this.value == '' && $(this).attr( 'required' ) ) || ( this.name == 'phone' && $('#phone').val().length < student.phoneSize && $('#phone').val().length > 0  )|| ( this.name == 'phone' && $('#phone').val().length > student.phoneSize  ) ){   //https://stackoverflow.com/a/596369/946957
                
                addInvalidHTML( this )

            } else if ( this.name == 'role' && !$('input[name=role]:checked').val() ){ //https://stackoverflow.com/a/596369/946957

                addInvalidHTML( this )
            
            } else if ( this.name == 'password_verify'){

                if ( $('#password-initial').val() != $('#password-verify').val() ){
                    addInvalidHTML( this, ' ' + student.studentName + ', Your passwords do not match' )


                } else{
                    addIsValidHTML( this, 'Congrats, ' + student.studentName + ' Your passwords match!' )
                    console.log('confired password match')

                }

            

            } else {

                addIsValidHTML( this )

            }    

/*
            if  ( this.name == 'phone' && $('#phone').val().length < student.phoneSize && $('#phone').val().length > 1  )    {

                    addInvalidHTML( this )

                    console.log('Phone onBlur Validator: ' +  this.value )


            } else if( this.name == 'phone' && $('#phone').val().length >= student.phoneSize ) {

                addIsValidHTML( this )

            }
*/

        })
        
    });

    //checkbox not detected from above code so add special case here
    $('#accept-terms').on('change', function(){
        if( !$('#accept-terms:checked').val()){

            addInvalidHTML( this )

            console.log($('#accept-terms:checked').val())

        } else {
            
            addIsValidHTML( this )

            console.log($('#accept-terms:checked').val())

        }

    })        
    


    //Format phone in real-time via C:\wamp\www\projects\codesport-cart
    $('#phone').on('keyup change', function() {
        var number = $(this).val()
        number = number.replace(/[^\d]/g, '').replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3");
        $(this).val(number);
    });


    
    function is_blank (){

        var error = 0;

/**/
 /*       //console.log( $('input[name=accept_terms]:checked', '#student-data').val() );
        if ( !$('input[name=accept_terms]:checked', '#accept-terms').val() ){ //https://stackoverflow.com/a/596369/946957

            $('#accept_terms-feedback').text('Accept our terms to continue').show()
            console.log( $('input[name=accept_terms]')[0].name + ' is empty' );

            error++;
                    
        } else{

            $('#accept_terms-feedback').html('Looks Good').css('color', '#28a745').show()

        }



        if ( $('#practice-areas').val().length == 0  ) { 

            $( '#practice_areas-feedback').html( $('#practice-areas')[0].name + ' is required')
            console.log( $('#practice-areas')[0].name + ' is empty');

            error++;
        }    
        if ( $('#emerging-tech').val().length == 0 ) { 

            $( '#emerging_tech-feedback').html( $('#emerging-tech')[0].name + ' is required')
            console.log( $('#emerging-tech')[0].name + ' is empty');

            error++;
        }  
*/

        if( !$('#accept-terms:checked').val()){

            $('#accept_terms-feedback').text('Accept our terms to continue');
            console.log( $('input[name=accept_terms]')[0].name + ' is empty' );

            error++;
        }
        
        if ( !$('input[name=role]:checked').val() ){ //https://stackoverflow.com/a/596369/946957

            $('#role-feedback').text('Please choose your desired role').show()
            console.log( $('input[name=role]')[0].name + ' is empty' );

            error++;
                
        } else{

            $('#role-feedback').html('Looks Good').css('color', '#28a745').show()

        }
        //if no colon prepend, does work for multi-select boxes
        $(':input').each( function(index, value) {


            if ( ( this.value == '' && $(this).attr( 'required' )  ) || ( this.name == 'phone' && $('#phone').val().length < student.phoneSize && $('#phone').val().length > 0  ) || ( this.name == 'phone' && $('#phone').val().length > student.phoneSize  )) {

                addInvalidHTML(this)
                console.log( this.name + ' was called by submit');

                error++;

            }  else if ( this.name == 'password_verify'){

                if ( $('#password-initial').val() !== $('#password-verify').val() ){
                    addInvalidHTML( this, ' ' + student.studentName + ', Your passwords do not match' )
                
                error++;

                }

            }

        })


        return error
    }//is_blank



    function addInvalidHTML( formElement, message=' is required' ){

        $( '#' + formElement.name.replace(/\[\]/, '') + '-feedback').html(formElement.name + message).show()
        //$(formElement).addClass('is-invalid')
        $(formElement).removeClass('is-valid').addClass('is-invalid')
        //$('#student-data').removeClass('was-validated')

        $( '#' + formElement.name.replace(/\[\]/, '')+ '-feedback').removeClass('valid-feedback').addClass('invalid-feedback')
        console.log(formElement.name + ' is blank')

    }

    function addIsValidHTML( formElement, message='WoW! You\'re So Awesome  ' + student.studentName){

        $( '#' + formElement.name.replace(/\[\]/, '') + '-feedback').html( message )
        $(formElement).removeClass('is-invalid').addClass('is-valid')
        $( '#' + formElement.name.replace(/\[\]/, '') + '-feedback').removeClass('invalid-feedback').addClass('valid-feedback').show()
    }




//https://www.w3schools.com/jquery/html_toggleclass.asp
   $('.input-group-append').on('click', function() {
       console.log('Eye click detected')
       console.log(this)
        $('.eye').toggleClass('d-none');
        $('.eye-slash').toggleClass('d-none')
        var input = $('.password')
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });


    $('#submitButton').click(function () {
        /*
        * https://css-tricks.com/return-false-and-prevent-default/ 
        * https://stackoverflow.com/questions/1357118/event-preventdefault-vs-return-false
        */
        event.preventDefault(); 
        var errors = is_blank();
            //console.log(errors);

            if ( errors == 0 ){
                
               // $('#server-output').hide()
               //TODO: Delete when in production
                console.log($('#student-data').serialize() )
    
                $.ajax({//http://stackoverflow.com/a/16531545/946957

                    url: 'src/use-api.php',
                    type: 'POST',
                    //dataType: 'json', //Specifies how to process data returned by server. Leave blank or use 'text' to process server data as string. Before you parse JSON it's a string; after you parse via JSON.parse(data) it's an object.
                    data: $('#student-data').serialize(),

                    success: save_student_data,
                                    

                    error: function( jqXHR, textStatus, errorThrown ) {
                        console.log( jqXHR );

                        //TODO: Test the rffect of changing this to 417.  Guessing these this si to allow 500 errors
                        if( jqXHR.status != 400 ){ var dump_json_formatted_error = jqXHR.responseText} else{ var dump_json_formatted_error =''}
                        $( '#server-output' ).html('<b>Status:</b> ' + textStatus + '. ' + jqXHR.status + ' - ' + errorThrown + '<br>' 
                        + dump_json_formatted_error );
                    }

                }) 

                .always( function(){

                    document.title = student.studentName + ' \'s Profile Page ' + new Date($.now())

                }) 

                function save_student_data(data){

                    $('#server-output').html(data)

                   $('#server-output').append( $('#student-data').serialize() )
                }


        } else {

            console.log( errors + ' blank fields');
            $('form').attr('class', 'was-validated');

        }//if ( errors == 0 ){



    });//submit




}); //document.ready
</script>


<?php else : ?>
    <main class="bd-example col-md-12 ml-5 py-md-3 pl-md-5 bd-content" role="main">

    <h2><?php echo $_SESSION['name']; ?>, This Page Is Unavailable Because You Are Already Logged In</h2>
    <h4>You may sign out of your account by visiting the <a href="logout.php">log out page</a></h4>
</main>



<?php endif ?>
</body>
</html>

