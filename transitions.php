<?php
require_once 'includes/config/database.php';
require_once 'includes/classes/Database.php';

//connect to database
$database = new Database();

//Get all Transitions
$customers = $database->getTransitions(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Customers</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">
    <div class="float-right btn-group" role="group">
        <a href="customers.php" class="btn btn-secondary">Customers</a>
        <a href="transitions.php" class="btn btn-primary">Transitions</a>
    </div>
    <h2 class="my-3 text-primary">All Transitions</h2>
    <table class="table table-striped table-responsive-lg">
        <thead>
        <th>Transitions ID</th>
        <th>Customer ID</th>
        <th>Product</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Date</th>
        </thead>
        <tbody>
        <?php foreach ($customers as $cus): ?>
            <tr>
                <td><?php echo $cus['id'] ?></td>
                <td><?php echo $cus['customer_id'] ?></td>
                <td><?php echo $cus['product'] ?></td>
                <td><?php echo sprintf('%.2f', $cus['amount'])/100 ?> <?php echo strtoupper($cus['currency']) ?></td>
                <td><?php echo $cus['status'] ?></td>
                <td><?php echo $cus['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <hr>
    <p><a href="index.php" class="text-primary">Pay Page</a></p>
</div>

</body>
</html>

