<?php 

session_start();
require_once 'src/session-management.php';
require_once 'header-basic.php';


?>



        <title>Account Management | Each One, Teach One</title>
    </head>
    <body>


        
<main class="col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content hello" role="main">


<div class="bd-example">
            <div id="server-output">
                <div class="row">
                    <div class="col">
                        <h1>Acount Management Page</h1><hr>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
<?php if ( isset($_SESSION['user_id']) ) : ?>

    <a class="btn-sm btn-success" href="update.php" role="button">Update Profile</a>
    <a class="btn-sm btn-primary" href="read.php" role="button">View Profile</a>
    <a class="btn-sm btn-warning" href="logout.php" role="button">Log Out Profile</a>
    <a class="btn-sm btn-danger" href="delete.php" role="button">Delete Profile</a>



<?php else : ?>

    <h4>Hello, you're not logged in yet. Visit the <a href="login.php">login page</a> to proceed.</h4>

<?php endif ?>

</div>
</div>
</div>

