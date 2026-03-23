<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$c = stream_context_create(['http'=>[
    'ignore_errors'=>true,
    'header' => "Accept: application/json\r\n"
]]);
echo file_get_contents('http://localhost:8000/api/v1/categories?guest_id=123', false, $c);
