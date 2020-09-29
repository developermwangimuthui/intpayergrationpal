<?php
include_once( 'config.php' );
global $connection;

if( isset( $_POST['save-settings']) ){
    
    $sql_query = "SELECT * FROM meta";
    $settings = $connection->query($sql_query);
    
    $sandbox = $_POST['paypal-sandbox'];
    $paypal = $_POST['paypal-email'];
    
    $query = "INSERT INTO meta(sandbox, paypal) VALUES ('".$sandbox."', '".$paypal."')";
    $connection->query($query);
}

if( isset( $_POST['save-admin-access']) ){
    
    $sql_query = "SELECT * FROM meta";
    $settings = $connection->query($sql_query);
    
    $user = $_POST['admin-user'];
    $password = $_POST['admin-password'];
    
    $query = "UPDATE admin SET user_name='$user', password='$password'";
    $connection->query($query);
}

$sql_query = "SELECT * FROM meta";
$settings = $connection->query($sql_query);
while( $setting = $settings->fetch_assoc()) {
    $sandbox = $setting['sandbox'];
    $paypal = $setting['paypal'];
}


$sql_admin = "SELECT * FROM admin";
$admin = $connection->query($sql_admin);
while( $admins = $admin->fetch_assoc()) {
    $user_name = $admins['user_name'];
    $password = $admins['password'];
}
?>
<div id="settings">
    <h1>Settings</h1>
    <div class="admin-wrap">
        <form method="post" action="">
            
            <div class="checkbox">
                <label>
                <input type="checkbox" name="paypal-sandbox" <?php if($sandbox == 'off'){ echo 'checked="checked"'; }?>/> Paypal Sandbox Enable
                </label>
            </div>
        
            <div class="form-group">
                <label for="paypal-email">Paypal Email Address</label>
                <input type="email" class="form-control" id="paypal-email" name="paypal-email" placeholder="Paypal Email" value="<?php echo $paypal; ?>" />
            </div>
        
            <button type="submit" class="btn btn-primary" name="save-settings">Save Settings</button>
        </form>
        
        <hr />
        
        <h2>Change Admin Details</h2>
        
        <form method="post" action="">
            <div class="form-group">
                <label for="admin-user">Change admin user name</label>
                <input type="text" class="form-control" id="admin-user" name="admin-user" value="<?php echo $user_name; ?>" />
            </div>
            <div class="form-group">
                <label for="admin-password">New Password</label>
                <input type="password" class="form-control" id="admin-password" name="admin-password" value="<?php echo $password; ?>" />
            </div>
            <button type="submit" class="btn btn-primary" name="save-admin-access">Save Password</button>
        </form>
    </div>
</div>