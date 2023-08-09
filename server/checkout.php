<?php

if (isset($_GET['amount'])) {
    $total = $_GET['amount'];
    $name = $_GET['name'];
    
}

require '../vendor/autoload.php';

$stripe = new \Stripe\StripeClient('sk_test_4eC39HqLyjWDarjtT1zdp7dc');

$checkout_session = $stripe->checkout->sessions->create([
    'line_items' => [
        [
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => $name . "'s Cart",
                ],
                'unit_amount' => $total * 100
            ],
            'quantity' => 1,
        ]
    ],
    'custom_fields' => [
        [
            'key' => 'phone',
            'label' => ['type' => 'custom', 'custom' => 'Phone'],
            'type' => 'numeric'
        ], [
            'key' => 'address',
            'label' => ['type' => 'custom', 'custom' => 'Shipping Address'],
            'type' => 'text'
        ]
    ],
    'mode' => 'payment',
    'success_url' => "http://localhost:3000/server/add_order.php?total='$total'",
    'cancel_url' => 'http://localhost:3000/cart.php',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);

?>