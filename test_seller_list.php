<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

function testRoute($url, $kernel) {
    echo "Testing {$url}...\n";
    $request = Illuminate\Http\Request::create($url, 'GET');
    $start = microtime(true);
    $response = $kernel->handle($request);
    $time = microtime(true) - $start;
    echo "Status: {$response->getStatusCode()} | Time: " . round($time, 4) . "s\n";
    $kernel->terminate($request, $response);
}

testRoute('/api/v1/seller/list/all', $kernel);
testRoute('/api/v1/seller/list/top', $kernel);
testRoute('/api/v1/seller/list/new', $kernel);
