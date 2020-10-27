<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP, MySQL & Stripe API Payment App </title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- main css -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div class="container">
    <h2 class="my-4 text-center">PHP For Beginner Course [$50]</h2>
    <form action="charge.php" method="post" id="payment-form">
        <div class="form-row">
            <input type="text" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name" name="first_name">
            <input type="text" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name" name="last_name">
            <input type="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address" name="email">
            <div id="card-element" class="form-control">
                <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display Element errors. -->
            <div id="card-errors" role="alert"></div>
        </div>

        <button>Submit Payment</button>
    </form>
</div>
<!-- jQuery js -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- Stripe js -->
<script src="https://js.stripe.com/v3/" data-locale="en"></script>
<!-- charge js -->
<script src="./js/charge.js"></script>
</body>
</html>