<?php
include_once( 'config.php' );
global $connection;

$sql_query = "SELECT * FROM user_details";
$orders = $connection->query($sql_query);
?>
<div id="orders">
    <h1>Orders</h1>
    <div class="admin-wrap">
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">Full Name</th>
                    <th class="th-sm">Services</th>
                    <th class="th-sm">Amount</th>
                    <th class="th-sm">Email</th>
                    <th class="th-sm">Status</th>
                    <th class="th-sm">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($orders->num_rows > 0) { ?>
                <?php while( $order = $orders->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $order['firstname'] . ' ' . $order['lastname']; ?></td>
                    <td><?php echo $order['services']; ?></td>
                    <td>$ <?php echo $order['amount']; ?></td>
                    <td><?php echo $order['email']; ?></td>
                    <td><?php echo $order['payment_status']; ?></td>
                    <td><a href="#<?php //echo $order['']; ?>">Approve</a></td>
                </tr>
                <?php } ?>
                <?php }else{ ?>
                <tr>
                    <td colspan="6">No Order Found.</td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="th-sm">Full Name</th>
                    <th class="th-sm">Services</th>
                    <th class="th-sm">Amount</th>
                    <th class="th-sm">Email</th>
                    <th class="th-sm">Status</th>
                    <th class="th-sm">Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php $connection->close(); ?>