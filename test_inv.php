<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
$customer = User::first();
$customerToken = $customer->createToken('LaravelAuthApp')->accessToken;

$c = stream_context_create(['http'=>[
    'ignore_errors'=>true,
    'header' => "Authorization: Bearer $customerToken\r\nAccept: application/json\r\n"
]]);
echo file_get_contents('http://localhost:8000/api/v1/customer/order/generate-invoice?guest_id=123', false, $c);
