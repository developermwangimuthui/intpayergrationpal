<?php
include_once( 'config.php' );
global $connection;

if(isset($_POST['custom-login'])){
    
    $f_user = $_POST['login'];
    $f_pass = $_POST['password'];
    
    $login_query = "SELECT * FROM admin";
    $admin_logins = $connection->query($login_query);
    while( $admin_login = $admin_logins->fetch_assoc()) {
        $user_name = $admin_login['user_name'];
        $password  = $admin_login['password'];
    }
    
    if( $f_pass == $password ){
        $cookie_name = 'custom_login';
        setcookie($cookie_name, $password, time() + (86400 * 30), "/");
        include_once( 'index.php' );
        //exit();
    }
    
}

if(!isset($_COOKIE['custom_login'])) {
    include_once( 'login.php' );
}else{
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="mubeenkhan" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Admin</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar no-padding col-md-2">
                <ul>
                    <li><a href="?dashboard">Dashboard</a></li>
                    <li><a href="?orders">Order</a></li>
                    <li><a href="?services">Services</a></li>
                    <li><a href="?settings">Settings</a></li>
                    <li><a href="?logout">Logout</a></li>
                </ul>
            </div>
            
            <div class="main-wrap no-padding col-md-10">
                <div class="main">
                    <?php 
                    if(isset($_GET['orders'])) {
                        include_once( 'orders.php' ); 
                    }elseif(isset($_GET['services'])){ 
                        include_once( 'services.php' ); 
                    }elseif(isset($_GET['settings'])){ 
                        include_once( 'settings.php' ); 
                    }elseif(isset($_GET['logout'])){
                        setcookie( "custom_login", "", time()-7000000, '/');
                        include_once( 'login.php' );
                        exit();
                    }else{
                        include_once( 'dashboard.php' ); 
                    } 
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php } ?>