<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$request = Illuminate\Http\Request::create('/api/v1/products/details/padded-bra-model-45065-ava', 'GET', ['guest_id' => 1]);

try {
    $controller = app()->make(App\Http\Controllers\RestAPI\v1\ProductController::class);
    $response = $controller->getProductDetails($request, 'padded-bra-model-45065-ava');
    echo $response->getContent();
} catch (\Throwable $e) {
    echo get_class($e) . ': "' . $e->getMessage() . '" in ' . $e->getFile() . ':' . $e->getLine() . "\n";
    echo $e->getTraceAsString();
}
