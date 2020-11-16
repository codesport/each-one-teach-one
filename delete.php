<?php
  
session_start();
require_once 'src/session-management.php';
require_once 'header-basic.php';

?>
        <title>Account Deletion | Each One, Teach One</title>
    </head>
    <body>

   
        <!--<main class="col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">-->
        <div class="container-fluid">    

     
            <div id="server-output">
                <div class="bd-example col-xl-5">
                    <div class="row">
                        <div class="col mb-3">
                            <h1>Account Deletion</h1>
                            <hr>
                        </div>
                    </div>

                    <?php if ( isset($_SESSION['user_id']) ) : ?>
    
    <a class="btn-sm btn-success" href="update.php" role="button">Update Profile</a>
    <a class="btn-sm btn-primary" href="read.php" role="button">View Profile</a>
    <a class="btn-sm btn-warning" href="logout.php" role="button">Log Out Profile</a>

                    <div class="row">
                        <div class="col">
                            <h4>To permenantly delete your account please enter your email and password</h4>
                            <div class="bd-callout bd-callout-danger">
                            <div class="bang"><p class="pull-right">Account deletion is permanent and may not be undone.</p></div>                            <div>
                        </div>
                    </div>

            <!-- input form element name MUST equal id in feedack element.  input_name -> input_name_feedack -->
            <form id="login" class="needs-validation" novalidate>

                <div class="form-row">
                    <div class="col mb-3">
                            <label class="sr-only" for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com" pattern="^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$" name="email" required>
                            <div id="email-feedback" class="invalid-feedback"></div>
                    </div>
                </div>

                    <div class="form-row">

                        <div class="col mb-3">
                            <label class="sr-only" for="password">Enter Password</label>
                            <div class="input-group mb-2">
                                <input type="password" class="form-control password" id="password" name="password" placeholder="enter password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <svg aria-hidden="true" class="eye-slash" fill="currentColor" focusable="false" width="24px" height="20px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M10.58,7.25l1.56,1.56c1.38,0.07,2.47,1.17,2.54,2.54l1.56,1.56C16.4,12.47,16.5,12,16.5,11.5C16.5,9.02,14.48,7,12,7 C11.5,7,11.03,7.1,10.58,7.25z"></path><path d="M12,6c3.79,0,7.17,2.13,8.82,5.5c-0.64,1.32-1.56,2.44-2.66,3.33l1.42,1.42c1.51-1.26,2.7-2.89,3.43-4.74 C21.27,7.11,17,4,12,4c-1.4,0-2.73,0.25-3.98,0.7L9.63,6.3C10.4,6.12,11.19,6,12,6z"></path><path d="M16.43,15.93l-1.25-1.25l-1.27-1.27l-3.82-3.82L8.82,8.32L7.57,7.07L6.09,5.59L3.31,2.81L1.89,4.22l2.53,2.53 C2.92,8.02,1.73,9.64,1,11.5C2.73,15.89,7,19,12,19c1.4,0,2.73-0.25,3.98-0.7l4.3,4.3l1.41-1.41l-3.78-3.78L16.43,15.93z M11.86,14.19c-1.38-0.07-2.47-1.17-2.54-2.54L11.86,14.19z M12,17c-3.79,0-7.17-2.13-8.82-5.5c0.64-1.32,1.56-2.44,2.66-3.33 l1.91,1.91C7.6,10.53,7.5,11,7.5,11.5c0,2.48,2.02,4.5,4.5,4.5c0.5,0,0.97-0.1,1.42-0.25l0.95,0.95C13.6,16.88,12.81,17,12,17z"></path></svg>                                    
                                        
                                        <svg aria-hidden="true" class="eye d-none" fill="currentColor" focusable="false" width="24px" height="20px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12,7c-2.48,0-4.5,2.02-4.5,4.5S9.52,16,12,16s4.5-2.02,4.5-4.5S14.48,7,12,7z M12,14.2c-1.49,0-2.7-1.21-2.7-2.7 c0-1.49,1.21-2.7,2.7-2.7s2.7,1.21,2.7,2.7C14.7,12.99,13.49,14.2,12,14.2z"></path><path d="M12,4C7,4,2.73,7.11,1,11.5C2.73,15.89,7,19,12,19s9.27-3.11,11-7.5C21.27,7.11,17,4,12,4z M12,17 c-3.79,0-7.17-2.13-8.82-5.5C4.83,8.13,8.21,6,12,6s7.17,2.13,8.82,5.5C19.17,14.87,15.79,17,12,17z"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div id="password-feedback" class="invalid-feedback"></div>
                        </div>
                    </div>

                <!-- -->

                <!-- -->
                <input type="hidden" value="delete" name="action">

                <button id="submitButton" class="btn btn-danger" type="submit">Delete My Accout</button>
            </form>
            <?php else : ?>

                <h4>Hello, you're not logged in yet. Visit the <a href="login.php">login page</a> to proceed.</h4>

            <?php endif ?>
        </div>
 
</div>
</div>
</main>



<!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
$(document).ready(function(){

    window.student = {	//define global variables in namespace call "student"		
        student_name: '',
        hello: '',
	};
     
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

            if (  this.value == '' && $(this).attr( 'required' )   ){   //https://stackoverflow.com/a/596369/946957
                
                addInvalidHTML( this )

            } else if ( this.name == 'email' &&	! is_email( $(this).val() ) ){

                addInvalidHTML( this )

                console.log( 'Email from on Blur:' + $(this).val() )
                console.log( 'Is Email Valid?:' + is_email( $(this).val() ) )

           } else {

                addIsValidHTML( this )

            }    



        })
        
    });


    function is_email( email ) {
      return /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test( email );
    }
    
    function is_blank (){

        var error = 0;


        //if no colon prepend, does work for multi-select boxes
        $(':input').each( function(index, value) {

            if (  this.value == '' && $(this).attr( 'required' )  ) {

                addInvalidHTML(this)
                console.log( this.name + ' was called by submit');

                error++;

            } else if ( this.name == 'email' &&	! is_email( $(this).val() ) ){

                addInvalidHTML(this)

                console.log( 'Email from submitt button:' + $(this).val() )

                error++;

            }           

        })


        return error
    }//is_blank


    function addInvalidHTML( formElement ){

        $( '#' + formElement.name + '-feedback').html('A valid ' + formElement.name + ' is required').show()
        $(formElement).removeClass('is-valid').addClass('is-invalid')

        $( '#' + formElement.name + '-feedback').removeClass('valid-feedback').addClass('invalid-feedback')
        console.log(formElement.name + ' is blank')

    }

    function addIsValidHTML( formElement ){

        $( '#' + formElement.name + '-feedback').html("WoW! You're So Awesome  " + student.student_name)
        $(formElement).removeClass('is-invalid').addClass('is-valid')
        $( '#' + formElement.name + '-feedback').removeClass('invalid-feedback').addClass('valid-feedback').show()
    }

   $('.input-group-append').on('click', function() {
       console.log('click detected')
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
               console.log($('#login').serialize() )
    
                $.ajax({//http://stackoverflow.com/a/16531545/946957

                    url: 'src/use-api.php',
                    type: 'POST',
                    //dataType: 'json', //Specifies how to process data returned by server. Leave blank or use 'text' to process server data as string. Before you parse JSON it's a string; after you parse via JSON.parse(data) it's an object.
                    data: $('#login').serialize(),

                    success: show_data,
                                    

                    error: function( jqXHR, textStatus, errorThrown ) {
                        console.log( jqXHR );

                        //TODO: Test the rffect of changing this to 417.  Guessing these this si to allow 500 errors
                        if( jqXHR.status != 400 ){ var dump_json_formatted_error = jqXHR.responseText} else{ var dump_json_formatted_error =''}
                        $( '#server-output' ).html('<b>Status:</b> ' + textStatus + '. ' + jqXHR.status + ' - ' + errorThrown + '<br>' 
                        + dump_json_formatted_error );
                    }

                }) 

                .always( function(){

                    document.title =  ' Profile Page  | Each One, Teach One'

                }) 

                function show_data(data){

                    $('#server-output').html('<div class="bd-example col-xl-5">' + data)

                    //$('#server-output').append( $('#login').serialize() )
                }


        } else {

            console.log( errors + ' blank fields');
            $('form').attr('class', 'was-validated');

        }//if ( errors == 0 ){



    });//submit




}); //document.ready
</script>



    </body>
</html>