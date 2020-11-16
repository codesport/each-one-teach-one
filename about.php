<?php
  
session_start();
require_once 'src/session-management.php';
require_once 'header-basic.php';

?>
        <title>Login | Each one Teach One</title>

<style>

    .bang{
    /* background-position: left calc(0em) center; */
    background-size: calc(0.6em + 2.3rem) calc(2em + 1rem);
    margin: -.5em 0em .5em -1em;
    }
    .pull-right {
    padding-left: 4em;
 
}
</style>


    </head>
    <body>

   
        <!--<main class="col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">-->
        <div class="container-fluid">    

            <div id="server-output">
                <div class="bd-example col-xl-8">
                    <div class="row">
                        <div class="col mb-3">
                            <h1>About Each One, Teach One</h1><hr>
                        </div>
                    </div>


                    
<p>Each One, Teach One is a proof of concept social initiative. Its goal is to improve race relations in the US by giving people the opportunity to network, connect, and befriend African American and Latino small business owners.</p>

<p>Small business owners (weather they be medical professionals or restaurant owners) now have a platform where there voices can be amplified and heard. 
    
<p>In the near future we want to enable small business owners to host live online talks, demos, and events for members of Each One, Teach One. </p>
<hr>
<?php if ( isset($_SESSION['user_id']) ) : ?>

    <a class="btn-sm btn-success" href="update.php" role="button">Update Profile</a>
    <a class="btn-sm btn-primary" href="read.php" role="button">View Profile</a>
    <a class="btn-sm btn-warning" href="logout.php" role="button">Log Out Profile</a>
    <a class="btn-sm btn-danger" href="delete.php" role="button">Delete Profile</a>

<?php else : ?>
    <a class="btn-sm btn-success" href="login.php" role="button">Login</a>
    <a class="btn-sm btn-primary" href="create.php" role="button">Create a Profile</a>

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