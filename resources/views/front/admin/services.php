<?php
include_once( 'config.php' );
global $connection;

if(isset( $_POST['save-services'] )){
    $service_name = $_POST['service-name'];
    $query = "INSERT INTO services(services) VALUES ('".$service_name."')";
    $connection->query($query);
}

if(isset( $_POST['save-edit-services'] )){
    $service_id     = $_POST['edit-service-id'];
    $service_name   = $_POST['edit-service-name'];
    $query = "UPDATE services SET services='$service_name' WHERE id= $service_id";
    $connection->query($query);
}

if( isset( $_GET['delete'] ) ){
    $ids = $_GET['delete'];
    $sql_query = "DELETE FROM services WHERE id = '$ids'";
    $connection->query($sql_query);
}

$sql_query = "SELECT * FROM services";
$services = $connection->query($sql_query);
?>
<div id="settings">
    <h1>Services</h1>
    <div class="admin-wrap">
        <?php if( isset( $_GET['edit'] ) ) : ?>
        <?php
        $ids = $_GET['edit'];
        $sql_query = "SELECT * FROM services WHERE id = $ids";
        $services = $connection->query($sql_query);
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="edit-service-name">Edit Service Name</label>
                <?php while( $service = $services->fetch_assoc()) { ?>    
                <input type="hidden" name="edit-service-id" value="<?php echo $service['id']; ?>" />
                <input type="text" class="form-control" id="edit-service-name" name="edit-service-name" value="<?php echo $service['services']; ?>" />
                <?php } ?>
            </div>
            
            <button type="submit" class="btn btn-primary" name="save-edit-services">Edit & Save</button>
        </form>
        <?php exit(); ?>
        <?php else: ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="service-name">Service Name</label>
                <input type="text" class="form-control" id="service-name" name="service-name" placeholder="Enter Service Name Here" />
            </div>
            
            <button type="submit" class="btn btn-primary" name="save-services">Save</button>
        </form>
        <?php endif; ?>
        <hr />
        
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">Services Name</th>
                    <th class="th-sm">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($services->num_rows > 0) { ?>
                <?php while( $service = $services->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $service['services']; ?></td>
                    <td>
                        <a href="?services=any&edit=<?php echo $service['id']; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a> | 
                        <a href="?services=any&delete=<?php echo $service['id']; ?>"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </td>
                </tr>
                <?php } ?>
                <?php }else{ ?>
                <tr>
                    <td colspan="6">No Service Found.</td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="th-sm">Services Name</th>
                    <th class="th-sm">Action</th>
                </tr>
            </tfoot>
        </table>
        
    </div>
</div>