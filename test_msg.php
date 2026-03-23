<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Seller;
$seller = Seller::first();
$sellerToken = $seller->auth_token;

$c = stream_context_create(['http'=>[
    'ignore_errors'=>true,
    'header' => "Authorization: Bearer $sellerToken\r\nAccept: application/json\r\n"
]]);
echo file_get_contents('http://localhost:8000/api/v2/seller/messages/list/seller?guest_id=123', false, $c);
