<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$request = Illuminate\Http\Request::create('/api/v1/products/details/padded-bra-model-45065-ava', 'GET', ['guest_id' => 1]);

try {
    $p = App\Models\Product::where('slug', 'padded-bra-model-45065-ava')->first();
    $p = App\Utils\Helpers::product_data_formatting($p, false);
    
    // Let's test json_encode manually
    json_encode($p->toArray());
    echo "toArray JSON Decode Error: " . json_last_error_msg() . "\n";
    
    // What if we do toJson?
    $p->toJson();
    echo "toJson Error: " . json_last_error_msg() . "\n";
    
    // What if we do JsonResponse?
    $resp = new \Illuminate\Http\JsonResponse($p);
    echo "JsonResponse Success\n";

} catch (\Throwable $e) {
    echo "CRASH: " . get_class($e) . ': "' . $e->getMessage() . '" in ' . $e->getFile() . ':' . $e->getLine() . "\n";
}
