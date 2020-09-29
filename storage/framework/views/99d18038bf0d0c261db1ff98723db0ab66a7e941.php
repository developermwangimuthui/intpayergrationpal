<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Premium Freelancing Accounts</title>

    <style>
        #customers {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 30px;
            /*border: 1px solid #eee;*/
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        #infor {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 30px;
            /*border: 1px solid #eee;*/
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        #top {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 30px;
            /*border: 1px solid #eee;*/
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }

        #customers td, #customers th {
            /*border: 1px solid #ddd;*/
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #fff;
        }


        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #0a0c0d;
            color: white;
        }

        #customers tr td:nth-child(1) {
            width: 53%;
        }
        .me{

            border-top: 2px solid #eeeeee;
        } .total{

            border-top: 2px solid #000000;
            border-bottom:  2px solid #000000;
        }
    </style>
</head>

<body>
    <table cellpadding="0" cellspacing="0">


        <table id="top" style=" border-collapse:separate; border-spacing:1em;">
            <tr style=" padding: 5px;">
                <td style="width: 53%;text-align: left" >
                    <img src="https://pfaccounts.com/wp-content/uploads/2019/10/pfa-2.png"
                         style="width:100%; max-width:150px;align:left;"></td>
                <td colspan="2"><strong>Premium Freelancing Accounts</strong>
                    <br>
                    Beedstrasse 54 <br>
                    40468 Dusseldorf <br>
                    Germany<br></td>

            </tr>
            <tr >
                <td style="width:53%;"><span style="font-weight: bolder;font-size:30px">INVOICE</span><br><br>
                    <?php echo e($data['orders_data'][0]->customers_name); ?><br>
                    <?php echo e($data['orders_data'][0]->email); ?></td>
                <td colspan="2"> <?php echo e(trans('Order Number')); ?> #:
                    &nbsp;&nbsp; <?php echo e('PF'.$data['orders_data'][0]->orders_id); ?><br>
                    Order Date:&nbsp;&nbsp; <?php echo e(date('F j, Y', strtotime($data['orders_data'][0]->date_purchased))); ?><br>
                    Payment Method:&nbsp;&nbsp;<?php echo e(str_replace('_',' ', $data['orders_data'][0]->payment_method)); ?></td>

            </tr>
            <tr>

                <table id="customers">
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                        <td> <?php echo e($data['prod_des']->products_name); ?></td>
                        <td><?php echo e($data['prod_des']->products_quantity); ?></td>
                        <td><?php if($data['orders_data'][0]->currency == 'USD'): ?>
                                $
                            <?php endif; ?>
                            <?php if($data['orders_data'][0]->currency == 'EUR'): ?>
                                €
                            <?php endif; ?>
                            <?php if($data['orders_data'][0]->currency == 'GBP'): ?>
                                £
                            <?php endif; ?>
                            <?php echo e($data['prod_des']->final_price); ?></td>
                    </tr>
                    <tr >
                        <td></td>
                        <td class="me"> <strong>Subtotal</strong></td>
                        <td class="me"><?php if($data['orders_data'][0]->currency == 'USD'): ?>
                                $
                            <?php endif; ?>
                            <?php if($data['orders_data'][0]->currency == 'EUR'): ?>
                                €
                            <?php endif; ?>
                            <?php if($data['orders_data'][0]->currency == 'GBP'): ?>
                                £
                            <?php endif; ?>
                            <?php echo e($data['orders_data'][0]->order_price); ?>

                        </td>
                    </tr>
                    <tr >
                        <td></td>
                        <td class="me"> <strong>Tax</strong></td>
                        <td class="me"><?php if($data['orders_data'][0]->currency == 'USD'): ?>
                                $
                            <?php endif; ?>
                            <?php if($data['orders_data'][0]->currency == 'EUR'): ?>
                                €
                            <?php endif; ?>
                            <?php if($data['orders_data'][0]->currency == 'GBP'): ?>
                                £
                            <?php endif; ?>
                            <?php echo e($data['orders_data'][0]->total_tax); ?>

                        </td>
                    </tr>
                    <tr >
                        <td></td>
                        <td class="total"> <strong>Total</strong></td>
                        <td class="total"> <strong><?php if($data['orders_data'][0]->currency == 'USD'): ?>
                                $
                            <?php endif; ?>
                            <?php if($data['orders_data'][0]->currency == 'EUR'): ?>
                                €
                            <?php endif; ?>
                            <?php if($data['orders_data'][0]->currency == 'GBP'): ?>
                                £
                            <?php endif; ?>
                            <?php echo e($data['orders_data'][0]->order_price); ?></strong>
                        </td>
                    </tr>

                </table>
            </tr>
        </table>

    </table>

</body>
</html>
<?php /**PATH D:\Php\intpayergrationpal-master\resources\views/admin/Orders/newinvoice.blade.php ENDPATH**/ ?>