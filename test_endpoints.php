<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

function testRoute($url, $kernel) {
    $request = Illuminate\Http\Request::create($url, 'GET');
    $start = microtime(true);
    $response = $kernel->handle($request);
    $time = microtime(true) - $start;
    echo "Tested {$url} -> Status: {$response->getStatusCode()} | Time: " . round($time, 4) . "s\n";
    $kernel->terminate($request, $response);
}

testRoute('/api/v1/banners', $kernel);
testRoute('/api/v1/brands', $kernel);
testRoute('/api/v1/categories', $kernel);
testRoute('/api/v1/products/latest', $kernel);
