<?php
//https://www.tutorialrepublic.com/php-tutorial/php-sessions.php
session_start();
require_once 'src/session-management.php';
require_once 'header-basic.php';
?>

        <title>Log Out | Each One, Teach One</title>
    </head>
    <body>     
<main class="col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content hello" role="main">

<div class="bd-example">
    <div id="server-output">
        <div class="row">
            <div class="col">
                <h1>Logout Page</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
<?php if ( isset($_SESSION['user_id']) ) : $name = $_SESSION['name']; session_destroy(); ?>

    <h2><?php echo $name ?>, you have succesfully logged out</h2>
    <a class="btn-sm btn-success" href="login.php" role="button">Login</a>
    <a class="btn-sm btn-primary" href="create.php" role="button">Create a Profile</a>
<?php else : ?>

    <h4>Hello, you're not logged in yet. Visit the <a href="login.php">login page</a> to proceed.</h4>

<?php endif ?>
</div>
</div>
</div>
</div>
</main>
</body>
</html>