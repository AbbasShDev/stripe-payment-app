<?php
require_once 'vendor/autoload.php';
require_once 'includes/config/database.php';
require_once 'includes/classes/Database.php';

\Stripe\Stripe::setApiKey('sk_test_51Hg4VyESWKCHViLTPBuip19sJ5QWLquYVrwXhFGBDEGamBBxK3sK4lRlqi3iNE36RKjtKn5salCNsENIBpwK9UpV00fFI6cvlY');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //sanitize post array
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    $first_name = $POST['first_name'];
    $last_name  = $POST['last_name'];
    $email      = $POST['email'];
    $token      = $POST['stripeToken'];

    try {
        // Create customer In Stripe
        $customer = \Stripe\Customer::create(array(
            'email' => $email,
            'source'=> $token
        ));

        // Charge customer
        $charge = \Stripe\Charge::create(array(
            'amount'        => 5000,
            'currency'      => 'usd',
            'description'   =>'PHP For Beginner Course',
            'customer'      =>$customer->id
        ));
    }catch(Stripe_CardError $e) {
        die($e->getMessage());
    } catch (Stripe_InvalidRequestError $e) {
        // Invalid parameters were supplied to Stripe's API
        die($e->getMessage());
    } catch (Stripe_AuthenticationError $e) {
        // Authentication with Stripe's API failed
        die($e->getMessage());
    } catch (Stripe_ApiConnectionError $e) {
        // Network communication with Stripe failed
        die($e->getMessage());
    } catch (Stripe_Error $e) {
        // Display a very generic error to the user, and maybe send
        // yourself an email
        die($e->getMessage());
    } catch (Exception $e) {
        // Something else happened, completely unrelated to Stripe
        die($e->getMessage());
    }

    //connect to database
    $database = new Database();

    //Customer Data
    $customerData = [
        'id'         => $charge->customer,
        'first_name' => $first_name,
        'last_name'  => $last_name,
        'email'      => $email
    ];

    //Add new Customer
    $database->addCustomer($customerData);

    //Customer Data
    $TransitionsData = [
        'id'         => $charge->id,
        'customer_id' => $charge->customer,
        'product'  => $charge->description,
        'amount'  => $charge->amount,
        'currency'  => $charge->currency,
        'status'      => $charge->status
    ];

    //Add new Customer
    $database->addTransitions($TransitionsData);

    header('location: success.php?tid='.$charge->id.'&product='.$charge->description);
    die();

}